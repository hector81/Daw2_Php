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
  require 'conexion.php';
  require 'utils.php';
  $con = conexion::connect();
  if(isset($_REQUEST['accion']))
  { switch( $_REQUEST['accion'] )
    { // Obtiene productos AdventureWorks consultando contra el nombre de producto
      case 'getProductos':
        try
        { $params = array($_POST['consulta']);
          $sql = "SELECT ProductID, Name, Color, Size, ListPrice
                    FROM Production.Product
                   WHERE Name LIKE '%' + ? + '%' AND ListPrice > 0.0";

          $getProductos = $con->prepare($sql);
          $getProductos->execute($params);
          $productos = $getProductos->fetchAll(PDO::FETCH_ASSOC);
          $productCount = count($productos);
          if($productCount > 0)
          { utils::inicioTablaProductos($productCount);
            foreach( $productos as $fila )
            { utils::poblarTablaProductos( $fila );
            }
            utils::finalTablaProductos();
          }else
          { utils::muestraMenNoProducto();
          }
        }catch(Exception $ex)
        { die(print_r($ex->getMessage()));
        }
        utils::getTermBusqueda(!null);
        break;

      // Obtiene reseñas del producto especificado por productID
      case 'getResenia':
        utils::getFoto($_GET['idProducto']);
        utils::getResenias($con, $_GET['idProducto']);
        break;

      // Escribe una reseña del  productID especificado
      case 'escribeResenia':
        utils::muestraFormularioEscribeResenia($_POST['idProducto']);
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
          $insertReview = $con->prepare($sql);
          $insertReview->execute($params);
        }catch(Exception $ex)
        { die(print_r($ex->getMessage()));
        }
        utils::getTermBusqueda(true);
        utils::getResenias($con, $_POST['idProducto']);
        break;

      // Muestra el formulario para subir una foto
      case 'muestraFormularioSubirFoto':
        try
        { $sql = "SELECT Name FROM Production.Product WHERE ProductID = ?";
          $getName = $con->prepare($sql);
          $getName->execute(array($_GET['idProducto']));
          $nombre = $getName->fetchColumn(0);
        }catch(Exception $ex)
        { die(print_r( $ex->getMessage()));
        }
        utils::muestraFormSubirFoto( $_GET['idProducto'], $nombre );
        break;

      // Sube una foto nueva del producto seleccionado
      case 'subeFoto':
        try
        { $sql = "INSERT INTO Production.ProductPhoto (LargePhoto)
                        VALUES (?)";
          $subeFoto = $con->prepare($sql);
          $fileStream = fopen($_FILES['file']['tmp_name'], "r");
          $subeFoto->bindParam(1, $fileStream, PDO::PARAM_LOB, 0,
                                               PDO::SQLSRV_ENCODING_BINARY);
          $subeFoto->execute();

          // Obtiene el primer campo - el identity del INSERT -
          // para poder asociarlo con el ID de producto
          $idFoto = $con->lastInsertId();
          $sql = "UPDATE Production.ProductProductPhoto
                      SET ProductPhotoID = ?
                    WHERE ProductID = ?";
          $idsAsociados = $con->prepare($sql);
          $idsAsociados->execute(array($idFoto, $_POST['idProducto']));
        }catch(Exception $ex)
        { die(print_r($ex->getMessage()));
        }

        utils::getFoto($_POST['idProducto']);
        utils::muestraBotonResenia($_POST['idProducto'] );
        utils::getTermBusqueda(!null);
        break;
    }//Fin del switch
  }else
  { utils::getTermBusqueda(!null);
  }
?>
  </body>
</html>