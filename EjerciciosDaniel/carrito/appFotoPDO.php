<?php

require_once 'conexion.php';

function getFoto($idProducto) {
    return "<img src='fotoPDO.php?idProducto=" . $idProducto . "' height='150' width='150'>";
}

// Funciones de Presentación y Utilidad
function inicioTablaProductos($cantFilas) { // Muestra muestra el comienzo de los resultados de búsqueda de la tabla
    $cabeceras = array("Id Artículo", "Nombre Corto", "Nombre", "Descripcion", "PVP", "Foto");
    echo "<table align='center' cellpadding='5'>";
    echo "<tr bgcolor='silver'>$cantFilas Resultados</tr>
        <tr>";
    foreach ($cabeceras as $cabecera) {
        echo "<td>$cabecera</td>";
    }
    echo "</tr>";
}

function finalTablaProductos() {
    echo "</table><br>";
}

function mensajeNoProducto() {
    echo "<h4 align='center'>No sé encontró ningún producto.</h4>";
}

function muestraFormSubirFoto($idProducto, $nombre) {
    echo "<h3 align='center'>Subir foto</h3>";
    echo "<h4 align='center'>$nombre</h4>";
    echo "<form align='center' action='index.php'
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

function poblarTablaProductos($valores) {
    // Puebla la tabla productos con los resultados de la búsqueda
    $idProducto = $valores['id'];
    echo "<tr>";
    foreach ($valores as $key => $valor) {
        if (0 == strcasecmp("nombre", $key)) {
            echo "<td>
                <a href='?accion=idProducto=$idProducto'>$valor</a>
              </td>";
        } elseif (0 == strcasecmp("foto", $key)) {
            echo "<td>" . getFoto($idProducto) . "</td>
                    <td>
                        <a href='?accion=muestraFormularioSubirFoto&idProducto=" . $idProducto . "'>Subir nueva foto</a>
                    </td>";
        } elseif (!is_null($valor)) {
            if (0 == strcasecmp("PVP", $key)) { // Formatea con dos dígitos de precisión
                $formateoPVP = sprintf("%.2f", $valor);
                echo "<td>$$formateoPVP</td>";
            } else {
                $otros = nl2br(stripcslashes(substr($valor, 0)));
                echo "<td>".$otros."</td>";
            }
        } else {
            echo "<td>N/A</td>";
        }
    }
    echo "
        <td>" . getFoto($idProducto) . "</td>
                    <td>
                        <a href='?accion=muestraFormularioSubirFoto&idProducto=" . $idProducto . "'>Subir nueva foto</a>
                    </td><td>
            <form action='appFotoPDO.php' enctype='multipart/form-data' method='POST'>
              <input type='hidden' name='idProducto' value='$idProducto'>
            </form>
          </td>
         </tr>
          </td>
          </tr>";
}

function getArticulo($con) {
    try {
        $sql = "SELECT id, nombreCorto, nombre, descripcion, PVP
                            FROM articulo";

        $getProductos = $con->prepare($sql);
        $getProductos->execute();
        $productos = $getProductos->fetchAll(PDO::FETCH_ASSOC);
        $productCount = count($productos);
        if ($productCount > 0) {
            inicioTablaProductos($productCount);
            foreach ($productos as $fila) {
                poblarTablaProductos($fila);
            }
            finalTablaProductos();
        } else {
            mensajeNoProducto();
        }
    } catch (Exception $ex) {
        die(print_r($ex->getMessage()));
    }
}
