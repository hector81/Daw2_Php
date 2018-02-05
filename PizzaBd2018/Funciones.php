<?php
include_once 'Conexion.php';
include 'Pedido.php';
//por si hay equivocacion
function generarErrorVuelta(){
  $mensaje= "<form id=".'formularioRegreso'." action=".'IndexPizzaBd.php'."><table>
  <tr><td><input type=".'submit'." value=".'Inicio'. " name=".'Enviar'." class=".'centroBoton'.">
  </td></tr></table></form>";
  echo $mensaje;
}

function generarFormularioPedido(){
  try
  {
    $conexion = empezarConexion();
    $conexion->beginTransaction();
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo '<div class="errorAviso"><h1>RELIZAR PEDIDO</h1>';
    echo '<p class="parrafoDatosDerecha">LOS EXTRAS NO SON OBLIGATORIOS PERO EL RESTO DE CAMPOS SI QUE LO SÓN</p>';
    echo '<p class="parrafoDatosDerecha">AVISO : SOLO DISPONEMOS DE MASA NORMAL</p></div>';
    echo '<form name='."formularioPedido".' action='."procesamientoPedido.php".' method='."POST".' >';
      echo '<table>';
          echo '<tr>';
              echo '<td class="precioTitulo">Pizzas a elegir: </td>';
              echo '<td class="precioTd">';
              ///////////////////////////////////////////
              $query = "SELECT nombre FROM Pizza";
              $stmt = $conexion->prepare($query);//PDOStatement == $stmt
              $stmt->execute();
              while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "$row[nombre]"."<input type='radio' value=".$row['nombre']." name='tipoPizza'>&nbsp;&nbsp";
              }
              $stmt = null;
              ///////////////////////////////////////
              echo '</td>';
          echo '</tr>';
          echo '<tr>';
              echo '<td class="precioTitulo">Pizzas tamaños elegir: </td>';
              echo '<td class="precioTd">';
              ///////////////////////////////////////////
              $query = "SELECT nombre FROM Tamanio";
              $stmt = $conexion->prepare($query);
              $stmt->execute();
              while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                print "$row[nombre]"."<input type='radio' value=".$row['nombre']." name='tamanoPizza'>&nbsp;&nbsp";
              }
              $stmt = null;
              ///////////////////////////////////////////
              echo '</td>';
          echo '</tr>';
          echo '<tr>';
              echo '<td class="precioTitulo">Pizzas masa elegir: </td>';
              echo '<td class="precioTd">';
                  print "Fina"."<input type='radio' value="."Fina"." name='masaPizza'>&nbsp;&nbsp";
                  print "Normal"."<input type='radio' value="."Normal"." name='masaPizza'>&nbsp;&nbsp";
              echo '</td>';
          echo '</tr>';
          echo '<tr>';
              echo '<td class="precioTitulo">Extras pizza elegir: </td>';
              echo '<td class="precioTd">';
              ///////////////////////////////////////
              $query = "SELECT nombre FROM Extras";
              $stmt = $conexion->prepare($query);
              $stmt->execute();
              while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                print "$row[nombre]"."<input type='checkbox' value=".$row['nombre']." name='extrasPizza[]'>&nbsp;&nbsp";
              }
              $stmt = null;
              ///////////////////////////////////////
              echo '</td>';
          echo '</tr>';
          echo '<tr>';
            echo '<td class="precioTitulo">Número pizzas requeridas: </td>';
            echo '<td class="precioTd">';
            echo "<input type='text' value='' name='cantidadPizzas'>";
            echo '</td>';
          echo '</tr>';
          echo '<tr>';
              echo '<td class="centroBoton">';
                  echo '<input type="submit" value="Agregar pedido" name="Enviar" class='."centroBoton".'></td>';
              echo '</td>';
          echo '</tr>';
      echo '</table>';
      echo '</form>';
      echo '<img src="imagenes/pizzanet.jpg"><br><br>';
              /////////////////////////////////////////////
              $conexion->commit();
  }catch(PDOException $ex){
    die(print_r($ex->getMessage()));
    throw $ex;
    $conexion->rollBack();
  }finally{
    $conexion = null;
    $stmt = null;
  }


}

function ensenarDatosPreciosPizzas(){
    echo '<h1><span class="tituloPrecio" style="color:black;">TAMAÑOS PIZZAS PRECIO</span></h1>';
    try
    {
      $con = empezarConexion();
      $con->beginTransaction();
      //$param = "Owner";
      $query = "SELECT idPrecio, pz.nombre as pizza, t.nombre as tamanio, pv, descripcion FROM tamanio as t
               INNER JOIN precios as p ON t.idTamanio = p.idTamanio
               INNER JOIN Pizza as pz ON p.IdPizza = pz.IdPizza;";

      $stmt = $con->prepare($query);
      $stmt->execute();
      if($stmt){
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo '<div class="columna">';

              echo '<img class="imagenDerecha" src="imagenes/'."$row[tamanio]".'.png">';
              echo '<div class="descripcion">';
                echo '<h3><span class="negro">NOMBRE: '."$row[pizza]".' TAMAÑO: '."$row[tamanio]".'</span> PRECIO: '."$row[pv]".'</h3>';
                echo '<h4><span class="negro">DESCRIPCION: '."$row[descripcion]".'</h4>';
                echo '<img class="imagenIzquierda" src="imagenes/'."$row[pizza]".'.jpg">';
              echo '</div>';
            echo '</div>';
            echo '<div class="aclarar"></div>';
            echo "\n<br>";
          }

          echo "\n<br>";
      }
      $stmt = null;
      //extras
      echo '<h1><span class="tituloPrecio" style="color:black;">EXTRAS PIZZAS PRECIO</span></h1>';
      /////////
      $query = "SELECT * FROM VistaEXTRAS";

      $stmt = $con->prepare($query);
      $stmt->execute();
      print '<div class="columnaExtras">';
      if($stmt){
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo '<h3><span class="negro">EXTRA: '."$row[NOMBRE_EXTRA]".' PRECIO: 0'."$row[PRECIO]".'</span></h3>';
            echo '<img class="imagenExtra" src="imagenes/'."$row[NOMBRE_EXTRA]".'.jpg">';
          }
          echo "\n<br>";
          echo '</div>';
          echo '<div class="aclarar"></div>';
      }

      echo "\n<br>";
      $con->commit();
      //////////
    }catch(PDOException $ex){
      die(print_r($ex->getMessage()));
      $con->rollBack();
    }finally{
      $con = null;
      $stmt = null;
    }
}

//FUNCION PARA AVERIGUAR EL ID DE Pizza
function averiguarIdPizza(PDO $con,string $nombre) :int{
  $idPizza=0;
  $query = "SELECT idPizza FROM Pizza WHERE nombre = ?";
  //preparamos
  $stmt = $con->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
       PDO::SQLSRV_ATTR_CURSOR_SCROLL_TYPE => PDO::SQLSRV_CURSOR_BUFFERED));
  $stmt->bindParam(1, $nombre, PDO::PARAM_STR);
  $stmt->execute();
  if($stmt){
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){///SE HACE ASOCIATIVO
         $idPizza = "$row[idPizza]";
      }
  }
  $stmt = null;
  return (int)$idPizza;
}//fin funcion

function averiguarIdTamanio(PDO $con,string $tamanoPizza) :int{
  $idTamanio = 0;
  $idPizza=0;
  $query = "SELECT idTamanio FROM Tamanio WHERE nombre = '$tamanoPizza';";
  //preparamos
  $stmt = $con->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
       PDO::SQLSRV_ATTR_CURSOR_SCROLL_TYPE => PDO::SQLSRV_CURSOR_BUFFERED));
  $stmt->bindParam(1, $tamanoPizza, PDO::PARAM_STR, 12);
  $stmt->execute();
  if($stmt){
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){///SE HACE ASOCIATIVO
         $idTamanio = "$row[idTamanio]";
      }
  }
  $stmt = null;
  return (int)$idTamanio;
}

function averiguarIdExtas(PDO $con,array $extrasArray)  :array{
  $arrayExtras = [];
  $contador=0;
  $idPizza=0;
  $query = "SELECT idExtra, nombre FROM Extras;";
  //preparamos
  $stmt = $con->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
       PDO::SQLSRV_ATTR_CURSOR_SCROLL_TYPE => PDO::SQLSRV_CURSOR_BUFFERED));
  $stmt->execute();
  if($stmt){
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){///SE HACE ASOCIATIVO
         $idTamanio = "$row[idExtra]";//sacamos los ids
         $nombre = "$row[nombre]";//sacamos los nombres
         foreach ($extrasArray as $key => $value) {//si coincide lo añade al array
            if($value == $nombre){
                $arrayExtras[$contador] = $idTamanio;
                $contador++;
            }
         }
      }
   }
   $stmt = null;
   return $arrayExtras;
}


function averiguarPreciosTotalExtras(PDO $con,array $idExtras) :float{
    $preciosExtrasAcumulados = 0;
    $extrasArrayId = [];
    $idPizza=0;
    $query = "SELECT idExtra,pv FROM Extras;";
    //preparamos
    $stmt = $con->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
         PDO::SQLSRV_ATTR_CURSOR_SCROLL_TYPE => PDO::SQLSRV_CURSOR_BUFFERED));
    $stmt->execute();
    if($stmt){
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){///SE HACE ASOCIATIVO
           $idExtra = "$row[idExtra]";//sacamos los ids
           $pv = "$row[pv]";//sacamos los precios
           foreach ($idExtras as $key => $value) {//si coincide lo añade al array
              if($value == $idExtra){
                  $preciosExtrasAcumulados += $pv;
              }
           }
        }
     }
     $stmt = null;
     return $preciosExtrasAcumulados;

}

function averiguarPrecioTamanio(PDO $con,int $IdTamanio,int $idPizza) :float{
    $preciosTamanioPizza = 0;
    $query = "SELECT pv FROM Precios WHERE idTamanio = ? AND idPizza = ? ;";
    //preparamos
    $stmt = $con->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
         PDO::SQLSRV_ATTR_CURSOR_SCROLL_TYPE => PDO::SQLSRV_CURSOR_BUFFERED));
    $stmt->bindParam(1, $IdTamanio, PDO::PARAM_INT);
    $stmt->bindParam(2, $idPizza, PDO::PARAM_INT);
    $stmt->execute();
    if($stmt){
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){///SE HACE ASOCIATIVO
           $preciosTamanioPizza = "$row[pv]";//sacamos los precios
        }
     }
     $stmt = null;
     return $preciosTamanioPizza;
}

function averiguarIdPrecioPizza(PDO $con,int $IdTamanio,int $idPizza) :int{
    $idPrecio = 0;
    $query = "SELECT idPrecio FROM Precios
    WHERE idTamanio = ? AND idPizza = ? ;";
    //preparamos
    $stmt = $con->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
           PDO::SQLSRV_ATTR_CURSOR_SCROLL_TYPE => PDO::SQLSRV_CURSOR_BUFFERED));
    $stmt->bindParam(1, $IdTamanio, PDO::PARAM_INT);
    $stmt->bindParam(2, $idPizza, PDO::PARAM_INT);
    $stmt->execute();
    if($stmt){
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){///SE HACE ASOCIATIVO
           $idPrecio = "$row[idPrecio]";//sacamos los precios
        }
    }
    $stmt = null;
    return (int)$idPrecio;

}

function averiguarPreciosTotalesEnCasoBorrado(array $arrayTOTALdatosPEDIDOS) :float{
    $totalPrecio = 0.0;
    $totalPrecioPedido= 0.0;
    $preciosExtras = 0.0;
    $preciosTamanioPizza = 0.0;
    foreach ($arrayTOTALdatosPEDIDOS as $key1 => $value1) {
        foreach ($value1 as $key2 => $value2) {
            if($key2 == 'EL PRECIO DE LOS EXTRAS ES = '){
                $preciosExtras = $value2;
            }
            if($key2 == 'EL PRECIO DEL TAMAÑO ES = '){
                $preciosTamanioPizza = $value2;
            }
        }
        $totalPrecioPedido = $preciosExtras + $preciosTamanioPizza;
        $totalPrecio += $totalPrecioPedido;
    }
    return $totalPrecio;
}

function averiguarIdCliente(PDO $con,string $nombre,string $direccion,string $tlfno,string $eCorreo) :int{
    $idCliente = 0;
    $query = "SELECT idCliente FROM Cliente
    WHERE nombre = ? AND direccion = ?
    AND  tlfno = ? AND eCorreo = ?;";
    //preparamos
    $stmt = $con->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
         PDO::SQLSRV_ATTR_CURSOR_SCROLL_TYPE => PDO::SQLSRV_CURSOR_BUFFERED));
    $stmt->bindParam(1, $nombre, PDO::PARAM_STR);
    $stmt->bindParam(2, $direccion, PDO::PARAM_STR);
    $stmt->bindParam(3, $tlfno, PDO::PARAM_STR);
    $stmt->bindParam(4, $eCorreo, PDO::PARAM_STR);
    $stmt->execute();
    if($stmt){
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){///SE HACE ASOCIATIVO
           $idCliente = "$row[idCliente]";//sacamos los precios
        }
    }
    $stmt = null;

    return (int)$idCliente;
}

function existeCLIENTEboolean(PDO $con,string $nombre,string $direccion,string $tlfno,string $eCorreo) :bool{
    $booleanoCliente = false;
    $query = "SELECT idCliente FROM Cliente
    WHERE nombre = ? AND direccion = ?
    AND  tlfno = ? AND eCorreo = ?;";
    //preparamos
    $stmt = $con->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
         PDO::SQLSRV_ATTR_CURSOR_SCROLL_TYPE => PDO::SQLSRV_CURSOR_BUFFERED));
    $stmt->bindParam(1, $nombre, PDO::PARAM_STR);
    $stmt->bindParam(2, $direccion, PDO::PARAM_STR);
    $stmt->bindParam(3, $tlfno, PDO::PARAM_STR);
    $stmt->bindParam(4, $eCorreo, PDO::PARAM_STR);
    $stmt->execute();
    if($stmt){
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){///SE HACE ASOCIATIVO
           $booleanoCliente = true;
        }
    }
    $stmt = null;
    return (bool)$booleanoCliente;
}

function averiguarIdPedido(PDO $con,int $idCliente) :int{
    //$fecha=strtotime($row["Fecha"]);
    //$fecha=DATE_FORMAT($fecha,'%d %m %Y %H %i %S');
    $fechaActual = date("Y-m-d H:i:s");
    $idPedido = 0;
    $query = "SELECT idPedido FROM Pedido
    WHERE idCliente = ? AND fPedido = ?;";
    //WHERE idCliente = '$idCliente' AND fPedido = '$fechaActual';";
    //preparamos
    $stmt = $con->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
         PDO::SQLSRV_ATTR_CURSOR_SCROLL_TYPE => PDO::SQLSRV_CURSOR_BUFFERED));
    $stmt->bindParam(1,$idCliente, PDO::PARAM_INT);
    $stmt->bindParam(2,$fechaActual, PDO::PARAM_STR);
    $stmt->execute();
    if($stmt){
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){///SE HACE ASOCIATIVO
           $idPedido = "$row[idPedido]";//sacamos los precios
        }
    }
    $stmt = null;
    return (int)$idPedido;
}

function devolverObjetoPedido(PDO $con,int $idCliente){
    $idCliente1 = 0;
    $fechaActual1 = date("Y-m-d H:i:s");
    $fechaActual = date("Y-m-d H:i:s");
    $idPedido = 0;
    $query = "SELECT idPedido, idCliente,fPedido,servido,importe FROM Pedido
    WHERE idCliente = ? AND fPedido = ?;";
    //WHERE idCliente = '$idCliente' AND fPedido = '$fechaActual';";
    //preparamos
    $stmt = $con->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
         PDO::SQLSRV_ATTR_CURSOR_SCROLL_TYPE => PDO::SQLSRV_CURSOR_BUFFERED));
    $stmt->bindParam(1,$idCliente, PDO::PARAM_INT);
    $stmt->bindParam(2,$fechaActual, PDO::PARAM_STR);
    $stmt->execute();
    if($stmt){
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){///SE HACE ASOCIATIVO
           $idPedido = "$row[idPedido]";
           $idCliente1 = "$row[idCliente]";
           $fechaActual1 = "$row[fPedido]";
           $servido = "$row[servido]";
           $importe = "$row[importe]";
        }
    }
    $stmt = null;
    $fechaActual1 = new DateTime($fechaActual1);
    $pedido = new Pedido($idPedido,$idCliente1,$fechaActual1,$servido,$importe);
    return $pedido;
}

//ESTAS FUNCIONES TIENEN QUE SER PARA LOS INSERT
function introducirCliente(PDO $con,string $nombre,string $direccion,string $tlfno,string $eCorreo){
    $id = 0;
    $query = "EXEC insertarCliente '$nombre','$direccion','$tlfno','$eCorreo','$id';";
    $stmt = $con->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
         PDO::SQLSRV_ATTR_CURSOR_SCROLL_TYPE => PDO::SQLSRV_CURSOR_BUFFERED));
    $stmt->execute();
    if($stmt){
      //  echo 'Cliente insertado';
      //  echo "\n<br>";
     }
     $stmt = null;
}

function insertarPedido(PDO $con,int $idCliente, bool $servido,int  $importe){
    //$fecha=strtotime($row["Fecha"]);
    //$fecha=DATE_FORMAT($fecha,'%d %m %Y %H %i %S');
    $id = 0;
    $fechaActual = date('d/m/Y H:i:s');
    $id = 0;
    $query = "EXEC insertarPedido '$idCliente','$fechaActual','$servido','$importe', ?;";
    $stmt = $con->prepare($query);
    $stmt->bindParam(1, $id, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT, 4);
    //debo devolver un int aparte de insertar el pedido
    $stmt->execute();
    if($stmt){
      //  echo 'Pedido insertado';
        //echo "\n<br>";
        $stmt->nextRowSet();//pone el cursor en la siguiente fila
        //coge la ultima fila que has insertado y te coge el id de la ultima insercion
     }
     $stmt = null;
     return $id;
}

function introducirLineaPedido(PDO $con,int $idPedido,int $idPRECIO,string $numeroPizzas,string $masaPizza,string $tipoPizza,string $tamanoPizza){
  //pasamos el numero pizzas a int
  $numeroPizzas = (int)$numeroPizzas;
  $id = $idPRECIO;
  $query = "exec insertaLineaPedido $idPedido,'$tipoPizza','$tamanoPizza',$numeroPizzas,'$masaPizza',?;" ;//consulta
  $stmt = $con->prepare($query);
  $stmt->bindParam(1, $id, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT, 4);
  $stmt->execute();
  if($stmt){
    //  echo 'Linea pedido insertada';
      //echo "\n<br>";
      $stmt->nextRowSet();//pone el cursor en la siguiente fila
      //coge la ultima fila que has insertado y te coge el id de la ultima insercion
   }
   $stmt = null;
   return $id;
}
//para INSERTAR (EN PRINCIPIO ESTA VACIA) EN EXTRAS PEDIDOS TABLA
//tengo que usar el idpedido de la linea de pedido , y el id eextrra de la tabla extras
function introducirExtrasPedido(PDO $con,int $idPedido,int $idPRECIO,array $idExtras){
  $extraString = '';
  foreach ($idExtras as $key => $extra) {
      $extra = (int)($extra);
      $extraString = devolverExtrasStringPorId($con,$extra);
      $query = "EXEC insertarExtrasPedido '$idPedido','$idPRECIO','$extraString';";
      $stmt = $con->prepare($query);
      $stmt->execute();
      if($stmt){
          //echo 'Extra pedido insertado';
          //echo "\n<br>";
       }
       $stmt = null;
  }
}

function devolverExtrasStringPorId(PDO $con,int $idExtras) :string{
    $extrasString = '';
    $query = "SELECT nombre FROM Extras WHERE IdExtra = ?; ";
    $stmt = $con->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
         PDO::SQLSRV_ATTR_CURSOR_SCROLL_TYPE => PDO::SQLSRV_CURSOR_BUFFERED));
    $stmt->bindParam(1, $idExtras, PDO::PARAM_INT);
    $stmt->execute();
    if($stmt){
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){///SE HACE ASOCIATIVO
           $extrasString = "$row[nombre]";
        }
     }
    $stmt = null;
    return $extrasString;
}


//funcion para comprobar que el cliente ya existia
function existeCliente(PDO $con,string $nombre,string $direccion,string $telefono,string $email) :bool{
  $idClienteComprobar =0;
  $boolean = false;
  $query = "SELECT idCliente FROM Cliente WHERE nombre = ? AND direccion = ? AND tlfno = ? AND eCorreo = ?;";
  $stmt = $con->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
       PDO::SQLSRV_ATTR_CURSOR_SCROLL_TYPE => PDO::SQLSRV_CURSOR_BUFFERED));
  $stmt->bindParam(1, $nombre, PDO::PARAM_STR);
  $stmt->bindParam(2, $direccion, PDO::PARAM_STR);
  $stmt->bindParam(3, $telefono, PDO::PARAM_STR);
  $stmt->bindParam(4, $email, PDO::PARAM_STR);
  $stmt->execute();
  if($stmt){
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){///SE HACE ASOCIATIVO
         $idClienteComprobar = "$row[idCliente]";//sacamos los id
      }
   }
   if($idClienteComprobar==null){
       $boolean = true;//cliente no existe
   }
  $stmt = null;
  return $boolean;
}

function averiguarDescripcionPizza(int $idPizza) :string{
  $descripcion = "";
  try
  {
        $con = empezarConexion();
        $con->beginTransaction();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $query = "SELECT descripcion FROM Pizza WHERE idPizza = ?;";
        $stmt = $con->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
             PDO::SQLSRV_ATTR_CURSOR_SCROLL_TYPE => PDO::SQLSRV_CURSOR_BUFFERED));
        $stmt->bindParam(1, $idPizza, PDO::PARAM_INT);
        $stmt->execute();
        if($stmt){
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){///SE HACE ASOCIATIVO
               $idPizza = "$row[descripcion]";//sacamos los id
            }
            $con->commit();
         }

  }catch(PDOException $ex){
    die(print_r($ex->getMessage()));
    $con->rollBack();
  }finally{
    $stmt = null;
    $con = null;
  }
  return (string)$descripcion;
}


function recorrerPedidoArray(array $arrayTOTALdatosPEDIDOS){
  $cont =0;
  echo '<h1 class="parrafoDatosDerecha">EL PEDIDO SIGUIENTE CONSISTE EN:<br></h1>';//PONEMOS DATOS DEL PEDIDO
  foreach ($arrayTOTALdatosPEDIDOS as $clave => $pedido) {//el pedido es un array
      echo '<h1 class="parrafoDatosDerecha">NUMERO PEDIDO '.($cont+1).'</h1>';
      echo '<table>';
      foreach ($pedido as $key => $value) {
        if(is_array($value)){
              echo '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>'.$key.'</td>
              <td class='."pedidoTD".'>';
              foreach ($value as $key1 => $value1) {
                  echo "---".$value1."<br>";
              }  /////fin del foreach

              echo '</td></tr><br>';
        }else{
            echo '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>'.$key.'</td><td class='."pedidoTD".'>'
            .$value.'</td></tr><br>';
        }
      }
      $cont++;
      echo '</table>';
      //este es el boton para borrar array posicion por arrayExtras
      echo '<form name='."formularioCancelarPedido".$cont.' action='."procesamientoPedido.php".' method='."POST".' >';
      echo '<table>';
      echo '<tr>';
          echo '<td class="centroBoton">';
              echo "<input type='submit' value='Borrar pedido '.$cont.' name='Borrar' class='centroBoton'></td>";
              echo "<td>.$cont.</td>";
              echo '<td><input type='."hidden".' name='."indice".' value='.$cont.'></td>';
          echo '</td>';
      echo '</tr>';
      echo '</table>';
      echo "</form>";
  }
}

//funcion para borrar pedido por posicion
function borrarPedidoArrayPosicion($posicionBorrar,$arrayPedidos){
    $pos = intval($posicionBorrar);
    for ($i=0; $i < count($arrayPedidos); $i++) {
        if($pos == $i){
          unset($arrayPedidos[$pos]);
        }
    }
    if($pos == 0){
        unset($arrayPedidos[0]);
    }
    return $arrayPedidos;
}

function recorrerPedidoTOTAL(array $arrayTOTALdatosPEDIDOS){
  $cont =0;
  echo '<h1 class="parrafoDatosDerecha">EL PEDIDO SIGUIENTE CONSISTE EN:<br></h1>';//PONEMOS DATOS DEL PEDIDO
  foreach ($arrayTOTALdatosPEDIDOS as $clave => $pedido) {//el pedido es un array
      echo '<h1 class="parrafoDatosDerecha">NUMERO PEDIDO '.($cont+1).'</h1>';
      echo '<table class='.'precioTablaTotal'.'>';
      foreach ($pedido as $key => $value) {
        if(is_array($value)){
              echo '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>'.$key.'</td>
              <td class='."pedidoTD".'>';
              foreach ($value as $key1 => $value1) {
                  echo "---".$value1."<br>";
              }  /////fin del foreach

              echo '</td></tr><br>';
        }else{
            echo '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>'.$key.'</td><td class='."pedidoTD".'>'
            .$value.'</td></tr><br>';
        }
      }
      $cont++;
      echo '</table>';
      echo "</form>";
  }

}

//añadimos un pedido al array
function anadirPedidoArray($objetoPedido,$arrayTOTALdatosPEDIDOS){
  array_push($arrayTOTALdatosPEDIDOS, $objetoPedido);
  return $arrayTOTALdatosPEDIDOS;
}

function averiguarPVprecios(PDO $con,int $idPRECIO,int $idPizza,int $IdTamanio) :float{
  $pv = 0.0;
  $query = "SELECT pv FROM Precios WHERE idPrecio = ? AND idPizza = ? AND idTamanio = ?;";
  $stmt = $con->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
       PDO::SQLSRV_ATTR_CURSOR_SCROLL_TYPE => PDO::SQLSRV_CURSOR_BUFFERED));
  $stmt->bindParam(1, $idPRECIO, PDO::PARAM_INT);
  $stmt->bindParam(2, $idPizza, PDO::PARAM_INT);
  $stmt->bindParam(3, $IdTamanio, PDO::PARAM_INT);
  $stmt->execute();
  if($stmt){
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){///SE HACE ASOCIATIVO
         $pv = "$row[pv]";//sacamos los id
      }
   }
   $stmt = null;
   return (float)$pv;
}

function comprobarPizzaYapedida(array $arrayTOTALNECESARIOINSERCIONES,string $tipoPizza) :bool{
  $boolenPizza = false;
  $pizza = '';
  foreach ($arrayTOTALNECESARIOINSERCIONES as $key1 => $value1) {
    foreach ($value1 as $key2 => $value2) {
        if($key2 == 'TIPO PIZZA'){
            $pizza = $value2;
        }
        if($tipoPizza == $pizza){
            $boolenPizza = true;
        }
    }
  }

  return $boolenPizza;
}

?>
