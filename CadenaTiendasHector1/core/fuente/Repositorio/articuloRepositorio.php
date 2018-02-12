<?php

class ArticuloRepositorio
{
  public function comprobarArticuloExiste($nombre){
    $resultado = false;
    $nombreComprobar = '';
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    try{
        /* Iniciar una transacción, desactivando 'autocommit' */
        $conexionBD->beginTransaction();
        $sql = "SELECT nombre FROM dbo.articulo WHERE nombre LIKE '$nombre'
                OR nombre LIKE '%$nombre' OR nombre LIKE '$nombre%'
                 OR nombreCorto LIKE '$nombre%' OR nombreCorto LIKE '$nombre%' OR nombreCorto LIKE '$nombre%';";
        $stmt = $conexionBD->query($sql);
        while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
           $nombreComprobar = $row['nombre'];
        }
        //si no hay resultados
        if ($nombreComprobar == '') {
          $resultado = false;
        }else{
          //si hay algun resultado
          $resultado = true;
        }
        /* Consignar los cambios */
          $conexionBD->commit();
    }catch(PDOException  $e ){
      echo "Error: ".$e;
      /* Reconocer el error y revertir los cambios */
      $conexionBD->rollBack();
    }finally {
    	if($stmt !=null){
        $stmt =null;
      }
      if($conexionBD !=null){
        $conexionBD !=null;
      }
    }
    return $resultado;
  }

  public function comprobarArticuloNombreExiste($nombre){
    $resultado = false;
    $nombreComprobar = '';
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    try{
        /* Iniciar una transacción, desactivando 'autocommit' */
        $conexionBD->beginTransaction();
        $sql = "SELECT nombre FROM dbo.articulo WHERE nombre LIKE '$nombre'";
        $stmt = $conexionBD->query($sql);
        while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
           $nombreComprobar = $row['nombre'];
        }
        //si no hay resultados
        if ($nombreComprobar == '') {
          $resultado = false;
        }else{
          //si hay algun resultado
          $resultado = true;
        }
        /* Consignar los cambios */
          $conexionBD->commit();
    }catch(PDOException  $e ){
      echo "Error: ".$e;
      /* Reconocer el error y revertir los cambios */
      $conexionBD->rollBack();
    }finally {
    	if($stmt !=null){
        $stmt =null;
      }
      if($conexionBD !=null){
        $conexionBD !=null;
      }
    }
    return $resultado;
  }

  public function findArticuloByNombre($nombre)
  {
    include __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    $cursor = null;
    try{
        /* Iniciar una transacción, desactivando 'autocommit' */
        $conexionBD->beginTransaction();
        $sql = "SELECT id, nombreCorto, nombre, descripcion, PVP, idFamilia
                  FROM articulo
                 WHERE nombre LIKE '%' + ? + '%'";
        include __DIR__ . '/../../core/conexionBd.php';
        $con = (new ConexionBd())->getConexion();

        $cursor = $con->prepare($sql, array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));

        $cursor->execute($nombre);

        $articulos = array();
        while ($fil = $cursor->fetch(PDO::FETCH_ASSOC))
        { $articulos[] = new Articulo($fil);
        }
        /* Consignar los cambios */
          $conexionBD->commit();
    }catch(PDOException  $e ){
        echo "Error: ".$e;
      /* Reconocer el error y revertir los cambios */
      $conexionBD->rollBack();
    }finally {
    	if($cursor !=null){
        $cursor =null;
      }
      if($conexionBD !=null){
        $conexionBD !=null;
      }
    }
    return $articulos;
  }

  public function findArticuloById($id)
  {
      include __DIR__ . '/../../core/conexionBd.php';
      $conexionBD = (new ConexionBd())->getConexion();
      $cursor = null;
      try{
          /* Iniciar una transacción, desactivando 'autocommit' */
          $conexionBD->beginTransaction();
            $sql = "SELECT id, nombreCorto, nombre, descripcion, PVP, idFamilia
                    FROM articulo
                    WHERE id = ?";


          //$articulo = array();
          $cursor = $con->prepare($sql);

          $cursor->execute($id);
          $cursor->bindColumn(1, $articulo['id'], PDO::PARAM_INT);
          $cursor->bindColumn(2, $articulo['nombreCorto']);
          $cursor->bindColumn(3, $articulo['nombre']);
          $cursor->bindColumn(4, $articulo['descripcion']);
          $cursor->bindColumn(5, $articulo['PVP']);
          $cursor->bindColumn(6, $articulo['idFamilia']);
          //$cursor->bindColumn(7, $articulo['foto'], PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
          $cursor->fetch(PDO::FETCH_BOUND);
          /* Consignar los cambios */
          $conexionBD->commit();
      }catch(PDOException  $e ){
                echo "Error: ".$e;
              /* Reconocer el error y revertir los cambios */
              $conexionBD->rollBack();
            }finally {
            	if($cursor !=null){
                $cursor =null;
              }
              if($conexionBD !=null){
                $conexionBD !=null;
              }
            }
      return (new Articulo($articulo));
  }

  public function findFotoById($id)
  {
    include __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    $cursor = null;
    try{
        /* Iniciar una transacción, desactivando 'autocommit' */
        $conexionBD->beginTransaction();

        $sql = "SELECT foto
                  FROM articulo
                 WHERE id ?";

        $cursor = $conexionBD->prepare($sql);

        $cursor->execute($id);
        $cursor->bindColumn(1, $foto, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
        $cursor->fetch(PDO::FETCH_BOUND);

        echo $foto;

        /* Consignar los cambios */
        $conexionBD->commit();
      }catch(PDOException  $e ){
            echo "Error: ".$e;
          /* Reconocer el error y revertir los cambios */
          $conexionBD->rollBack();
        }finally {
        	if($cursor !=null){
            $cursor =null;
          }
          if($conexionBD !=null){
            $conexionBD !=null;
          }
        }
  }

  public function actualizaFoto($params)
  {
    include __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    $subeFoto = null;
    try{
        /* Iniciar una transacción, desactivando 'autocommit' */
        $conexionBD->beginTransaction();
        $sql = "UPDATE articulo
                 SET foto = ?
               WHERE id = ?";

        $subeFoto = $conexionBD->prepare($sql);
        $subeFoto->bindParam(1, $params['foto'], PDO::PARAM_LOB, 0,
                                             PDO::SQLSRV_ENCODING_BINARY);
        $subeFoto->bindParam(2, $params['id']);
        $subeFoto->execute();
        /* Consignar los cambios */
        $conexionBD->commit();
    }catch(PDOException  $e ){
        echo "Error: ".$e;
      /* Reconocer el error y revertir los cambios */
      $conexionBD->rollBack();
    }finally {
    	if($subeFoto !=null){
        $subeFoto =null;
      }
      if($conexionBD !=null){
        $conexionBD !=null;
      }
    }
  }


  public function visualizarArticulo($nombre)
  {
      $resultado[]=null;
      require_once __DIR__ . '/../../core/conexionBd.php';
      $conexionBD = (new ConexionBd())->getConexion();
      $articulo = null;
      $stmt = null;
      try{
        /* Iniciar una transacción, desactivando 'autocommit' */
          $conexionBD->beginTransaction();
          $sql = "SELECT id,nombreCorto,nombre,descripcion,PVP, idFamilia,foto FROM dbo.articulo WHERE nombre LIKE '$nombre'
                  OR nombre LIKE '%$nombre' OR nombre LIKE '$nombre%'
                   OR nombreCorto LIKE '$nombre%' OR nombreCorto LIKE '$nombre%' OR nombreCorto LIKE '$nombre%';";
          $stmt = $conexionBD->query( $sql );
          $contador=0;
          while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
             $id= $row['id'];
             $nombreCorto = $row['nombreCorto'];
             $nombre = $row['nombre'];
             $descripcion = $row['descripcion'];
             $PVP = $row['PVP'];
             $idFamilia = $row['idFamilia'];
             $foto = $row['foto'];
             //crear articulo
             require_once __DIR__ . '/../Modelo/articulo.php';
             $articulo = new Articulo($id,$nombreCorto,$nombre,$descripcion,$PVP,$idFamilia,$foto);
             $resultado[$contador] = $articulo;
             $contador++;
          }
          /* Consignar los cambios */
          $conexionBD->commit();
        }catch(PDOException  $e ){
          echo "Error: ".$e;
          /* Reconocer el error y revertir los cambios */
          $conexionBD->rollBack();
      }finally {
      	if($stmt !=null){
          $stmt =null;
        }
        if($conexionBD !=null){
          $conexionBD !=null;
        }
      }


        return $resultado;
  }

  public function findIdArticuloByNombre($nombre)
  {
      $resultado=0;
      require_once __DIR__ . '/../../core/conexionBd.php';
      $conexionBD = (new ConexionBd())->getConexion();
      $stmt = null;
      try{
        /* Iniciar una transacción, desactivando 'autocommit' */
          $conexionBD->beginTransaction();
          $sql = "SELECT id FROM dbo.articulo
                  WHERE nombre LIKE '$nombre';";
          $stmt = $conexionBD->query( $sql );
          while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
             $resultado= $row['id'];
          }
          /* Consignar los cambios */
          $conexionBD->commit();
      }catch(PDOException  $e ){
                echo "Error: ".$e;
              /* Reconocer el error y revertir los cambios */
              $conexionBD->rollBack();
      }finally {
      	if($stmt !=null){
          $stmt =null;
        }
        if($conexionBD !=null){
          $conexionBD !=null;
        }
      }


        return $resultado;
  }


  //para visualizar todos los productos
  public function visualizarProductos()
  {
    $resultado[]=null;
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    $stmt = null;
    try{
      /* Iniciar una transacción, desactivando 'autocommit' */
      $conexionBD->beginTransaction();

      $sql = "SELECT id, nombreCorto, nombre, descripcion, PVP , idFamilia , foto
                        FROM dbo.articulo";
      $stmt = $conexionBD->query( $sql );
      $contador=0;
      while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
            $id= $row['id'];
            $nombreCorto = $row['nombreCorto'];
            $nombre = $row['nombre'];
            $descripcion = $row['descripcion'];
            $PVP = $row['PVP'];
            $idFamilia = $row['idFamilia'];
            $foto = $row['foto'];
            //crear articulo
            require_once __DIR__ . '/../Modelo/articulo.php';
            $articulo = new Articulo($id,$nombreCorto,$nombre,$descripcion,$PVP,$idFamilia,$foto);
            $resultado[$contador] = $articulo;
            $contador++;
      }
          /* Consignar los cambios */
          $conexionBD->commit();
      }catch(PDOException  $e ){
          echo "Error: ".$e;
        /* Reconocer el error y revertir los cambios */
        $conexionBD->rollBack();
      }finally {
      	if($stmt !=null){
          $stmt =null;
        }
        if($conexionBD !=null){
          $conexionBD !=null;
        }
      }
      return $resultado;
  }



  //para busqueda familia
  public function findFamiliaByPalabra($palabra)
  {
    $resultado[]=null;
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();

    try{
      /* Iniciar una transacción, desactivando 'autocommit' */
      $conexionBD->beginTransaction();
      $sqlFamilia = "SELECT Id, nombre, descripcion
                        FROM dbo.familia WHERE nombre LIKE '$palabra'
                        OR descripcion LIKE '$palabra'
                        OR descripcion LIKE '$palabra%'
                        OR descripcion LIKE '%$palabra';";
      $stmt = $conexionBD->query( $sqlFamilia );
      $contador=0;
      while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
         $id = $row['Id'];
         $nombre = $row['nombre'];
         $descripcion = $row['descripcion'];
         //crear Familia
         require_once __DIR__ . '/../Modelo/familia.php';
         $familia = new Familia($id,$nombre,$descripcion);
         $resultado[$contador] = $familia;
         $contador++;
      }
      /* Consignar los cambios */
      $conexionBD->commit();
    }catch(PDOException  $e ){
      echo "Error: ".$e;
      /* Reconocer el error y revertir los cambios */
      $conexionBD->rollBack();
    }finally {
      	if($stmt !=null){
          $stmt =null;
        }
        if($conexionBD !=null){
          $conexionBD !=null;
        }
      }


    return $resultado;
  }

  //para busqueda articulo
  public function findArticuloByPalabra($palabra)
  {
    $resultado[]=null;
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    $articulo = null;
    $stmt = null;
    try{
      /* Iniciar una transacción, desactivando 'autocommit' */
        $conexionBD->beginTransaction();
        $sql = "SELECT id,nombreCorto,nombre,descripcion,PVP, idFamilia,foto FROM dbo.articulo WHERE nombre LIKE '$palabra'
                OR nombre LIKE '%$palabra' OR nombre LIKE '$palabra%'
                 OR nombreCorto LIKE '$palabra%' OR nombreCorto LIKE '$palabra%' OR nombreCorto LIKE '$palabra%'
                 OR descripcion LIKE '$palabra' OR descripcion LIKE '$palabra%' OR descripcion LIKE '%$palabra';";
        $stmt = $conexionBD->query( $sql );
        $contador=0;
        while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
           $id= $row['id'];
           $nombreCorto = $row['nombreCorto'];
           $nombre = $row['nombre'];
           $descripcion = $row['descripcion'];
           $PVP = $row['PVP'];
           $idFamilia = $row['idFamilia'];
           $foto = $row['foto'];
           //crear articulo
           require_once __DIR__ . '/../Modelo/articulo.php';
           $articulo = new Articulo($id,$nombreCorto,$nombre,$descripcion,$PVP,$idFamilia,$foto);
           $resultado[$contador] = $articulo;
           $contador++;
        }
        /* Consignar los cambios */
        $conexionBD->commit();
      }catch(PDOException  $e ){
        echo "Error: ".$e;
        /* Reconocer el error y revertir los cambios */
        $conexionBD->rollBack();
    }finally {
      if($stmt !=null){
        $stmt =null;
      }
      if($conexionBD !=null){
        $conexionBD !=null;
      }
    }
      return $resultado;
  }

  //para busqueda tienda
  public function findTiendaByPalabra($palabra)
  {
    $resultado[]=null;
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    try{
        /* Iniciar una transacción, desactivando 'autocommit' */
        $conexionBD->beginTransaction();
        $sql = "SELECT id,nombre,provincia,ciudad,tlfno FROM dbo.tienda
        WHERE provincia LIKE '$palabra'
        OR ciudad LIKE '$palabra'
        OR nombre LIKE '$palabra'
        OR nombre LIKE '%$palabra'
        OR nombre LIKE '$palabra%'";
        //cursor
        $stmt = $conexionBD->query( $sql );
        $contador=0;
        while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
           $id= $row['id'];
           $nombre = $row['nombre'];
           $provincia = $row['provincia'];
           $ciudad = $row['ciudad'];
           $tlfno = $row['tlfno'];

           //crear Tienda
           require_once __DIR__ . '/../Modelo/tienda.php';
           $tienda = new Tienda($id,$nombre,$provincia,$ciudad,$tlfno);
           $resultado[$contador] = $tienda;
           $contador++;
        }
        /* Consignar los cambios */
        $conexionBD->commit();
      }catch(PDOException  $e ){
          echo "Error: ".$e;
        /* Reconocer el error y revertir los cambios */
        $conexionBD->rollBack();
      }finally {
      	if($stmt !=null){
          $stmt =null;
        }
        if($conexionBD !=null){
          $conexionBD !=null;
        }
      }
      return $resultado;
  }

  //para busqueda familia comprobar que existe
  public function findFamiliaByPalabraComprobar($palabra)
  {
    $resultado= false;
    $id = '';
    $stmt = null;
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();

    try{
      /* Iniciar una transacción, desactivando 'autocommit' */
      $conexionBD->beginTransaction();
      $sqlFamilia = "SELECT Id
                        FROM dbo.familia WHERE nombre LIKE '$palabra'
                        OR descripcion LIKE '$palabra'
                        OR descripcion LIKE '$palabra%'
                        OR descripcion LIKE '%$palabra';";
      $stmt = $conexionBD->query( $sqlFamilia );
      while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
         $id = $row['Id'];
      }
      //si hay algun resultado
      if ($id=='') {
        $resultado = false;
      }else{
        //si no hay resultados
        $resultado = true;
      }
      /* Consignar los cambios */
      $conexionBD->commit();
    }catch(PDOException  $e ){
      echo "Error: ".$e;
      /* Reconocer el error y revertir los cambios */
      $conexionBD->rollBack();
    }finally {
      	if($stmt !=null){
          $stmt =null;
        }
        if($conexionBD !=null){
          $conexionBD !=null;
        }
      }


    return $resultado;
  }

  //para busqueda articulo comprobar si existe
  public function findArticuloByPalabraComprobar($palabra)
  {

    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    $resultado= false;
    $id = '';
    $stmt = null;
    try{
      /* Iniciar una transacción, desactivando 'autocommit' */
        $conexionBD->beginTransaction();
        $sql = "SELECT id FROM dbo.articulo WHERE nombre LIKE '$palabra'
                OR nombre LIKE '%$palabra' OR nombre LIKE '$palabra%'
                 OR nombreCorto LIKE '$palabra%' OR nombreCorto LIKE '$palabra%' OR nombreCorto LIKE '$palabra%'
                 OR descripcion LIKE '$palabra' OR descripcion LIKE '$palabra%' OR descripcion LIKE '%$palabra';";
        $stmt = $conexionBD->query( $sql );
        while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
           $id= $row['id'];
        }
        //si hay algun resultado
        if ($id=='') {
          $resultado = false;
        }else{
          //si no hay resultados
          $resultado = true;
        }
        /* Consignar los cambios */
        $conexionBD->commit();
      }catch(PDOException  $e ){
        echo "Error: ".$e;
        /* Reconocer el error y revertir los cambios */
        $conexionBD->rollBack();
    }finally {
      if($stmt !=null){
        $stmt =null;
      }
      if($conexionBD !=null){
        $conexionBD !=null;
      }
    }
      return $resultado;
  }

  //para busqueda tienda comprobar si existe
  public function findTiendaByPalabraComprobar($palabra)
  {
    $resultado= false;
    $id = '';
    $stmt = null;
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    try{
        /* Iniciar una transacción, desactivando 'autocommit' */
        $conexionBD->beginTransaction();
        $sql = "SELECT id,nombre,provincia,ciudad,tlfno FROM dbo.tienda
        WHERE provincia LIKE '$palabra'
        OR ciudad LIKE '$palabra'
        OR nombre LIKE '$palabra'
        OR nombre LIKE '%$palabra'
        OR nombre LIKE '$palabra%'";
        //cursor
        $stmt = $conexionBD->query( $sql );
        while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
           $id= $row['id'];
        }
        //si hay algun resultado
        if ($id=='') {
          $resultado = false;
        }else{
          //si no hay resultados
          $resultado = true;
        }
        /* Consignar los cambios */
        $conexionBD->commit();
      }catch(PDOException  $e ){
          echo "Error: ".$e;
        /* Reconocer el error y revertir los cambios */
        $conexionBD->rollBack();
      }finally {
      	if($stmt !=null){
          $stmt =null;
        }
        if($conexionBD !=null){
          $conexionBD !=null;
        }
      }
      return $resultado;
  }

  public function getFoto($id)
    {

    }

    public function comprarProductoUsuario($id)
      {
        $resultado[]=null;
        require_once __DIR__ . '/../../core/conexionBd.php';
        $conexionBD = (new ConexionBd())->getConexion();
        try{
            /* Iniciar una transacción, desactivando 'autocommit' */
            $conexionBD->beginTransaction();
            $sql = "SELECT id, nombreCorto, nombre, descripcion, PVP , idFamilia
                              FROM dbo.articulo WHERE
                              id LIKE '$id';";
            $stmt = $conexionBD->query( $sql );
            $contador=0;
            while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
               $id= $row['id'];
               $nombreCorto = $row['nombreCorto'];
               $nombre = $row['nombre'];
               $descripcion = $row['descripcion'];
               $PVP = $row['PVP'];
               $idFamilia = $row['idFamilia'];
               //crear articulo
               require_once __DIR__ . '/../Modelo/articulo.php';
               $articulo = new Articulo($id,$nombreCorto,$nombre,$descripcion,$PVP,$idFamilia,'');
               $resultado[$contador] = $articulo;
               $contador++;
            }
            /* Consignar los cambios */
            $conexionBD->commit();
        }catch(PDOException  $e ){
                  echo "Error: ".$e;
                /* Reconocer el error y revertir los cambios */
                $conexionBD->rollBack();
              }finally {
              	if($stmt !=null){
                  $stmt =null;
                }
                if($conexionBD !=null){
                  $conexionBD !=null;
                }
          }
          return $resultado;
      }


    public function confirmacionComprarProducto($id,$nombreCliente,$idTienda,$cantidad){
      $confirmacion =false;
      require_once __DIR__ . '/../../core/conexionBd.php';
      $conexionBD = (new ConexionBd())->getConexion();
      $stmt = null;
      try{
          /* Iniciar una transacción, desactivando 'autocommit' */
          $conexionBD->beginTransaction();
          $fecha_actual = date('Y-m-d');
          $sql = "INSERT INTO Compra(idArt,cantidad,fechaCompra,usuario,idTienda)
                  VALUES($id,$cantidad,$fecha_actual,'$nombreCliente',$idTienda)";
                //  die(var_dump($sql));
          $stmt = $conexionBD->query( $sql );
          //$stmt->execute();
          $confirmacion =true;
          /* Consignar los cambios */
          $conexionBD->commit();
      }catch(PDOException  $e ){
          echo "Error: ".$e;
          /* Reconocer el error y revertir los cambios */
          $conexionBD->rollBack();
      }finally {
          if($stmt !=null){
            $stmt =null;
          }
          if($conexionBD !=null){
            $conexionBD !=null;
          }
        }

      return $confirmacion;
    }

    public function insertarProducto($nombre,$nombreCorto,$descripcion,$PVP,$idCategoria,$file){
      $resultado=true;

      require_once __DIR__ . '/../../core/conexionBd.php';
      $conexionBD = (new ConexionBd())->getConexion();
      $stmt1 = null;
      try{
          /* Iniciar una transacción, desactivando 'autocommit' */
          $conexionBD->beginTransaction();
          //ahora insertamos
          $stmt1 = $conexionBD->prepare ("INSERT INTO articulo (nombre,nombreCorto,descripcion,PVP,idFamilia,foto)
          VALUES (:nombre, :nombreCorto, :descripcion, :PVP, :idFamilia,Cast(:foto As varbinary(max)))");
          $stmt1 -> bindParam(':nombre' ,$nombre);
          $stmt1 -> bindParam(':nombreCorto',$nombreCorto);
          $stmt1 -> bindParam(':descripcion' ,$descripcion);
          $stmt1 -> bindParam(':PVP',$PVP);
          $stmt1 -> bindParam(':idFamilia' ,$idCategoria);
          $stmt1 -> bindParam(':foto' ,$file);
          $stmt1 -> execute();
          $stmt1->closeCursor();
          /* Consignar los cambios */
          $conexionBD->commit();
        }catch(PDOException  $e ){
              echo "Error: ".$e;
              /* Reconocer el error y revertir los cambios */
            $conexionBD->rollBack();
        }finally {
        	if($stmt1 !=null){
            $stmt1 =null;
          }
          if($conexionBD !=null){
            $conexionBD !=null;
          }
        }
      return $resultado;
    }

    public function borrarCategoriaPorProducto($nombre){
      $resultado = true;
      require_once __DIR__ . '/../../core/conexionBd.php';
      $conexionBD = (new ConexionBd())->getConexion();
      try{
          /* Iniciar una transacción, desactivando 'autocommit' */
          $conexionBD->beginTransaction();
          $sql = "DELETE FROM dbo.articulo WHERE nombre LIKE '$nombre';";
          $stmt = $conexionBD->query( $sql );
          $stmt->execute();
          /* Consignar los cambios */
          $conexionBD->commit();
      }catch(PDOException  $e ){
                echo "Error: ".$e;
              /* Reconocer el error y revertir los cambios */
              $conexionBD->rollBack();
            }finally {
            	if($stmt !=null){
                $stmt =null;
              }
              if($conexionBD !=null){
                $conexionBD !=null;
              }
            }
      return $resultado;
    }
}
