<?php
  class TiendaRepositorio {
      //metodo para ver todas las nuestas tiendas
      public function verTiendasCadena() :array{
          $tiendas = [];
          $query = "SELECT id,nombre,provincia,ciudad,tlfno FROM Tienda;";
          include_once __DIR__ . '/../../core/conexionBd.inc';
          include_once __DIR__ . '/../../fuente/modelo/tienda.inc';
          try{
              $con = (new ConexionBd())->getConexion();
              $con->beginTransaction();
              $stmt = $con->prepare($query);
              $stmt->execute();
              while($row = $stmt->fetch(PDO::FETCH_ASSOC))
              {
                $tiendas[] = new Tienda($row);
              }
              $con->commit();
              return $tiendas;
          }catch(PDOExcepction $ex){
              throw $ex;
              $con->rollBack();
          }finally{
              $con = null;
              $stmt =null;
          }
      }

      //metodo para ver todas las nuestas tiendas
      public function verTiendasPorProvincia(string $provincia) :array{
          $query = "SELECT DISTINCT id,nombre,provincia,ciudad,tlfno FROM Tienda WHERE provincia = ?;";
          include_once __DIR__ . '/../../core/conexionBd.inc';
          include_once __DIR__ . '/../../fuente/modelo/tienda.inc';
          try{
              $con = (new ConexionBd())->getConexion();
              $con->beginTransaction();
              $stmt = $con->prepare($query);
              $stmt->bindParam(1,$provincia,PDO::PARAM_STR);
              $stmt->execute();
              while($row = $stmt->fetch(PDO::FETCH_ASSOC))
              {
                $tiendasProvincia[] = new Tienda($row);
              }
              $con->commit();
              return $tiendasProvincia;
          }catch(PDOExcepction $ex){
              throw $ex;
              $con->rollBack();
          }finally{
              $con = null;
              $stmt =null;
          }
      }//fin metodo

      //metodo para ver todas las nuestas tiendas
      public function verTodasTiendasCiudad() :array{
          $tiendas = [];$contador=0;
          //$contador1=0;
          //$contador2=0;$tiendasNombre = [];$nombreProvincia = "";
          /*
          $query1 = "SELECT DISTINCT provincia FROM Tienda;";
          $query2 = "SELECT id, nombre FROM Tienda WHERE provincia = ?;";
          include_once __DIR__ . '/../../core/conexionBd.inc';
          try{
              $con = (new ConexionBd())->getConexion();
              $con->beginTransaction();
              $stmt1 = $con->prepare($query1);
              $stmt1->execute();
              while($row = $stmt1->fetch(PDO::FETCH_ASSOC))
              {
                $provincias[$contador1] = ["provincia" => $row['provincia']];
                $contador1++;
              }
              $contador1=0;
              foreach ($provincias as $key => $value) {
                  foreach ($value as $key1 => $value1) {
                        $stmt2 = $con->prepare($query2);
                        $stmt2->bindParam(1,$value1,PDO::PARAM_STR);
                        $stmt2->execute();
                        while($row = $stmt2->fetch(PDO::FETCH_ASSOC))
                        {
                          $tiendasNombre[$contador1] = ["id" => $row['id'],"nombre" => $row['nombre']];
                          $contador1++;
                        }
                        $tiendas[$contador2] =$tiendasNombre;
                        $contador2++;
                  }

              }

              return $tiendas;
              $con->commit();
          }catch(PDOExcepction $ex){
              throw $ex;
              $con->rollBack();
          }finally{
              $con = null;
              $stmt1 =null;
              $stmt2 =null;
          }
          */
          include_once __DIR__ . '/../../fuente/modelo/tienda.inc';
          include_once __DIR__ . '/../../core/conexionBd.inc';
          try{
              $query = "SELECT id, nombre FROM Tienda;";
              $con = (new ConexionBd())->getConexion();
              $con->beginTransaction();
              $stmt = $con->prepare($query);
              $stmt->execute();
              while($row = $stmt->fetch(PDO::FETCH_ASSOC))
              {
                $tiendas[$contador] = ["id" => $row['id'],"nombre" => $row['nombre']];
                $contador++;
              }
              $con->commit();
              return $tiendas;
          }catch(PDOExcepction $ex){
              throw $ex;
              $con->rollBack();
          }finally{
              $con = null;
              $stmt =null;
          }

      }//fin metodo

      public function devolverProvinciasDistintas() :array{
        $arrayProvincias = [];$contador =0;
        include_once __DIR__ . '/../../core/conexionBd.inc';
        try{
            $query = "SELECT DISTINCT provincia FROM Tienda;";
            $con = (new ConexionBd())->getConexion();
            $con->beginTransaction();
            $stmt = $con->prepare($query);
            $stmt->execute();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
              $arrayProvincias[$contador] = $row['provincia'];
              $contador++;
            }
            $con->commit();
            return $arrayProvincias;
        }catch(PDOExcepction $ex){
            throw $ex;
            $con->rollBack();
        }finally{
            $con = null;
            $stmt =null;
        }
      }//fin metodo


      //metodo para ver todas las nuestas tiendas
      public function verArticulosPorTienda(string $nombreTienda) :array{
          $articulos = [];
          $query = "select articulo.id,articulo.nombreCorto, articulo.nombre,
articulo.descripcion,articulo.PVP,articulo.idFamilia,articulo.imagen,articulo.agotado,articulo.pocasUnidades
from articulo
INNER JOIN almacen ON articulo.id = almacen.idArticulo AND almacen.stock > 0
INNER JOIN tienda ON Almacen.idTienda = tienda.id AND tienda.nombre = ?;";
          include_once __DIR__ . '/../../core/conexionBd.inc';
          include_once __DIR__ . '/../../fuente/modelo/articulo.inc';
          try{
              $con = (new ConexionBd())->getConexion();
              $con->beginTransaction();
              $stmt = $con->prepare($query);
              $stmt->bindParam(1,$nombreTienda,PDO::PARAM_INT);
              $stmt->execute();
              while($row = $stmt->fetch(PDO::FETCH_ASSOC))
              {
                $articulos[] = new Articulo($row);
              }
              $con->commit();
              return $articulos;
          }catch(PDOExcepction $ex){
              throw $ex;
              $con->rollBack();
          }finally{
              $con = null;
              $stmt =null;
          }
      }//fin metodo



      public function borrarrArticulosPorTienda(int $ID) :bool{
          $query = "DELETE FROM Almacen WHERE idArticulo =  ?;";
          include_once __DIR__ . '/../../core/conexionBd.inc';
          $boolConfirmacion = false;
          try{
              $con = (new ConexionBd())->getConexion();
              $con->beginTransaction();
              $stmt = $con->prepare($query);
              $stmt->bindParam(1,$ID,PDO::PARAM_INT);

              if($stmt->execute()){
                $boolConfirmacion = true;
              }
              $con->commit();
              return $boolConfirmacion;
          }catch(PDOExcepction $ex){
              throw $ex;
              $con->rollBack();
          }finally{
              $con = null;
              $stmt =null;
          }
      }//fin metodo

      public function modificarTienda(string $nombreTienda,string $nombreProvincia,string $nombreCiudad,string $telefonoTienda) :bool{
          $query = "UPDATE Tienda SET nombre = ?,provincia = ?,ciudad = ?,tlfno = ? WHERE nombre = ?;";
          include_once __DIR__ . '/../../core/conexionBd.inc';
          $boolConfirmacion = false;
          try{
              $con = (new ConexionBd())->getConexion();
              $con->beginTransaction();
              $stmt = $con->prepare($query);
              $stmt->bindParam(1,$nombreTienda,PDO::PARAM_STR);
              $stmt->bindParam(2,$nombreProvincia,PDO::PARAM_STR);
              $stmt->bindParam(3,$nombreCiudad,PDO::PARAM_STR);
              $stmt->bindParam(4,$telefonoTienda,PDO::PARAM_STR);
              $stmt->bindParam(5,$nombreTienda,PDO::PARAM_STR);
              if($stmt->execute()){
                $boolConfirmacion = true;
              }
              $con->commit();
              return $boolConfirmacion;
          }catch(PDOExcepction $ex){
              throw $ex;
              $con->rollBack();
          }finally{
              $con = null;
              $stmt =null;
          }
      }//fin metodo

      public function insertarTienda(string $nombreTienda,string $nombreProvincia,string $nombreCiudad,string $telefonoTienda) :bool{
          $query = "INSERT INTO Tienda(nombre,provincia,ciudad,tlfno) VALUES(?,?,?,?);";
          include_once __DIR__ . '/../../core/conexionBd.inc';
          $boolConfirmacion = false;
          try{
              $con = (new ConexionBd())->getConexion();
              $con->beginTransaction();
              $stmt = $con->prepare($query);
              $stmt->bindParam(1,$nombreTienda,PDO::PARAM_STR);
              $stmt->bindParam(2,$nombreProvincia,PDO::PARAM_STR);
              $stmt->bindParam(3,$nombreCiudad,PDO::PARAM_STR);
              $stmt->bindParam(4,$telefonoTienda,PDO::PARAM_STR);
              if($stmt->execute()){
                $boolConfirmacion = true;
              }
              $con->commit();
              return $boolConfirmacion;
          }catch(PDOExcepction $ex){
              throw $ex;
              $con->rollBack();
          }finally{
              $con = null;
              $stmt =null;
          }
      }//fin metodo

      public function sacarIdTienda(string $nombreTienda) :int{
          $query = "SELECT id FROM Tienda WHERE nombre =  ?;";
          include_once __DIR__ . '/../../core/conexionBd.inc';
          $id = 0;
          try{
              $con = (new ConexionBd())->getConexion();
              $con->beginTransaction();
              $stmt = $con->prepare($query);
              $stmt->bindParam(1,$nombreTienda,PDO::PARAM_STR);
              $stmt->execute();
              while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $id = $row['id'];
              }
              $con->commit();
              return $id;
          }catch(PDOExcepction $ex){
              throw $ex;
              $con->rollBack();
          }finally{
              $con = null;
              $stmt =null;
          }
      }//fin metodo

      public function verTiendaPorId(int $idtienda) :array{
            $sql = "SELECT id,nombre,provincia,ciudad,tlfno FROM Tienda WHERE id = ?";
            include_once __DIR__ . '/../../core/conexionBd.inc';
            include_once __DIR__ . '/../../fuente/modelo/tienda.inc';
            $arrayTienda = [];
            try{
                $con = (new ConexionBd())->getConexion();
                $con->beginTransaction();
                $stmt = $con->prepare($sql);
                $stmt->bindParam(1,$idtienda,PDO::PARAM_INT);
                $stmt->execute();
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                  $arrayTienda[] = new Tienda($row);
                }
                $con->commit();
                return $arrayTienda;
            }catch(PDOExcepction $ex){
                throw $ex;
                $con->rollBack();
            }finally{
                $con = null;
                $stmt =null;
            }
      }//fin metodo

      public function comprobarTiendaExiste(string $nombre,string $nombreCiudad) :bool{
        $sql = "SELECT nombre, ciudad FROM tienda;";
        $boolExiste = true;
        include_once __DIR__ . '/../../core/conexionBd.inc';
        try{
            $con = (new conexionBd)->getConexion();
            $con->beginTransaction();
            $stmt = $con->prepare($sql);
            $stmt->execute();
            while($fila =$stmt->fetch(PDO::FETCH_ASSOC)){
                if($fila['nombre'] == $nombre || $fila['ciudad'] == $nombreCiudad){
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

      public function borrarTienda(int $idTienda) :bool{
        $sql = "DELETE FROM Tienda where id = ?;";
        $boolE = false;
        include_once __DIR__ . '/../../core/conexionBd.inc';
        try{
            $con = (new conexionBd)->getConexion();
            $con->beginTransaction();
            $stmt = $con->prepare($sql);
            $stmt->bindParam(1,$idtienda,PDO::PARAM_INT);
            if($stmt->execute()){
                $boolE = true;
            }

            $con->commit();
            return $boolE;
        }catch(PDOException $ex){
           throw $ex;
           $con->rollBack();
        }finally{
          $con = null;
          $stmt = null;
        }
      }//fin metodo

      public function borrarTiendaAlmacen(int $idTienda) :bool{
        $sql = "DELETE FROM Almacen where idTienda = ?;";
        $boolE = false;
        include_once __DIR__ . '/../../core/conexionBd.inc';
        try{
            $con = (new conexionBd)->getConexion();
            $con->beginTransaction();
            $stmt = $con->prepare($sql);
            $stmt->bindParam(1,$idtienda,PDO::PARAM_INT);
            if($stmt->execute()){
                $boolE = true;
            }

            $con->commit();
            return $boolE;
        }catch(PDOException $ex){
           throw $ex;
           $con->rollBack();
        }finally{
          $con = null;
          $stmt = null;
        }
      }//fin metodo

      public function comprobarStockArticuloTienda(int $idArticulo,int $idTienda,int $numeroArticulos) :bool{
            $sql = "SELECT idTienda,idArticulo,stock FROM Almacen where idTienda = ? AND idArticulo = ?;";
            $boolE = true;
            include_once __DIR__ . '/../../core/conexionBd.inc';
            try{
                $con = (new conexionBd)->getConexion();
                $con->beginTransaction();
                $stmt = $con->prepare($sql);
                $stmt->bindParam(1,$idtienda,PDO::PARAM_INT);
                $stmt->bindParam(2,$idArticulo,PDO::PARAM_INT);
                $stmt->execute();
                    while($fila =$stmt->fetch(PDO::FETCH_ASSOC)){
                      echo ' ------------ ';echo $fila['idTienda'];echo ' ------------ ';
                      echo ' ------------ ';echo $fila['idArticulo'];echo ' ------------ ';
                      echo ' ------------ ';echo $fila['stock'];echo ' ------------ ';

                      if($numeroArticulos > $fila['stock']){
                          $boolE = false;
                      }
                    }

                $con->commit();
                return $boolE;
            }catch(PDOException $ex){
               throw $ex;
               $con->rollBack();
            }finally{
              $con = null;
              $stmt = null;
            }
      }//fin metodo


  }//fin clase
?>
