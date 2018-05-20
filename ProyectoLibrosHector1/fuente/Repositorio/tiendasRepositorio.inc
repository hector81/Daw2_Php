<?php

class TiendasRepositorio
{

  public function devolverTiendaInicial() :array{
      include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
      include_once __DIR__ . '/../../fuente/modelo/tiendas.inc';
      $con = (new ConexionBaseDatos)->getConexion();
      $sql = "SELECT IdTienda, Nombre, IdCiudad, Telefono ,Direccion,ImagenTienda, srcIframe FROM Tiendas WHERE IdTienda LIKE 1;";
      $tienda =[];
      try{
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->execute();
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
              $tienda[] = new Tiendas($row);
          }
          $con->commit();
          return $tienda;
      }catch(PDOException $ex){
        throw $ex;
        $con->rollBack();
      }finally{
        $con = null;
        $stmt = null;
      }
  }//fin metodo

  public function devolverTiendasTotales() :array{
      include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
      include_once __DIR__ . '/../../fuente/modelo/tiendas.inc';
      $con = (new ConexionBaseDatos)->getConexion();
      $sql = "SELECT IdTienda, Nombre, IdCiudad, Telefono ,Direccion,ImagenTienda, srcIframe FROM Tiendas   ORDER BY Nombre ASC;";
      $tienda =[];
      try{
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->execute();
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
              $tienda[] = new Tiendas($row);
          }
          $con->commit();
          return $tienda;
      }catch(PDOException $ex){
        throw $ex;
        $con->rollBack();
      }finally{
        $con = null;
        $stmt = null;
      }
  }//fin metodo

  public function devolverTiendaIndividual(int $idTienda) :array{
      include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
      include_once __DIR__ . '/../../fuente/modelo/tiendas.inc';
      $con = (new ConexionBaseDatos)->getConexion();
      $sql = "SELECT IdTienda, Nombre, IdCiudad, Telefono ,Direccion,ImagenTienda, srcIframe FROM Tiendas WHERE IdTienda = ?;";
      $tienda =[];
      try{
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->bindParam(1,$idTienda,PDO::PARAM_INT);
          $stmt->execute();
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
              $tienda[] = new Tiendas($row);
          }
          $con->commit();
          return $tienda;
      }catch(PDOException $ex){
        throw $ex;
        $con->rollBack();
      }finally{
        $con = null;
        $stmt = null;
      }
  }//fin metodo

  //esta funcion borra una tienda según el id de tienda que le pasemos
  public function borrarTienda(int $idTienda) :bool{
    include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
    $con1 = (new ConexionBaseDatos)->getConexion();
    $sql1 = "DELETE FROM Almacen WHERE IdTienda = ?;";
    $boolTienda1 =false;
    //primero borramos del almacen
    try{
        $con1->beginTransaction();
        $stmt1 = $con1->prepare($sql1);
        $stmt1->bindParam(1,$idTienda,PDO::PARAM_INT);
        if($stmt1->execute()){
            $boolTienda1 =true;
        }
        $con1->commit();
    }catch(PDOException $ex){
      throw $ex;
      $con1->rollBack();
    }finally{
      $con1 = null;
      $stmt1 = null;
    }
    //y luego borramos la tiendas
    $con2 = (new ConexionBaseDatos)->getConexion();
    $sql2 = "DELETE FROM Tiendas WHERE IdTienda = ?;";
    $boolTienda2 =false;
    //primero borramos del almacen
    try{
        $con2->beginTransaction();
        $stmt2 = $con2->prepare($sql2);
        $stmt2->bindParam(1,$idTienda,PDO::PARAM_INT);
        if($stmt2->execute()){
            $boolTienda2 =true;
        }
        $con2->commit();
    }catch(PDOException $ex){
      throw $ex;
      $con2->rollBack();
    }finally{
      $con2 = null;
      $stmt2 = null;
    }
    $boolTienda3 =false;
    if($boolTienda1 && $boolTienda2){
        $boolTienda3 =true;
    }
    return $boolTienda3;
  }//fin metodo

  public function insertarImagenYsacarRutaImagen(string $name,string $type, string $tmp_name,string $error,string $size) :array{
        //Subimos imagen cargando con ajax
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp'); // valid extensions
        $path = 'C:/xampp/htdocs/ProyectoLibrosHector1/Imagenes/ImagenesTienda/'; // upload directory

        if(isset($name) && isset($type) && isset($tmp_name) && isset($error) && isset($size))
        {
         // get uploaded file's extension
         $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
         // can upload same image using rand function
         $final_image = rand(1000,1000000).$name;

         // comprobamos que sea un formato valido
         if(in_array($ext, $valid_extensions))
         {
          $path = $path.strtolower($final_image);
          //este metodo mueve la foto al fichero
          move_uploaded_file($tmp_name,$path);
         }
         else
         {
          echo 'invalid file';
         }
        }
        //////////////////FIN introduccion IMAGEN //////////////////
        $elementos = array('imagen' => $final_image, 'tipo' => $type);
        return $elementos;
  }//fin metodo

  public function insertarTiendaModificada(array $subirFoto,string $nombreTienda,int $municipio,string $telefonoTienda,
  string $direccionTienda,string $srcIframe,int $idTienda) :bool{
        include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
        $con = (new ConexionBaseDatos)->getConexion();
        $sql = "UPDATE Tiendas SET Nombre = ?, IdCiudad = ?,Telefono = ?,Direccion = ?,ImagenTienda = ?, srcIframe = ? WHERE IdTienda = ?;";
        $boolTienda = false;
        try{
            $con->beginTransaction();
            $stmt = $con->prepare($sql);
            $stmt->bindParam(1,$nombreTienda,PDO::PARAM_STR);
            $stmt->bindParam(2,$municipio,PDO::PARAM_STR);
            $stmt->bindParam(3,$telefonoTienda,PDO::PARAM_STR);
            $stmt->bindParam(4,$direccionTienda,PDO::PARAM_STR);
            ////PARA LA imagen
            $fotoF = $subirFoto['imagen'];//string
            $tipo = $subirFoto['tipo'];//string
            $rutaImagenSubida = 'Imagenes/ImagenesTienda/'.$fotoF;
            if ( strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png") || strpos($tipo, "bmp") ){
                $stmt->bindParam(5,$rutaImagenSubida,PDO::PARAM_STR);
            }
            $stmt->bindParam(6,$srcIframe,PDO::PARAM_STR);
            $stmt->bindParam(7,$idTienda,PDO::PARAM_STR);
            if($stmt->execute()){
                $boolTienda = true;
            }
            $con->commit();
            return $boolTienda;
        }catch(PDOException $ex){
          throw $ex;
          $con->rollBack();
        }finally{
          $con = null;
          $stmt = null;
        }
  }//fin metodo

  public function insertarTienda(array $subirFoto,string $nombreTienda,int $municipio,string $telefonoTienda,
  string $direccionTienda,string $srcIframe) :bool{
        include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
        $con = (new ConexionBaseDatos)->getConexion();
        $sql = "INSERT INTO Tiendas(Nombre,IdCiudad,Telefono,Direccion,ImagenTienda,srcIframe) VALUES(?,?,?,?,?,?);";
        $boolTienda = false;
        try{
            $con->beginTransaction();
            $stmt = $con->prepare($sql);
            $stmt->bindParam(1,$nombreTienda,PDO::PARAM_STR);
            $stmt->bindParam(2,$municipio,PDO::PARAM_STR);
            $stmt->bindParam(3,$telefonoTienda,PDO::PARAM_STR);
            $stmt->bindParam(4,$direccionTienda,PDO::PARAM_STR);
            ////PARA LA imagen
            $fotoF = $subirFoto['imagen'];//string
            $tipo = $subirFoto['tipo'];//string
            $rutaImagenSubida = 'Imagenes/ImagenesTienda/'.$fotoF;
            if ( strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png") || strpos($tipo, "bmp") ){
                $stmt->bindParam(5,$rutaImagenSubida,PDO::PARAM_STR);
            }
            $stmt->bindParam(6,$srcIframe,PDO::PARAM_STR);
            if($stmt->execute()){
                $boolTienda = true;
            }
            $con->commit();
            return $boolTienda;
        }catch(PDOException $ex){
          throw $ex;
          $con->rollBack();
        }finally{
          $con = null;
          $stmt = null;
        }
  }//fin metodo

}//fin clase
