<?php
  session_start();
  include __DIR__ . '/../../core/conexion.php';
  //echo '<br>';
  include __DIR__ . '/../../fuente/Modelo/GestorBaseDatosUtilidades.php';
  
  $usuarioClienteComprobar = $_SESSION['USUARIO_CLIENTE'] ;
  $usuarioClientePassword = $_SESSION['USUARIO_PASSWORD'] ;
  echo 'Bienvenido a tienda ' .$usuarioClienteComprobar.'<br />'.$usuarioClientePassword.'<br />';
  
  //echo password_hash($usuarioClienteComprobar, PASSWORD_DEFAULT)."\n";
  
  $hash = $usuarioClientePassword;

	if (password_verify($usuarioClienteComprobar, $hash)) {
		echo '¡La contraseña es válida!.<br />';
	} else {
		echo 'La contraseña no es válida.<br />';
	}
	echo password_hash($usuarioClienteComprobar, PASSWORD_DEFAULT).'<br />';
	//para atras
	echo '<a href="../Indice.php">Volver a inicio</a><br><br><br><br>';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Reseñas de productos </title>
    <meta charset="utf-8">
  </head>
  <body>
    <h1 align='center'>Reseñas de Productos cadenaTienda</h1>
    <h5 align='center'>Esta aplicación es una demostración del cadenaTienda
                       API orientado a objetos (driver PDO_SQLSRV) dee
                       Microsoft Drivers para PHP para SQL Server.</h5><br>
<?php
  if(isset($_REQUEST['accion']))
  { switch( $_REQUEST['accion'] )
    { // Obtiene productos cadenaTienda consultando contra el nombre de producto
      case 'getProductos':
        try
        { $params = array($_POST['consulta']);
          $sql = "SELECT id, nombreCorto, nombre, descripcion, PVP , idFamilia , Foto
                    FROM articulo
                   WHERE nombre LIKE '%' + ? + '%' ";

          $getProductos = $conexionBD->prepare($sql);
          $getProductos->execute($params);
          $productos = $getProductos->fetchAll(PDO::FETCH_ASSOC);
          $productCount = count($productos);
          if($productCount > 0)
          { inicioTablaProductos($productCount);          
            foreach( $productos as $fila )
            { poblarTablaProductos( $fila );
            }
            finalTablaProductos();
          }else
          { muestraMenNoProducto();
          }
        }catch(Exception $ex)
        { die(print_r($ex->getMessage()));
        }
        getTermBusqueda(!null);
        break;

      // Obtiene reseñas del producto especificado por productID
      case 'getResenia':
        getFoto($_GET['id']);
        getResenias($conexionBD, $_GET['id']);
        break;

      // Escribe una reseña del  productID especificado
      case 'escribeResenia':
        muestraFormularioEscribeResenia($_POST['id']);
        break;

        // Sube una reseña a la base de datos
      case 'subirResenia':
        try
        { $sql = "INSERT INTO reseniasArticulo (idArticulo, nombreArticulo,
                                                        fechaResenia, emailResenia,
                                                        puntuacion, comentarios, modifiedDate)
                         VALUES (?,?,?,?,?,?,?)";
          $params = array(&$_POST['id'],
          &$_POST['nombre'],
          date("d-m-Y"),
          &$_POST['email'],
          &$_POST['valoracion'],
          &$_POST['comentarios'],
		  date("d-m-Y"));
          $insertReview = $conexionBD->prepare($sql);
          $insertReview->execute($params);
        }catch(Exception $ex)
        { die(print_r($ex->getMessage()));
        }
        getTermBusqueda(true);
        getResenias($conexionBD, $_POST['id']);
        break;

      // Muestra el formulario para subir una foto
      case 'muestraFormularioSubirFoto':
        try
        { $sql = "SELECT nombre FROM articulo WHERE id = ?";
          $getName = $conexionBD->prepare($sql);
          $getName->execute(array($_GET['id']));
          $nombre = $getName->fetchColumn(0);
        }catch(Exception $ex)
        { die(print_r( $ex->getMessage()));
        }
        muestraFormSubirFoto( $_GET['id'], $nombre );
        break;

      // Sube una foto nueva del producto seleccionado
      case 'subeFoto':
        try 
        { 
		  //el fallo lo da al no introducir el resto de datos
		  $sql = "INSERT INTO articulo (Foto)
                        VALUES (?)";
          $subeFoto = $conexionBD->prepare($sql);
          $fileStream = fopen($_FILES['file']['tmp_name'], "r");
          $subeFoto->bindParam(1, $fileStream, PDO::PARAM_LOB, 0,
                                               PDO::SQLSRV_ENCODING_BINARY);
          $subeFoto->execute();

          // Obtiene el primer campo - el identity del INSERT -
          // para poder asociarlo con el ID de producto
          $idFoto = $conexionBD->lastInsertId();
          $sql = "UPDATE Foto
                      SET Foto = ?
                    WHERE id = ?";
          $idsAsociados = $conexionBD->prepare($sql);
          $idsAsociados->execute(array($idFoto, $_POST['id']));
        }catch(Exception $ex)
        { die(print_r($ex->getMessage()));
        }

        getFoto($_POST['id']);
        muestraBotonResenia($_POST['id'] );
        getTermBusqueda(!null);
        break;
    }//Fin del switch
  }else
  { getTermBusqueda(!null);
  }
  
?>
  </body>
</html>
