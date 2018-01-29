<?php
//include_once __DIR__ . "/../Modelo/articulo.php";
class ArticuloRepositorio
{
  public function findArticuloByNombre($nombre)
  {
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
    return $articulos;
  }

  public function findArticuloById($id)
  { $sql = "SELECT id, nombreCorto, nombre, descripcion, PVP, idFamilia
              FROM articulo
             WHERE id = ?";
      include __DIR__ . '/../../core/conexionBd.php';
      $con = (new ConexionBd())->getConexion();

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

      return (new Articulo($articulo));
  }

  public function findFotoById($id)
  { $sql = "SELECT foto
              FROM articulo
             WHERE id ?";
    include __DIR__ . '/../../core/conexionBd.php';
    $con = (new ConexionBd())->getConexion();
    $cursor = $con->prepare($sql);

    $cursor->execute($id);
    $cursor->bindColumn(1, $foto, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
    $cursor->fetch(PDO::FETCH_BOUND);

    echo $foto;
  }

  public function actualizaFoto($params)
  { $sql = "UPDATE articulo
               SET foto = ?
             WHERE id = ?";
      include __DIR__ . '/../../core/conexionBd.php';
      $con = (new ConexionBd())->getConexion();
      $subeFoto = $con->prepare($sql);
      $subeFoto->bindParam(1, $params['foto'], PDO::PARAM_LOB, 0,
                                           PDO::SQLSRV_ENCODING_BINARY);
      $subeFoto->bindParam(2, $params['id']);
      $subeFoto->execute();
  }



  public function findCategoriaPorNombre($nombreCategoria)
  {
    $resultado[][]=null;
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    $sql = "SELECT id,nombre,descripcion
              FROM familia
             WHERE nombre = '$nombreCategoria' OR nombre LIKE '%$nombreCategoria' OR nombre LIKE '$nombreCategoria%';";
    $stmt = $conexionBD->query( $sql );
    $contador=0;
    while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
       $resultado[$contador][0] = $row['id'];
       $resultado[$contador][1] = $row['nombre'];
       $resultado[$contador][3] = $row['descripcion'];
       $contador++;
    }
      return $resultado;

  }



  public function visualizarArticulo($nombre)
  {
      $resultado[][]=null;
      require_once __DIR__ . '/../../core/conexionBd.php';
      $conexionBD = (new ConexionBd())->getConexion();
      $sql = "SELECT id,nombreCorto,nombre,descripcion,PVP, idFamilia,foto FROM dbo.articulo WHERE nombre LIKE '$nombre'
              OR nombre LIKE '%$nombre' OR nombre LIKE '$nombre%';";
      $stmt = $conexionBD->query( $sql );
      $contador=0;
      while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
         $resultado[$contador][0] = $row['id'];
         $resultado[$contador][1] = $row['nombreCorto'];
         $resultado[$contador][2] = $row['nombre'];
         $resultado[$contador][3] = $row['descripcion'];
         $resultado[$contador][4] = $row['PVP'];
         $resultado[$contador][5] = $row['idFamilia'];
         $resultado[$contador][6] = $row['foto'];
         $contador++;
      }
        return $resultado;
  }

  //para visualizar por categorias
  public function visualizarCategoria($nombreCategoria)
  {
    $resultado[]=null;
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
      $sql = "SELECT Id FROM dbo.articulo WHERE nombre LIKE '$nombreCategoria'
      OR nombre LIKE '%$nombreCategoria' OR nombre LIKE '$nombreCategoria%';";
      foreach ($conexionBD->query($sql) as $row) {
        $sqlCategoria = "SELECT id,nombreCorto,nombre,descripcion,PVP, idFamilia,foto FROM dbo.articulo WHERE id LIKE '$row';";
        foreach ($conexionBD->query($sqlCategoria) as $rowCategoria) {
          $resultado[] = $rowCategoria;
        }
      }
      return $resultado;
  }

  //para visualizar por categorias
  public function mostrarCategorias()
  {
    $resultado[][]=null;
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    $sql = "SELECT nombre FROM dbo.familia";
    $stmt = $conexionBD->query( $sql );
    $contador=0;
    while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
       $resultado[$contador][0] = $row['nombre'];
       $contador++;
    }
      return $resultado;

  }

  //para visualizar todos los productos
  public function visualizarProductos()
  {
    $resultado[][]=null;
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    $sql = "SELECT id, nombreCorto, nombre, descripcion, PVP , idFamilia , Foto
                      FROM dbo.articulo";
    $stmt = $conexionBD->query( $sql );
    $contador=0;
    while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
       $resultado[$contador][0] = $row['id'];
       $resultado[$contador][1] = $row['nombreCorto'];
       $resultado[$contador][2] = $row['nombre'];
       $resultado[$contador][3] = $row['descripcion'];
       $resultado[$contador][4] = $row['PVP'];
       $resultado[$contador][5] = $row['idFamilia'];
       $resultado[$contador][6] = $row['Foto'];
       $contador++;
    }
      return $resultado;
  }

  //categoriasInicio visualzar
  public function categoriasInicio()
  {
      $resultado[][]=null;
      require_once __DIR__ . '/../../core/conexionBd.php';
      $conexionBD = (new ConexionBd())->getConexion();
      $sqlCate = "SELECT Id, nombre, descripcion
                        FROM dbo.familia";
      $stmt = $conexionBD->query( $sql );
      $contador=0;
      while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
         $resultado[$contador][0] = $row['id'];
         $resultado[$contador][1] = $row['nombre'];
         $resultado[$contador][2] = $row['descripcion'];
         $contador++;
      }
        return $resultado;
  }

  public function findBusqueda($nombre)
  {
    $listaBusqueda[]=null;
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
     //para familia
      $sqlFamilia = "SELECT Id, nombre, descripcion
                        FROM dbo.familia WHERE nombre LIKE '$nombre' OR descripcion LIKE '$nombre' OR descripcion LIKE '$nombre%' OR descripcion LIKE '%$nombre';";
      foreach ($conexionBD->query($sqlFamilia) as $rowBusqueda) {
          $listaBusqueda[] = $rowBusqueda;
        }
    //para Articulo
     $sqlArticulo = "SELECT id, nombreCorto, nombre, descripcion, PVP , idFamilia , Foto
                       FROM dbo.articulo WHERE
                       nombre LIKE '$nombre' OR nombre LIKE '$nombre%' OR nombre LIKE '%$nombre'
                       OR nombreCorto LIKE '$nombre' OR nombreCorto LIKE '$nombre%' OR nombreCorto LIKE '%$nombre'
                       OR descripcion LIKE '$nombre' OR descripcion LIKE '$nombre%' OR descripcion LIKE '%$nombre'
                       ;";
     foreach ($conexionBD->query($sqlArticulo) as $rowBusqueda) {
         $listaBusqueda[] = $rowBusqueda;
       }

    //para tienda
    $sqlTienda = "SELECT id, nombre, provincia, ciudad, tlfno
                      FROM dbo.tienda WHERE
                      nombre LIKE '$nombre' OR nombre LIKE '$nombre%' OR nombre LIKE '%$nombre'
                      OR provincia LIKE '$nombre' OR provincia LIKE '$nombre%' OR provincia LIKE '%$nombre'
                      OR ciudad LIKE '$nombre' OR ciudad LIKE '$nombre%' OR ciudad LIKE '%$nombre'
                      ;";
    foreach ($conexionBD->query($sqlTienda) as $rowBusqueda) {
        $listaBusqueda[] = $rowBusqueda;
      }

      return $listaBusqueda;
  }


  public function verResenas($id)
  {
    $listaResenas[]=null;
    include __DIR__ . '/../../core/conexionBd.php';
    $con = (new ConexionBd())->getConexion();
    $sql = "SELECT nombreArticulo, emailResenia, CONVERT(varchar(32), fechaResenia, 107) AS FechaReseña,
                      puntuacion, comentarios
                 FROM reseniasArticulo
                WHERE idArticulo = ?
               ORDER BY FechaReseña DESC";
      $getResenias = $con->prepare($sql);
      $getResenias->execute(array($id));
      $resenias = $getResenias->fetchAll(PDO::FETCH_NUM);
      $cantResenias = count($resenias);
      foreach($resenias as $fila)
        { $nombre = $fila[0];
		        $emailResenia = $fila[1];
          $fecha = $fila[2];
          $valoracion = $fila[3];
          $comentarios = $fila[4];
          //ponemos las reseñas
          $listaResenas = [$nombre,$emailResenia ,$fecha,$valoracion,$comentarios];
        }



    return $listaResenas;
  }

  public function getFoto($id)
    {

    }

    public function comprarProductoUsuario($id)
      {
        return $id;
      }

/////////////////////////////
//////////////
/*
VER ARTICULO plantillas*/

/*
public function getFoto($id)
  {
    include __DIR__ . '/../../core/conexionBd.php';
    echo "<table align='center' style='background-color:lightblue;'>
            <tr align='center'>
              <td>";
    echo "<img src='app/plantillas/fotoPdo.php?id=".$id."' height='150' width='150'>
              </td>
            </tr>";
    echo "<tr align='center'>
              <td>
                <a href='?accion=muestraFormularioSubirFoto&id=".$id."'>Subir nueva foto</a>
              </td>
          </tr>";
    echo "</td>
            </tr>
          </table><br>";
  }
/*
<h1><?= $articulo->getNombre() ?></h1>
<table border="1">
  <tr>
    <td>Descripción</td>
    <td><?= nl2br2($articulo->getDescripcion()) ?></td>
  </tr>
  <tr>
    <td>Precio</td>
    <td><?= number_format($articulo->getPvp(), 2, ',', '.').'€' ?></td>
  </tr>
  <tr>
    <form align='center' action='articuloRepositorio.php'
            enctype='multipart/form-data' method='POST'>
    <td>Imagen</td>
    <td>
      <img src='/cadenatiendas/app/plantillas/recuperaFoto.php?id=<?= $articulo->getId() ?>' height='150' width='150'>
    </td>
    <td><a href="index.php?ctl=nuevaFoto&id=<?= $articulo->getId() ?>&nombre=<?= $articulo->getNombre() ?>">Subir nueva foto</a></td>
  </form>
  </tr>
</table>
*/


  //////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////




/*







  // Funciones de Presentación y Utilidad
  function inicioTablaProductos($cantFilas)
  {
    // Muestra muestra el comienzo de los resultados de búsqueda de la tabla
    $cabeceras = array("id", "nombreCorto", "nombre", "descripcion", "PVP", "idFamilia", "Foto");
    echo "<table align='center' cellpadding='5' border='1' style='background-color:lightblue;' >";
    echo "<tr bgcolor='silver'>$cantFilas Resultados</tr>
          <tr>";
    foreach($cabeceras as $cabecera)
    { echo "<td>$cabecera</td>";
    }
    echo "</tr>";
  }





  function muestraResenia( $nombre, $emailResenia, $fecha, $valoracion, $comentarios)
  {
    // Muestra una reseña de producto
    echo "<table style='WORD-BREAK:BREAK-ALL' width='50%' align='center' border='1' cellpadding='5' style='background-color:lightblue;' >";
    echo "<tr>
            <td>nombre</td>
			<td>emailResenia</td>
            <td>fecha</td>
            <td>valoracion</td>

          </tr>";
    echo "<tr>
            <td>$nombre</td>
			<td>$emailResenia</td>
            <td>$fecha</td>
            <td>$valoracion</td>
          </tr>
          <tr>
            <td width='50%' colspan='4'>$comentarios</td>
          </tr>
          </table><br><br>";
  }

  function muestraFormSubirFoto($id, $nombre)
  {
    echo "<h3 align='center'>Subir foto</h3>";
    echo "<h4 align='center'>$nombre</h4>";
    echo "<form align='center' action='paginaWebFotos.php'
            enctype='multipart/form-data' method='POST'>
            <input type='hidden' name='accion' value='subeFoto'>
            <input type='hidden' name='id' value='$id'>
            <table align='center' border='1' style='background-color:lightblue;'>
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

  function muestraBotonResenia($id)
  {
    echo "<table align='center' border='1' style='background-color:lightblue;'>
            <form action='paginaWebFotos.php' enctype='multipart/form-data' method='POST'>
              <input type='hidden' name='accion' value='escribeResenia'>
              <input type='hidden' name='id' value='$id'>
              <input type='submit' name='submit' value='Escribir reseña'>
              </p></td></tr>
            </form>
          </table>";
  }

  function muestraFormularioEscribeResenia($id)
  {
    // Presenta el formulario para introducir una reseña de producto
      echo "<h5 align='center'>Nombre, Ecorreo y Valoración son campos obligatorios</h5>";
      echo "<table align='center' border='1' style='background-color:lightblue;'>
              <form action='paginaWebFotos.php' enctype='multipart/form-data' method='POST'>
                <input type='hidden' name='accion' value='subirResenia'>
                <input type='hidden' name='id' value='$id'>
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
  {
    echo "</table><br>";
  }

  function getTermBusqueda($exito)
  {
    // Obtiene y presenta los términos de búsqueda en la base de datos
    if (is_null($exito))
    { echo "<h4 align='center'>Reseña presentada con éxito</h4>";
    }
    echo "<h4 align='center'>Introduzca términos de búsqueda de productos</h4>";
    echo "<table align='center' border='1' style='background-color:lightblue;'>
            <form action='paginaWebFotos.php' enctype='multipart/form-data' method='POST'>
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
  {
    // Puebla la tabla productos con los resultados de la búsqueda
    $id = $valores['id'];
    echo "<tr>";
    foreach ($valores as $key => $valor)
    { if(0 == strcasecmp("nombre", $key))
      { echo "<td>
                <a href='?accion=getResenia&id=$id'>$valor</a>
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
            <form action='paginaWebFotos.php' enctype='multipart/form-data' method='POST'>
              <input type='hidden' name='accion' value='escribeResenia'>
              <input type='hidden' name='id' value='$id'>
              <input type='submit' name='submit' value='Escribir una reseña'>
            </form>
          </td>
         </tr>
          </td></tr>";
  }
*/
  //////////////////////////////////
  ///////////////////////////////////
  ///////////////////////////
}
