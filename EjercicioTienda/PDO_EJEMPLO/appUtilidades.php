<?php
  $serverName = "C6PC06\sqlexpress";

 // Conecta mediante autenticación Windows
 try
 { $conexionBD = new PDO("sqlsrv:server=$serverName;Database=AdventureWorks2012", "", "");
   $conexionBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }catch(Exception $e)
 { die(print_r( $e->getMessage()));
 }

echo 'Conexión establecida con base de datos';

  function getFoto($idProducto)
  { echo "<table align='center'>
            <tr align='center'>
              <td>";
    echo "<img src='fotoPdo.php?productId=".$idProducto."' height='150' width='150'>
              </td>
            </tr>";
    echo "<tr align='center'>
              <td>
                <a href='?accion=muestraFormularioSubirFoto&idProducto=".$idProducto."'>Subir nueva foto</a>
              </td>
          </tr>";
    echo "</td>
            </tr>
          </table><br>";
  }

  function getResenias($conexionBD, $idProducto)
  { try
    { $sql = "SELECT ReviewerName, CONVERT(varchar(32), ReviewDate, 107) AS FechaReseña,
                      Rating, Comments
                 FROM Production.ProductReview
                WHERE ProductID = ?
               ORDER BY FechaReseña DESC";
      $getResenias = $conexionBD->prepare($sql);
      $getResenias->execute(array($idProducto));
      $resenias = $getResenias->fetchAll(PDO::FETCH_NUM);
      $cantResenias = count($resenias);
      if($cantResenias > 0)
      { foreach($resenias as $fila)
        { $nombre = $fila[0];
          $fecha = $fila[1];
          $valoracion = $fila[2];
          $comentarios = $fila[3];
          muestraResenia($idProducto, $nombre, $fecha, $valoracion, $comentarios);
        }
      }else
      { muestraMenNoResenia();
      }
    }catch(Exception $ex)
    { die(print_r($ex->getMessage()));
    }
    muestraBotonResenia( $idProducto );
    getTermBusqueda(!null);
  }

  // Funciones de Presentación y Utilidad
  function inicioTablaProductos($cantFilas)
  { // Muestra muestra el comienzo de los resultados de búsqueda de la tabla
    $cabeceras = array("Id Producto", "Nombre", "Color", "Tamaño", "Pv");
    echo "<table align='center' cellpadding='5'>";
    echo "<tr bgcolor='silver'>$cantFilas Resultados</tr>
          <tr>";
    foreach($cabeceras as $cabecera)
    { echo "<td>$cabecera</td>";
    }
    echo "</tr>";
  }

  function muestraMenNoProducto()
  { echo "<h4 align='center'>No se encontró producto alguno</h4>";
  }

  function muestraMenNoResenia()
  { echo "<h4 align='center'>No hay reseñas para este producto.</h4>";
  }

  function muestraResenia( $idProducto, $nombre, $fecha, $valoracion, $comentarios)
  { // Muestra una reseña de producto
    echo "<table style='WORD-BREAK:BREAK-ALL' width='50%' align='center' border='1' cellpadding='5'>";
    echo "<tr>
            <td>Id Producto</td>
            <td>Crítico</td>
            <td>Fecha</td>
            <td>Valoración</td>
          </tr>";
    echo "<tr>
            <td>$idProducto</td>
            <td>$nombre</td>
            <td>$fecha</td>
            <td>$valoracion</td>
          </tr>
          <tr>
            <td width='50%' colspan='4'>$comentarios</td>
          </tr>
          </table><br><br>";
  }

  function muestraFormSubirFoto($idProducto, $nombre)
  { echo "<h3 align='center'>Subir foto</h3>";
    echo "<h4 align='center'>$nombre</h4>";
    echo "<form align='center' action='appEjemplo.php'
            enctype='multipart/form-data' method='POST'>
            <input type='hidden' name='accion' value='subeFoto'>
            <input type='hidden' name='idProducto' value='$idProducto'>
            <table align='center'>
              <tr>
                <td align='center'>
                  <input id='nombArch' type='file' name='file'>
                </td>
              </tr>
              <tr>
                <td align='center'>
                  <input type='submit' name='submit' value='Subir foto'>
                </td>
              </tr>
            </table>
          </form>";
  }

  function muestraBotonResenia($idProducto)
  { echo "<table align='center'>
            <form action='appEjemplo.php' enctype='multipart/form-data' method='POST'>
              <input type='hidden' name='accion' value='escribeResenia'>
              <input type='hidden' name='idProducto' value='$idProducto'>
              <input type='submit' name='submit' value='Escribir reseña'>
              </p></td></tr>
            </form>
          </table>";
  }

  function muestraFormularioEscribeResenia($idProducto)
  { // Presenta el formulario para introducir una reseña de producto
      echo "<h5 align='center'>Nombre, Ecorreo y Valoración son campos obligatorios</h5>";
      echo "<table align='center'>
              <form action='appEjemplo.php' enctype='multipart/form-data' method='POST'>
                <input type='hidden' name='accion' value='subirResenia'>
                <input type='hidden' name='idProducto' value='$idProducto'>
                <tr>
                  <td colspan='5'>Nombre: <input type='text' name='nombre' size='50'></td>
                </tr>
                <tr>
                  <td colspan='5'>ECorreo: <input type='text' name='email' size='50'></td>
                </tr>
                <tr>
                  <td>Valoración:</td>
                  <td>1<input type='radio' name='valoracion' value='1'></td>
                  <td>2<input type='radio' name='valoracion' value='2'></td>
                  <td>3<input type='radio' name='valoracion' value='3'></td>
                  <td>4<input type='radio' name='valoracion' value='4'></td>
                  <td>5<input type='radio' name='valoracion' value='5'></td>
                </tr>
                <tr>
                  <td colspan='5'>
                    <textarea rows='20' cols ='50' name='comentarios'>[Escribe un comentario aquí]</textarea>
                  </td>
                </tr>
                <tr>
                  <td colspan='5'>
                    <p align='center'>
                      <input type='submit' name='submit' value='Subir Reseña'>
                    </p>
                  </td>
                </tr>
              </form>
            </table>";
  }

  function finalTablaProductos()
  { echo "</table><br>";
  }

  function getTermBusqueda($exito)
  { // Obtiene y presenta los términos de búsqueda en la base de datos
    if (is_null($exito))
    { echo "<h4 align='center'>Reseña presentada con éxito</h4>";
    }
    echo "<h4 align='center'>Introduzca términos de búsqueda de productos</h4>";
    echo "<table align='center'>
            <form action='appEjemplo.php' enctype='multipart/form-data' method='POST'>
              <input type='hidden' name='accion' value='getProductos'>
            <tr>
              <td><input type='text' name='consulta' size='40'></td>
            </tr>
            <tr align='center'>
              <td><input type='submit' name='submit' value='Buscar'></td>
            </tr>
            </form>
          </table>";
  }

  function poblarTablaProductos($valores)
  { // Puebla la tabla productos con los resultados de la búsqueda
    $idProducto = $valores['ProductID'];
    echo "<tr>";
    foreach ($valores as $key => $valor)
    { if(0 == strcasecmp("Name", $key))
      { echo "<td>
                <a href='?accion=getResenia&idProducto=$idProducto'>$valor</a>
              </td>";
      }elseif(!is_null($valor))
      { if(0 == strcasecmp("ListPrice", $key))
        { // Formatea con dos dígitos de precisión
          $formateoPv = sprintf("%.2f", $valor);
          echo "<td>$$formateoPv</td>";
        }else
        { echo "<td>$valor</td>";
        }
      }else
      { echo "<td>N/A</td>";
      }
    }
    echo "<td>
            <form action='appEjemplo.php' enctype='multipart/form-data' method='POST'>
              <input type='hidden' name='accion' value='escribeResenia'>
              <input type='hidden' name='idProducto' value='$idProducto'>
              <input type='submit' name='submit' value='Escribir una reseña'>
            </form>
          </td>
         </tr>
          </td></tr>";
  }
?>