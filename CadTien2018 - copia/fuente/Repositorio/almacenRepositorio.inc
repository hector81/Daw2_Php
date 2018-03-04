<?php

class AlmacenRepositorio {

    //ver todas las existencias
    public function verExistencias() :array{
     $articulosExistencias=[];
     include_once __DIR__ . '/../../core/conexionBd.inc';
     $con = (new conexionBd)->getConexion();
     try {
       $con->beginTransaction();
       $contador= 0;
       $sql = "SELECT articulo.nombre AS nombreArticulo,tienda.nombre AS nombreTienda, tienda.ciudad AS nombreCiudad,
       tienda.provincia AS nombreProvincia, sum(almacen.stock) AS stock
               FROM dbo.tienda
       JOIN dbo.articulo ON articulo.id = tienda.id
       JOIN dbo.almacen ON almacen.idTienda = tienda.id
               GROUP BY articulo.nombre,tienda.nombre, tienda.ciudad, tienda.provincia
               ORDER BY tienda.ciudad ASC";
       $stmt = $con->query( $sql );
       while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
         $nombreProducto = $row['nombreArticulo'];
         $nombreTienda = $row['nombreTienda'];
         $nombreCiudad = $row['nombreCiudad'];
         $nombreProvincia = $row['nombreProvincia'];
         $stock = $row['stock'];
         $existencia = ['NOMBRE PRODUCTO' => $nombreProducto,'NOMBRE TIENDA' => $nombreTienda,'NOMBRE CIUDAD' => $nombreCiudad,
         'NOMBRE PROVINCIA' => $nombreProvincia,'STOCK' => $stock];
         $articulosExistencias[$contador] = $existencia;
         $contador++;
       }
       $con->commit();
       return $articulosExistencias;
     }
     catch (Exception $e) {
       $con->rollBack();
       echo "Error: ".$e;
     }finally{
        $stmt= null;
        $con= null;
     }

   }//fin metodo

   //mostrar articulos existencias tiendas
   public function mostrarArticulosStockTienda() :array{
     $articulosExistencias=[];$contador =0;
     include_once __DIR__ . '/../../core/conexionBd.inc';
     $con = (new conexionBd)->getConexion();
     $sql = "SELECT tienda.ciudad as tiendaCiudad,tienda.provincia as tiendaProvincia, tienda.nombre as tiendaNombre,
     articulo.id as articuloId, tienda.id
        as tiendaId
     ,articulo.nombre as articuloNombre, a.stock  as articulosStock,articulo.imagen as imagenArticulo  FROM almacen as a
          INNER JOIN articulo ON a.idArticulo = articulo.id
          INNER JOIN tienda ON a.idTienda = tienda.id;";
      try {
        $con->beginTransaction();
        $stmt = $con->prepare($sql);
        $stmt->execute();
        while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
          $tiendaCiudad = $row['tiendaCiudad'];
          $tiendaProvincia = $row['tiendaProvincia'];
          $tiendaNombre = $row['tiendaNombre'];
          $articuloId = $row['articuloId'];
          $tiendaId = $row['tiendaId'];
          $articuloNombre = $row['articuloNombre'];
          $articulosStock = $row['articulosStock'];
          $imagenArticulo = $row['imagenArticulo'];
          $existencia = ['CIUDAD' => $tiendaCiudad,'PROVINCIA' => $tiendaProvincia,'NOMBRE TIENDA' => $tiendaNombre,
          "idArticulo" => $articuloId,"idTienda" => $tiendaId,
          'NOMBRE ARTÍCULO' => $articuloNombre,'STOCK' => $articulosStock,'IMAGEN' => $imagenArticulo];
          $articulosExistencias[$contador] = $existencia;
          $contador++;
        }
        $con->commit();
        return $articulosExistencias;
      }
      catch (Exception $e) {
        $con->rollBack();
        echo "Error: ".$e;
      }finally{
         $stmt= null;
         $con= null;
      }

   }//fin metodo

   public function modificarArticulosStockTienda(int $artId,int $tiendaId,int $numeroNuevoStock) :bool{
      $BOOLc= false;
      $sql = "UPDATE Almacen SET stock = ? WHERE idArticulo = ? AND idTienda = ?;";
      include_once __DIR__ . '/../../core/conexionBd.inc';
      $con = (new conexionBd)->getConexion();
      try{
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->bindParam(1,$numeroNuevoStock,PDO::PARAM_INT);
          $stmt->bindParam(2,$artId,PDO::PARAM_INT);
          $stmt->bindParam(3,$tiendaId,PDO::PARAM_INT);
          //$stmt->debugDumpParams();
          if($stmt->execute()){
              $BOOLc= true;
          }
          $con->commit();
          return $BOOLc;
      }catch(PDOException $ex){
          throw $ex;
          $con->rollBack();
      }finally{
          $con = null;
          $stmt = null;
      }
   }//fin metodo

   public function modificarAlmacenCarrito(array $carrito) :bool{
     $idArticulo = 0;
     $cantidad =  0;
     $idTienda =  0;
     foreach ($carrito as $key => $value) {
         $idArticulo = (int)$value->getIdArticulo();
         $cantidad = (int)$value->getCantidad();
         $idTienda = (int)$value->getIdTienda();
         $BOOLc= false;
         $sql = "UPDATE Almacen SET stock = (stock - ? ) WHERE idArticulo = ? AND idTienda = ?;";
         include_once __DIR__ . '/../../core/conexionBd.inc';
         $con = (new conexionBd)->getConexion();
         try{
             $con->beginTransaction();
             $stmt = $con->prepare($sql);
             $stmt->bindParam(1,$cantidad,PDO::PARAM_INT);
             $stmt->bindParam(2,$idArticulo,PDO::PARAM_INT);
             $stmt->bindParam(3,$idTienda,PDO::PARAM_INT);
             //$stmt->debugDumpParams();
             if($stmt->execute()){
                 $BOOLc= true;
             }
             $con->commit();
             return $BOOLc;
         }catch(PDOException $ex){
             throw $ex;
             $con->rollBack();
         }finally{
             $con = null;
             $stmt = null;
         }

       }//fin 1 foreach

   }//fin metodo


   public function introducirStockTienda(int $artId,int $tiendaId,int $numeroNuevoStock) :bool{
      $BOOLc= false;
      $sql = "INSERT INTO Almacen(idArticulo,idTienda,stock) VALUES(?,?,?);";
      include_once __DIR__ . '/../../core/conexionBd.inc';
      $con = (new conexionBd)->getConexion();
      try{
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->bindParam(1,$artId,PDO::PARAM_INT);
          $stmt->bindParam(2,$tiendaId,PDO::PARAM_INT);
          $stmt->bindParam(3,$numeroNuevoStock,PDO::PARAM_INT);
          //$stmt->debugDumpParams();
          if($stmt->execute()){
              $BOOLc= true;
          }
          $con->commit();
          return $BOOLc;
      }catch(PDOException $ex){
          throw $ex;
          $con->rollBack();
      }finally{
          $con = null;
          $stmt = null;
      }
   }//fin metodo

   //PARA COMPROBAR EL STOCK
   public function comprobarStockExistencias(int $idTienda,int $idArticulo) :bool
   {
     $confirmacion =false;
     include_once __DIR__ . '/../../core/conexionBd.inc';
     $con = (new conexionBd)->getConexion();
     $stock= 0;
     try{
         /* Iniciar una transacción, desactivando 'autocommit' */
         $con->beginTransaction();
         $sql = "SELECT stock FROM dbo.almacen WHERE
                           idTienda LIKE ? AND idArticulo LIKE ?;";
         $stmt = $con->prepare($sql);
         $stmt->bindParam(1,$idTienda,PDO::PARAM_INT);
         $stmt->bindParam(2,$idArticulo,PDO::PARAM_INT);
         $stmt->execute();
         while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
           $stock = $row['stock'];
         }
         if($stock < 1){
             $confirmacion =false;
         }elseif($stock > 0){
             $confirmacion =true;
         }
         $con->commit();
         return $confirmacion;
     }catch(PDOException  $eX ){
         echo "Error: ".$eX;
         $con->rollback();
     }finally {
         $con = null;
         $stmt = null;
       }

   }//fin metodo

}//fin clase


 ?>
