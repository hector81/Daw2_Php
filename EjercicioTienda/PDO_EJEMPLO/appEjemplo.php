<?php
  $serverName = "C6PC06\sqlexpress";

 // Conecta mediante autenticación Windows
 try
 { $conexionBD = new PDO("sqlsrv:server=$serverName;Database=AdventureWorks2012", "", "");
   $conexionBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }catch(Exception $e)
 { die(print_r( $e->getMessage()));
 }
  echo '<br>';
  include 'appUtilidades.php';

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Reseñas de productos AdventureWorks</title>
    <meta charset="utf-8">
  </head>
  <body>
    <h1 align='center'>Reseñas de Productos AdventureWorks</h1>
    <h5 align='center'>Esta aplicación es una demostración del
                       API orientado a objetos (driver PDO_SQLSRV) dee
                       Microsoft Drivers para PHP para SQL Server.</h5><br>
<?php
  if(isset($_REQUEST['accion']))
  { switch( $_REQUEST['accion'] )
    { // Obtiene productos AdventureWorks consultando contra el nombre de producto
      case 'getProductos':
        try
        { $params = array($_POST['consulta']);
          $sql = "SELECT ProductID, Name, Color, Size, ListPrice
                    FROM Production.Product
                   WHERE Name LIKE '%' + ? + '%' AND ListPrice > 0.0";

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
        getFoto($_GET['idProducto']);
        getResenias($conexionBD, $_GET['idProducto']);
        break;

      // Escribe una reseña del  productID especificado
      case 'escribeResenia':
        muestraFormularioEscribeResenia($_POST['idProducto']);
        break;

        // Sube una reseña a la base de datos
      case 'subirResenia':
        try
        { $sql = "INSERT INTO Production.ProductReview (ProductID, ReviewerName,
                                                        ReviewDate, EmailAddress,
                                                        Rating, Comments)
                         VALUES (?,?,?,?,?,?)";
          $params = array(&$_POST['idProducto'],
          &$_POST['nombre'],
          date("d-m-Y"),
          &$_POST['email'],
          &$_POST['valoracion'],
          &$_POST['comentarios']);
          $insertReview = $conexionBD->prepare($sql);
          $insertReview->execute($params);
        }catch(Exception $ex)
        { die(print_r($ex->getMessage()));
        }
        getTermBusqueda(true);
        getResenias($conexionBD, $_POST['idProducto']);
        break;

      // Muestra el formulario para subir una foto
      case 'muestraFormularioSubirFoto':
        try
        { $sql = "SELECT Name FROM Production.Product WHERE ProductID = ?";
          $getName = $conexionBD->prepare($sql);
          $getName->execute(array($_GET['idProducto']));
          $nombre = $getName->fetchColumn(0);
        }catch(Exception $ex)
        { die(print_r( $ex->getMessage()));
        }
        muestraFormSubirFoto( $_GET['idProducto'], $nombre );
        break;

      // Sube una foto nueva del producto seleccionado
      case 'subeFoto':
        try
        { $sql = "INSERT INTO Production.ProductPhoto (LargePhoto)
                        VALUES (?)";
          $subeFoto = $conexionBD->prepare($sql);
          $fileStream = fopen($_FILES['file']['tmp_name'], "r");
          $subeFoto->bindParam(1, $fileStream, PDO::PARAM_LOB, 0,
                                               PDO::SQLSRV_ENCODING_BINARY);
          $subeFoto->execute();

          // Obtiene el primer campo - el identity del INSERT -
          // para poder asociarlo con el ID de producto
          $idFoto = $conexionBD->lastInsertId();
          $sql = "UPDATE Production.ProductProductPhoto
                      SET ProductPhotoID = ?
                    WHERE ProductID = ?";
          $idsAsociados = $conexionBD->prepare($sql);
          $idsAsociados->execute(array($idFoto, $_POST['idProducto']));
        }catch(Exception $ex)
        { die(print_r($ex->getMessage()));
        }

        getFoto($_POST['idProducto']);
        muestraBotonResenia($_POST['idProducto'] );
        getTermBusqueda(!null);
        break;
    }//Fin del switch
  }else
  { getTermBusqueda(!null);
  }
?>
  </body>
</html>
