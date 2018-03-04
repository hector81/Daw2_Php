<?php

class articuloRepositorio {

  function cargarArticulos() :array{
    $sql = "SELECT id,nombreCorto,nombre,descripcion,PVP,idFamilia,imagen,agotado,pocasUnidades FROM articulo;";
    $articulos = [];
    include_once __DIR__ . '/../../core/conexionBd.inc';
    include_once __DIR__ . '/../../fuente/modelo/articulo.inc';
    try{
        $con = (new conexionBd)->getConexion();
        $con->beginTransaction();
        $stmt = $con->prepare($sql);
        $stmt->execute();
        while($row =$stmt->fetch(PDO::FETCH_ASSOC)){
            $articulos[] = new Articulo($row);
        }
        $con->commit();
        return $articulos;
    }catch(PDOException $ex){
      //throw new Exception("Error Processing Request", 1); //el inc es para los includes
       throw $ex;
       $con->rollBack();
    }finally{
      $con = null;
      $stmt = null;
    }
  }

  public function devolverPrecioArticulo(int $idArticulo) :float{
      $precio = 0;
      $precio =(float)$precio;
      $sql = "SELECT PVP FROM articulo WHERE id = ? ;";
      include_once __DIR__ . '/../../core/conexionBd.inc';
      try{
          $con = (new conexionBd)->getConexion();
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->bindParam(1,$idArticulo,PDO::PARAM_INT);
          $stmt->execute();
          while($row =$stmt->fetch(PDO::FETCH_ASSOC)){
              $precio = $row['PVP'];
          }
          $con->commit();
          return $precio;
      }catch(PDOException $ex){
        //throw new Exception("Error Processing Request", 1); //el inc es para los includes
         throw $ex;
         $con->rollBack();
      }finally{
        $con = null;
        $stmt = null;
      }
  }//fin metodo

  public function devolverFamiliasPorArticulos() :array{
      $sql = "SELECT DISTINCT familia.nombre as familiaNombre FROM articulo
      JOIN familia ON familia.Id = articulo.idFamilia;";
      $familias = [];
      include_once __DIR__ . '/../../core/conexionBd.inc';
      try{
          $con = (new conexionBd)->getConexion();
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->execute();
          while($row =$stmt->fetch(PDO::FETCH_ASSOC)){
              $familias[] = $row['familiaNombre'];
          }
          $con->commit();
          return $familias;
      }catch(PDOException $ex){
        //throw new Exception("Error Processing Request", 1); //el inc es para los includes
         throw $ex;
         $con->rollBack();
      }finally{
        $con = null;
        $stmt = null;
      }
  }//fin metodo

  function verArticulosPorCategoria(string $idCategoria) :array{
    $idCategoria = (int)$idCategoria;
    $sql = "SELECT id,nombreCorto,nombre,descripcion,PVP,idFamilia,imagen,agotado,pocasUnidades FROM articulo WHERE idFamilia = ? ;";
    $articulosPorFamilia = [];
    include_once __DIR__ . '/../../core/conexionBd.inc';
    include_once __DIR__ . '/../../fuente/modelo/articulo.inc';
    try{
        $con = (new conexionBd)->getConexion();
        $con->beginTransaction();
        $stmt = $con->prepare($sql);
        $stmt->bindParam(1,$idCategoria,PDO::PARAM_INT);
        $stmt->execute();
        while($fila =$stmt->fetch(PDO::FETCH_ASSOC)){
            $articulosPorFamilia[] = new Articulo($fila);
        }
        $con->commit();
        return $articulosPorFamilia;
    }catch(PDOException $ex){
      //throw new Exception("Error Processing Request", 1); //el inc es para los includes
       throw $ex;
       $con->rollBack();
    }finally{
      $con = null;
      $stmt = null;
    }
  }//////////fin metodo


  public function verArticuloIndividual(string $idArticulo) :array{
      $idArticulo = (int)$idArticulo;
      $articulo = [];
      $sql = "SELECT id,nombreCorto,nombre,descripcion,PVP,idFamilia,imagen,agotado,pocasUnidades FROM articulo WHERE id = ? ;";
      include_once __DIR__ . '/../../core/conexionBd.inc';
      include_once __DIR__ . '/../../fuente/modelo/articulo.inc';
      try{
          $con = (new conexionBd)->getConexion();
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->bindParam(1,$idArticulo,PDO::PARAM_INT);
          $stmt->execute();
          while($fila =$stmt->fetch(PDO::FETCH_ASSOC)){
              $articulo[0] = new Articulo($fila);
          }
          $con->commit();
          return $articulo;
      }catch(PDOException $ex){
        //throw new Exception("Error Processing Request", 1); //el inc es para los includes
         throw $ex;
         $con->rollBack();
      }finally{
        $con = null;
        $stmt = null;
      }
  }///fin metodo


//////////BUSQUEDA 6 METODOS
//////////////////1
//para busqueda familia comprobar que existe
  public function encontrarFamiliaPalabraComprobar(string $palabra) :bool
  {
    $resultado= false;
    $id = 0;
    $palabra1 = $palabra."%";
    $palabra2= "%".$palabra;
    include_once __DIR__ . '/../../core/conexionBd.inc';
    $con = (new conexionBd)->getConexion();
    try{
      /* Iniciar una transacción, desactivando 'autocommit' */
      $con->beginTransaction();
      $sql = "SELECT id FROM dbo.familia WHERE nombre LIKE ?
                        OR descripcion LIKE ?
                        OR descripcion LIKE ?
                        OR descripcion LIKE ?;";
      $stmt = $con->prepare($sql);
      $stmt->bindParam(1,$palabra,PDO::PARAM_STR);
      $stmt->bindParam(2,$palabra,PDO::PARAM_STR);
      $stmt->bindParam(3,$palabra1,PDO::PARAM_STR);
      $stmt->bindParam(4,$palabra2,PDO::PARAM_STR);
      $stmt->execute();
      while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
         $id = $row['id'];
      }
      //si hay algun resultado
      if ($id==0) {
        $resultado = false;
      }else{
        //si no hay resultados
        $resultado = true;
      }
      $con->commit();
      return $resultado;
    }catch(PDOException  $e ){
      echo "Error: ".$e;
      /* Reconocer el error y revertir los cambios */
      $con->rollBack();
    }finally {
          $stmt =null;
          $con =null;
    }
  }



  ///////////////////////////2
  //para busqueda articulo comprobar si existe
    public function encontrarArticuloPalabraComprobar(string $palabra) :bool
    {
      $resultado= false;
      $palabra1 = $palabra."%";
      $palabra2= "%".$palabra;
      $id = 0;
      include_once __DIR__ . '/../../core/conexionBd.inc';
      $con = (new conexionBd)->getConexion();
      try{
        /* Iniciar una transacción, desactivando 'autocommit' */
          $con->beginTransaction();
          $sql = "SELECT id FROM dbo.articulo WHERE nombre LIKE ?
                  OR nombre LIKE ? OR nombre LIKE ?
                   OR nombreCorto LIKE ? OR nombreCorto LIKE ? OR nombreCorto LIKE ?
                   OR descripcion LIKE ? OR descripcion LIKE ? OR descripcion LIKE ?;";
         $stmt = $con->prepare($sql);
         $stmt->bindParam(1,$palabra,PDO::PARAM_STR);
         $stmt->bindParam(2,$palabra2,PDO::PARAM_STR);
         $stmt->bindParam(3,$palabra1,PDO::PARAM_STR);
         $stmt->bindParam(4,$palabra,PDO::PARAM_STR);
         $stmt->bindParam(5,$palabra1,PDO::PARAM_STR);
         $stmt->bindParam(6,$palabra2,PDO::PARAM_STR);
         $stmt->bindParam(7,$palabra,PDO::PARAM_STR);
         $stmt->bindParam(8,$palabra1,PDO::PARAM_STR);
         $stmt->bindParam(9,$palabra2,PDO::PARAM_STR);
         $stmt->execute();
          while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
             $id= $row['id'];
          }
          //si hay algun resultado
          if ($id==0) {
            $resultado = false;
          }else{
            //si no hay resultados
            $resultado = true;
          }
            $con->commit();
            return $resultado;
        }catch(PDOException  $e ){
          echo "Error: ".$e;
          /* Reconocer el error y revertir los cambios */
          $con->rollBack();
      }finally {
          $stmt =null;
          $con =null;
      }
    }


    //////3
    //para busqueda tienda comprobar si existe
    public function encontrarTiendaPalabraComprobar(string $palabra) :bool
    {
      $resultado= false;
      $id = 0;
      $palabra1 = $palabra."%";
      $palabra2= "%".$palabra;
      include_once __DIR__ . '/../../core/conexionBd.inc';
      $con = (new conexionBd)->getConexion();
      try{
          $con->beginTransaction();
          $sql = "SELECT id,nombre,provincia,ciudad,tlfno FROM dbo.tienda
          WHERE provincia LIKE ?
          OR ciudad LIKE ?
          OR nombre LIKE ?
          OR nombre LIKE ?
          OR nombre LIKE ?";
          //cursor
          $stmt = $con->prepare($sql);
          $stmt->bindParam(1,$palabra,PDO::PARAM_STR);
          $stmt->bindParam(2,$palabra,PDO::PARAM_STR);
          $stmt->bindParam(3,$palabra,PDO::PARAM_STR);
          $stmt->bindParam(4,$palabra2,PDO::PARAM_STR);
          $stmt->bindParam(5,$palabra1,PDO::PARAM_STR);
          $stmt->execute();
          while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
             $id= $row['id'];
          }
          //si hay algun resultado
          if ($id==0) {
            $resultado = false;
          }else{
            //si no hay resultados
            $resultado = true;
          }
          $con->commit();
          return $resultado;
        }catch(PDOException  $e ){
            echo "Error: ".$e;
          /* Reconocer el error y revertir los cambios */
          $con->rollBack();
        }finally {
          $stmt =null;
          $con =null;
        }
    }

    /////////////4
    //para busqueda familia
  public function encontrarFamiliaPalabra(string $palabra) :array
  {
    $resultado= [];$contador=0;$familiaArray= [];
    include_once __DIR__ . '/../../core/conexionBd.inc';
    $con = (new conexionBd)->getConexion();
    $palabra1 = $palabra."%";
    $palabra2= "%".$palabra;
    try{
      /* Iniciar una transacción, desactivando 'autocommit' */
      $con->beginTransaction();
      $sql = "SELECT id, nombre, descripcion
                        FROM dbo.familia WHERE nombre LIKE ?
                        OR descripcion LIKE ?
                        OR descripcion LIKE ?
                        OR descripcion LIKE ?;";
      $stmt = $con->prepare($sql);
      $stmt->bindParam(1,$palabra,PDO::PARAM_STR);
      $stmt->bindParam(2,$palabra,PDO::PARAM_STR);
      $stmt->bindParam(3,$palabra1,PDO::PARAM_STR);
      $stmt->bindParam(4,$palabra2,PDO::PARAM_STR);
      $stmt->execute();
      while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
         $id = $row['id'];
         $nombre = $row['nombre'];
         $descripcion = $row['descripcion'];
         //crear Familia
         $familiaArray = ["ID" => $id,"NOMBRE" => $nombre,"DESCRIPCION" => $descripcion];
         //include_once __DIR__ . '/../Modelo/familia.inc';
         //$familia = new Familia($familiaArray);
         $resultado[$contador] = $familiaArray;
         $contador++;
      }
      $con->commit();
      return $resultado;
    }catch(PDOException  $e ){
      echo "Error: ".$e;
      $con->rollBack();
    }finally {
        $stmt =null;
        $con =null;
      }

  }

////////////////5
//para busqueda articulo
public function encontrarArticuloPalabra(string $palabra) :array
{
  $resultado=[];$contador=0;$arraryArticulos=[];
  $palabra1 = $palabra."%";
  $palabra2= "%".$palabra;
  include_once __DIR__ . '/../../core/conexionBd.inc';
  $con = (new conexionBd)->getConexion();
  try{
      $con->beginTransaction();
      $sql = "SELECT id,nombreCorto,nombre,descripcion,PVP, idFamilia,imagen FROM dbo.articulo WHERE nombre LIKE ?
              OR nombre LIKE ? OR nombre LIKE ?
               OR nombreCorto LIKE ? OR nombreCorto LIKE ? OR nombreCorto LIKE ?
               OR descripcion LIKE ? OR descripcion LIKE ? OR descripcion LIKE ?;";
      $stmt = $con->prepare($sql);
      $stmt->bindParam(1,$palabra,PDO::PARAM_STR);
      $stmt->bindParam(2,$palabra2,PDO::PARAM_STR);
      $stmt->bindParam(3,$palabra1,PDO::PARAM_STR);
      $stmt->bindParam(4,$palabra,PDO::PARAM_STR);
      $stmt->bindParam(5,$palabra2,PDO::PARAM_STR);
      $stmt->bindParam(6,$palabra1,PDO::PARAM_STR);
      $stmt->bindParam(7,$palabra,PDO::PARAM_STR);
      $stmt->bindParam(8,$palabra2,PDO::PARAM_STR);
      $stmt->bindParam(9,$palabra1,PDO::PARAM_STR);
      $stmt->execute();
      while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
         $id= $row['id'];
         $nombreCorto = $row['nombreCorto'];
         $nombre = $row['nombre'];
         $descripcion = $row['descripcion'];
         $PVP = $row['PVP'];
         $idFamilia = $row['idFamilia'];
         $imagen = $row['imagen'];
         //crear articulo
         //include_once __DIR__ . '/../Modelo/articulo.inc';
         //$articulo = new Articulo([$id,$nombreCorto,$nombre,$descripcion,$PVP,$idFamilia]);//$foto
         $arraryArticulos = ["ID" => $id,"NOMBRE CORTO" => $nombreCorto,"NOMBRE" => $nombre,"DESCRIPCION" => $descripcion,
         "PVP" => $PVP,"ID FAMILIA" => $idFamilia, "IMAGEN" => $imagen];
         $resultado[$contador] = $arraryArticulos;
         $contador++;
      }
      $con->commit();
      return $resultado;
    }catch(PDOException  $e ){
      echo "Error: ".$e;
      $con->rollBack();
  }finally {
    $stmt =null;
    $con =null;
  }

}//FIN metodo

/////////////////6
//para busqueda tienda
 public function encontrarTiendaPalabra(string $palabra) :array
 {
   $resultado = [];$contador=0;$arrayTienda = [];
   $palabra1 = $palabra."%";
   $palabra2= "%".$palabra;
   include_once __DIR__ . '/../../core/conexionBd.inc';
   $con = (new conexionBd)->getConexion();
   try{
       /* Iniciar una transacción, desactivando 'autocommit' */
       $con->beginTransaction();
       $sql = "SELECT id,nombre,provincia,ciudad,tlfno FROM dbo.tienda
       WHERE provincia LIKE ?
       OR ciudad LIKE ?
       OR nombre LIKE ?
       OR nombre LIKE ?
       OR nombre LIKE ?";
       //cursor
       $stmt = $con->prepare($sql);
       $stmt->bindParam(1,$palabra,PDO::PARAM_STR);
       $stmt->bindParam(2,$palabra,PDO::PARAM_STR);
       $stmt->bindParam(3,$palabra,PDO::PARAM_STR);
       $stmt->bindParam(4,$palabra2,PDO::PARAM_STR);
       $stmt->bindParam(5,$palabra1,PDO::PARAM_STR);
       $stmt->execute();
       while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
          $id= $row['id'];
          $nombre = $row['nombre'];
          $provincia = $row['provincia'];
          $ciudad = $row['ciudad'];
          $tlfno = $row['tlfno'];

          //crear Tienda
          //include_once __DIR__ . '/../Modelo/tienda.php';
          //$tienda = new Tienda([$id,$nombre,$provincia,$ciudad,$tlfno]);
          $arrayTienda = ["ID TIENDA" => $id,"NOMBRE" => $nombre,"PROVINCIA" => $provincia,"CIUDAD" => $ciudad,"TELEFONO" => $tlfno];
          $resultado[$contador] = $arrayTienda;
          $contador++;
       }
       $con->commit();
       return $resultado;
     }catch(PDOException  $e ){
         echo "Error: ".$e;
       /* Reconocer el error y revertir los cambios */
       $con->rollBack();
     }finally {
       $stmt =null;
       $con =null;
     }

 }//fin metodo

////////////////////////////fin metodos busquedas

//actualizar foto
public function actualizarFoto(array $elementos) :bool{
    $boolFoto = false;
    include_once __DIR__ . '/../../core/conexionBd.inc';
    include_once __DIR__ . '/../../fuente/modelo/articulo.inc';
    $con = (new conexionBd)->getConexion();
    try{
        $con->beginTransaction();
        $sql = "UPDATE articulo SET imagen = ? WHERE id = ?";
        $fotoF = $elementos['imagen'];//string(12) "BDTIENDA.png"
        $tipo = $elementos['tipo'];//string(12) "BDTIENDA.png"
        if (((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg")) || strpos($tipo, "png"))){
            $stmt = $con->prepare($sql);
            $stmt->bindParam(1, $fotoF, PDO::PARAM_STR);
            $stmt->bindParam(2,$elementos['id'], PDO::PARAM_INT);
            if($stmt->execute()){
                $boolFoto = true;
            }
        }else{
            $boolFoto = false;
        }
        return $boolFoto;
        $con->commit();
    }catch(PDOException $ex){
       throw $ex;
       $con->rollBack();
    }finally{
      $con = null;
      $stmt = null;
    }
}//////////fin metodo


//sacar el id de familia
public function sacarIdFamilia(string $nombreFamilia) :int{
  $sql = "SELECT Id FROM Familia WHERE nombre = ?";
  $id = 0;
  include_once __DIR__ . '/../../core/conexionBd.inc';
  $con = (new conexionBd)->getConexion();
  try{
    $con->beginTransaction();
    $stmt = $con->prepare($sql);
    $stmt->bindParam(1,$nombreFamilia,PDO::PARAM_STR);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      $id = $row['Id'];
    }
    $con->commit();
    return $id;
  }catch(PDOException $ex){
    throw $ex;
    $con->rollBack();
  }finally{
    $con = null;
    $stmt = null;
  }
}



public function altaProducto(string $nombreCorto,string $nombre,string $descripcion,float $PVP,int $idFamilia,array $elementos,
bool $agotado,bool $pocasUnidades) :bool{
    $boolConfirmacion = false;
    $sql ="INSERT INTO Articulo(nombreCorto,nombre,descripcion,PVP,idFamilia,imagen,agotado,pocasUnidades) VALUES(?,?,?,?,?,?,?,?);";
    ///metemos el producto
    include_once __DIR__ . '/../../core/conexionBd.inc';
    include_once __DIR__ . '/../../fuente/modelo/articulo.inc';
    $con = (new ConexionBd)->getConexion();
    try{
        $con->beginTransaction();
        $stmt = $con->prepare($sql);
        $stmt->bindParam(1,$nombreCorto,PDO::PARAM_STR);
        $stmt->bindParam(2,$nombre,PDO::PARAM_STR);
        $stmt->bindParam(3,$descripcion,PDO::PARAM_STR);
        $stmt->bindParam(4,$PVP,PDO::PARAM_INT);
        $stmt->bindParam(5,$idFamilia,PDO::PARAM_INT);
        ////PARA LA imagen
        $fotoF = $elementos['imagen'];//string(12) "BDTIENDA.png"
        $tipo = $elementos['tipo'];//string(12) "BDTIENDA.png"
        if (((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg")) || strpos($tipo, "png"))){
            $stmt->bindParam(6, $fotoF, PDO::PARAM_STR);
        }
        /////////////////////
        $stmt->bindParam(7,$agotado,PDO::PARAM_STR);//PDO::PARAM_BOOL (integer)
        $stmt->bindParam(8,$pocasUnidades,PDO::PARAM_STR);
        if($stmt->execute()){
            $boolConfirmacion = true;
        }
        $con->commit();
        return $boolConfirmacion;
        //////////////////////
    }catch(PDOException $ex){
        throw $ex;
        $con->rollBack();
    }finally{
      $con = null;
      $stmt= null;
    }
    /*
    $boolConfirmacion = false;
    $fotoF = $elementos['imagen'];//string(12) "BDTIENDA.png"
    //$sql ="INSERT INTO Articulo(nombreCorto,nombre,descripcion,PVP,idFamilia,imagen,agotado,pocasUnidades) VALUES(?,?,?,?,?,?,?,?);";
    $sql = "EXEC insertarArticulo '$nombreCorto','$nombre','$descripcion','$PVP', '$idFamilia', '', '$agotado', '$pocasUnidades', ?;";
    $id = 0;
    ///metemos el producto
    include_once __DIR__ . '/../../core/conexionBd.inc';
    include_once __DIR__ . '/../../fuente/modelo/articulo.inc';
    $con = (new ConexionBd)->getConexion();
    try{
        $con->beginTransaction();
        $stmt = $con->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT, 4);
        /////////////////////

        if($stmt->execute()){
            $boolConfirmacion = true;
        }
        return $boolConfirmacion;
        $con->commit();
        //////////////////////
    }catch(PDOException $ex){
        throw $ex;
        $con->rollBack();
    }finally{
      $con = null;
      $stmt= null;
    }
    */

}//FIN metodos

//metodo para borrar articulo
public function borrarArticuloArticulo(int $idArticulo) :bool{
    $boolBorrado = false;
    $sql = "DELETE FROM articulo WHERE id = ? ";
    include_once __DIR__ . '/../../core/conexionBd.inc';
    $con = (new ConexionBd())->getConexion();
    try{
        $con->beginTransaction();
        $stmt = $con->prepare($sql);
        $stmt->bindParam(1,$idArticulo,PDO::PARAM_INT);
        if($stmt->execute()){
            $boolBorrado = true;
        }
        $con->commit();
        return $boolBorrado;
    }catch(PDOException $ex){
        throw $ex;
        $con->rollBack();
    }finally{
        $stmt = null;
        $con = null;
    }
}//fin metodo

//metodo para borrar articulo
public function borrarArticuloAlmacen(int $idArticulo) :bool{
    $boolBorrado = false;
    include_once __DIR__ . '/../../core/conexionBd.inc';
    $con = (new ConexionBd())->getConexion();
    //hay que borrarlo primero del almacen
    $sql = "DELETE FROM almacen WHERE idArticulo = ? ";
    try{
        $con->beginTransaction();
        $stmt = $con->prepare($sql);
        $stmt->bindParam(1,$idArticulo,PDO::PARAM_INT);
        if($stmt->execute()){
            $boolBorrado = true;
        }
        $con->commit();
        return $boolBorrado;
    }catch(PDOException $ex){
        throw $ex;
        $con->rollBack();
    }finally{
        $stmt = null;
        $con = null;
    }
    //borramos articulo
    try{
        $con->beginTransaction();
        $stmt = $con->prepare($sql);
        $stmt->bindParam(1,$idArticulo,PDO::PARAM_INT);
        if($stmt->execute()){
            $boolBorrado = true;
        }else{
            $boolBorrado = false;
        }
        $con->commit();
        return $boolBorrado;
    }catch(PDOException $ex){
        throw $ex;
        $con->rollBack();
    }finally{
        $stmt = null;
        $con = null;
    }


}//fin metodo


public function comprobarArticuloExiste(string $nombreCorto,string $nombre) :bool{
  $sql = "SELECT nombreCorto, nombre FROM articulo;";
  $boolExiste = true;
  include_once __DIR__ . '/../../core/conexionBd.inc';
  try{
      $con = (new conexionBd)->getConexion();
      $con->beginTransaction();
      $stmt = $con->prepare($sql);
      $stmt->execute();
      while($fila =$stmt->fetch(PDO::FETCH_ASSOC)){
          if($fila['nombre'] == $nombre || $fila['nombreCorto'] == $nombreCorto){
            $boolExiste = false;
          }
      }
      $con->commit();
      return $boolExiste;
  }catch(PDOException $ex){
     throw $ex;
     $con->rollBack();
  }finally{
    $con = null;
    $stmt = null;
  }
}//fin metodo

public function devolverIdArticulo(string $nombreCorto,string $nombre) :int{
  $sql = "SELECT id FROM articulo WHERE nombre = ? AND nombreCorto = ?;";
  $ID= 0;
  include_once __DIR__ . '/../../core/conexionBd.inc';
  try{
      $con = (new conexionBd)->getConexion();
      $con->beginTransaction();
      $stmt = $con->prepare($sql);
      $stmt->bindParam(1,$nombre,PDO::PARAM_STR);
      $stmt->bindParam(2,$nombreCorto,PDO::PARAM_STR);
      $stmt->execute();
      while($fila =$stmt->fetch(PDO::FETCH_ASSOC)){
            $ID = $fila['id'];
      }
      $con->commit();
      return $ID;
  }catch(PDOException $ex){
     throw $ex;
     $con->rollBack();
  }finally{
    $con = null;
    $stmt = null;
  }
}//fin metodo

public function devolverArticulo(int $idArticulo) :array{
      $arrayArticulo = [];//include_once __DIR__ . '/../../fuente/modelo/articulo.inc';
      $sql = "SELECT id,nombreCorto,nombre,descripcion,PVP,idFamilia,imagen,agotado,pocasUnidades FROM articulo WHERE id = ? ;";
      include_once __DIR__ . '/../../core/conexionBd.inc';
      include_once __DIR__ . '/../../fuente/modelo/articulo.inc';
      try{
          $con = (new conexionBd)->getConexion();
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->bindParam(1,$idArticulo,PDO::PARAM_INT);
          $stmt->execute();
          while($row =$stmt->fetch(PDO::FETCH_ASSOC)){
              $arrayArticulo[] = new Articulo($row);
          }
          $con->commit();
          return $arrayArticulo;
      }catch(PDOException $ex){
        //throw new Exception("Error Processing Request", 1); //el inc es para los includes
         throw $ex;
         $con->rollBack();
      }finally{
        $con = null;
        $stmt = null;
      }
}//fin metodo


public function modificarProductoArticulo(int $idArticulo,string $nombreArticulo,string $nombreCortoArticulo
,string $descripcionArticulo,float $pvpArticulo,int $idFamilia,array $elementos) :bool{
  $boolModificado = false;
  $sql = "UPDATE articulo SET nombreCorto = ? ,nombre = ? ,descripcion = ? ,PVP = ? ,idFamilia = ? ,imagen= ?  WHERE id = ? ";
  include_once __DIR__ . '/../../core/conexionBd.inc';
  $con = (new ConexionBd())->getConexion();
  try{
      $con->beginTransaction();
      $stmt = $con->prepare($sql);
      $stmt->bindParam(1,$nombreCortoArticulo,PDO::PARAM_STR);
      $stmt->bindParam(2,$nombreArticulo,PDO::PARAM_STR);
      $stmt->bindParam(3,$descripcionArticulo,PDO::PARAM_STR);
      $stmt->bindParam(4,$pvpArticulo,PDO::PARAM_INT);
      $stmt->bindParam(5,$idFamilia,PDO::PARAM_INT);
      ////PARA LA imagen
      $fotoF = $elementos['imagen'];//string(12) "BDTIENDA.png"
      $tipo = $elementos['tipo'];//string(12) "BDTIENDA.png"
      if (((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg")) || strpos($tipo, "png"))){
          $stmt->bindParam(6, $fotoF, PDO::PARAM_STR);
      }
      $stmt->bindParam(7,$idArticulo,PDO::PARAM_INT);
      if($stmt->execute()){
          $boolModificado = true;
      }
      $con->commit();
      return $boolModificado;
  }catch(PDOException $ex){
      throw $ex;
      $con->rollBack();
  }finally{
      $stmt = null;
      $con = null;
  }
}//fin metodo


}//////////fin clase
 ?>
