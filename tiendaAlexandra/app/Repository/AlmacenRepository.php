<?php

/**
Repository: Interactúa con la bbdd y devuelve la información.
**/
namespace Amowhi\Cms\Repository;

use Amowhi\Cms\Core\Database;

//Interactúa con la tabla Almacen
  class AlmacenRepository
  {
    private $con = null;
    public function __construct(){
      $this->con = (new Database())->getConexion();
    }

    //Funcion que sirve para ver la sentencia sql con los valores/parametros
    public function parms($string,$data) {
            $indexed=$data==array_values($data);
            foreach($data as $k=>$v) {
                if(is_string($v)) $v="'$v'";
                if($indexed) $string=preg_replace('/\?/',$v,$string,1);
                else $string=str_replace(":$k",$v,$string);
            }
            return $string;
    }
      

    //Recoge la información del stock disponible según el id del articulo.
    public function getStock($idArticulo)
    {
      $sql="SELECT stock FROM almacen WHERE idArticulo= :idArticulo";

      $cursor = $this->con->prepare($sql);
      $cursor->bindValue(':idArticulo', $idArticulo);
      $cursor->execute();
      $stock=[];
      while($fil = $cursor->fetch(\PDO::FETCH_ASSOC))
      {
        $stock[]=$fil;
      }

    return $stock;
    }

    //Recoge la información del stock disponible según el id del articulo.No lo uso al final pero lo mantengo.
    public function getDatosAlmacen($idTiendaSeleccionada)
    {

      $sql="SELECT idArticulo,idTienda,stock FROM almacen WHERE idTienda= :idTienda;";

      $cursor = $this->con->prepare($sql,array(\PDO::ATTR_CURSOR=>\PDO::CURSOR_SCROLL));
      $cursor->bindValue(':idTienda',$idTiendaSeleccionada);
      $cursor->execute();
      $datosAlmacen=[];
      while($fil = $cursor->fetch(\PDO::FETCH_ASSOC))
      {
        $datosAlmacen[]= new Almacen($fil);
      }

    return $datosAlmacen;
    }

    //Descuenta el stock una vez confirmada la compra
    public function modificarStock($tiendaSeleccionada,$carrito)
    {
      try{
      $sql="UPDATE almacen set stock= stock-? WHERE idArticulo =? AND idTienda=?;";

        foreach ($carrito as $id=>$cantidad) {
          $cursor = $this->con->prepare($sql, array(\PDO::ATTR_CURSOR=>\PDO::CURSOR_SCROLL));
          $cursor->bindParam(1, $cantidad);
          $cursor->bindParam(2, $id);
          $cursor->bindParam(3,$tiendaSeleccionada);
          $cursor->execute();
        }
        $filasAfectadas = $cursor->rowCount();
      }catch(\PDOException $ex){
          $filasAfectadas=$ex->getMessage();
      }

      return $filasAfectadas;
      }

    //Devuelve las tiendas que disponen de disponibilidad de los articulos del carrito.
    public function idTiendasDispo($carrito, $idTienda)
    {
      $paramsSql = [];
      $paramsSql[] = $idTienda;

      $sql="select count(*) as dispo from almacen
            where idTienda=? AND (";
      foreach ($carrito as $id => $stock) {
        $sql .= '(idArticulo = ? and stock >= ?) OR';
        $paramsSql[]=$id;
        $paramsSql[]=$stock;
      }
      $sql = substr($sql,0,-3);
      $sql .= ");";
      $cursor = $this->con->prepare($sql, array(\PDO::ATTR_CURSOR=>\PDO::CURSOR_SCROLL));
      $cursor->execute($paramsSql);
      $fil = $cursor->fetch(\PDO::FETCH_ASSOC);

      return $fil['dispo'];
    }

    public function tiendasConDisponibilidad($carrito)
    {
      $paramsSql = [];
      $sql="select idTienda, count(idTienda) as disponibles from almacen
            where idTienda != 1 AND (";
            foreach ($carrito as $id => $stock) {
              $sql .= '(idArticulo = ? and stock >= ?) OR';
              $paramsSql[]=$id;
              $paramsSql[]=$stock;
            }
      $sql = substr($sql,0,-2);
      $sql .= ") GROUP BY idTienda having count(idTienda) = ? ORDER BY disponibles desc;";
      $paramsSql[]= count($carrito);
      $cursor = $this->con->prepare($sql, array(\PDO::ATTR_CURSOR=>\PDO::CURSOR_SCROLL));
      $cursor->execute((array)$paramsSql);
      $tiendasDispo=[];
      while($fil = $cursor->fetch(\PDO::FETCH_ASSOC))
      {
        $tiendasDispo[]=$fil;
      }
    return $tiendasDispo;
    }

    /*La primera sentencia resta la cantidad necesitada de la tienda con disponibilidad.
    La segunda sentencia suma la cantidad al stock de la tienda seleccionada en el caso de que no tenga(VentaController).
    Una vez aumentado el stock se realiza la modificación tras confirmar la compra. */
    public function actualizarStocks($tiendaConDispo, $carrito,$tiendaSeleccionada)
    {
      $sqlUpdate="UPDATE almacen set stock= stock-? WHERE idArticulo =? AND idTienda=?;";

        foreach ($carrito as $id=>$cantidad) {
          $cursor = $this->con->prepare($sqlUpdate, array(\PDO::ATTR_CURSOR=>\PDO::CURSOR_SCROLL));
          $cursor->bindParam(1, $cantidad);
          $cursor->bindParam(2, $id);
          $cursor->bindParam(3,$tiendaConDispo);
          $cursor->execute();
        }
        $filasAfectadasUpdate = $cursor->rowCount()>0;

      $sqlUpdate2="UPDATE almacen set stock= stock + ? WHERE idArticulo =? AND idTienda=?;";

        foreach ($carrito as $id=>$cantidad) {
          $cursor = $this->con->prepare($sqlUpdate2, array(\PDO::ATTR_CURSOR=>\PDO::CURSOR_SCROLL));
          $cursor->bindParam(1, $cantidad);
          $cursor->bindParam(2, $id);
          $cursor->bindParam(3,$tiendaSeleccionada);
          $cursor->execute();
        }
        $filasAfectadas = $cursor->rowCount()>0;

      return $filasAfectadasUpdate && $filasAfectadas;
    }

}
