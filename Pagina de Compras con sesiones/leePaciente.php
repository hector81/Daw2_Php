<?php
   $ser = "(local)\sqlexpress";
   $usuario = file_get_contents('app\usuSS.txt');
   $contra = file_get_contents('app\pass.txt');
   $conInfo = ['Database'=>'CentrosSalud', 'UID'=>$usuario, 'PWD'=>$contra,
               'ReturnDatesAsStrings'=>true, 'CharacterSet'=>'UTF-8'];

   $con = sqlsrv_connect($ser, $conInfo);
   if($con === false )
   {  echo "Conexión fallida\n<br>";
      die(print_r(sqlsrv_errors(), true));
   }

   $sql1 = "{call selPacientesSign}";
   $cursor = sqlsrv_query($con, $sql1);
   if($cursor===false)
   {  echo "Error al ejecutar la sentencia\n<br>";
      die(print_r(sqlsrv_errors(), true));
   }
   $numFilas = sqlsrv_num_rows($cursor);
   if($numFilas!=false)
   {  echo "Num filas leídas: $numFilas\n<br>";
   }else
   {  echo "Los cursores Forward no tienen acceso al número de filas leídas\n<br>";
   }
   $fila=sqlsrv_fetch_array($cursor, SQLSRV_FETCH_NUMERIC);
   while($fila != false)
   {  echo "$fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5]\n<br>";
      $fila = sqlsrv_fetch_array($cursor, SQLSRV_FETCH_NUMERIC);
   }

   sqlsrv_free_stmt($cursor);
   echo "\n\n<br><br>";

   $sql2 = "{call selPacientesHM}";
   $cursor = sqlsrv_query($con, $sql2, null,
            ['Scrollable'=>SQLSRV_CURSOR_KEYSET, 'QueryTimeout'=>2]);
   if($cursor===false)
   {  echo "Error al ejecutar la sentencia 2\n<br>";
      die(print_r(sqlsrv_errors(), true));
   }
   $numFilas = sqlsrv_num_rows($cursor);
   if($numFilas!=false)
   {  echo "Num filas leídas: $numFilas\n<br>";
   }else
   {  echo "Los cursores Keyset no tienen acceso al número de filas leídas\n<br>";
   }

   $fila = sqlsrv_fetch($cursor, SQLSRV_SCROLL_LAST);
   while($fila != false)
   {  echo sqlsrv_get_field($cursor, 0, SQLSRV_PHPTYPE_INT) .", ".
           sqlsrv_get_field($cursor, 1, SQLSRV_PHPTYPE_STRING('UTF-8')).", ".
           sqlsrv_get_field($cursor, 2, SQLSRV_PHPTYPE_STRING('UTF-8')).", ".
           sqlsrv_get_field($cursor, 3, SQLSRV_PHPTYPE_STRING('UTF-8')).", ".
           sqlsrv_get_field($cursor, 4, SQLSRV_PHPTYPE_STRING('UTF-8')).", ".
           sqlsrv_get_field($cursor, 5, SQLSRV_PHPTYPE_STRING('UTF-8'))."\n<br>";
      $fila = sqlsrv_fetch($cursor, SQLSRV_SCROLL_PRIOR);
   }

   sqlsrv_free_stmt($cursor);
   echo "\n\n<br><br>";

   $sql3="SELECT * FROM Paciente WHERE Upper(Nombre) LIKE ?";

   $params = ['A%'];
   $cursor = sqlsrv_query($con, $sql3, $params, ['Scrollable'=>'dynamic']);
   if($cursor===false)
   {  echo "Error al ejecutar la sentencia 3\n<br>";
      die(print_r(sqlsrv_errors(), true));
   }
   $numFilas = sqlsrv_num_rows($cursor);
   if($numFilas!=false)
   {  echo "Num filas leídas: $numFilas\n<br>";
   }else
   {  echo "Los cursores dinámicos no tienen acceso al número de filas leídas\n<br>";
   }

   $fila = sqlsrv_fetch($cursor, SQLSRV_SCROLL_FIRST);
   while($fila != false)
   {  echo sqlsrv_get_field($cursor, 0, SQLSRV_PHPTYPE_INT) .", ".
            sqlsrv_get_field($cursor, 1, SQLSRV_PHPTYPE_STRING('UTF-8')).", ".
            sqlsrv_get_field($cursor, 2, SQLSRV_PHPTYPE_STRING('UTF-8')).", ".
            sqlsrv_get_field($cursor, 3, SQLSRV_PHPTYPE_STRING('UTF-8')).", ".
            date_format(sqlsrv_get_field($cursor, 4, SQLSRV_PHPTYPE_DATETIME), "d/m/Y").", ".
            sqlsrv_get_field($cursor, 5, SQLSRV_PHPTYPE_STRING('UTF-8'))."\n<br>";
      $fila = sqlsrv_fetch($cursor, SQLSRV_SCROLL_NEXT);
   }

   sqlsrv_free_stmt($cursor);
   echo "\n\n<br><br>";

   $sql4="SELECT * FROM Paciente WHERE Upper(Nombre) LIKE ?";

   $params = ['%A%'];
   $cursor = sqlsrv_query($con, $sql4, $params, ['Scrollable'=>'static']);
   if($cursor===false)
   {  echo "Error al ejecutar la sentencia 4\n<br>";
      die(print_r(sqlsrv_errors(), true));
   }
   $numFilas = sqlsrv_num_rows($cursor);
   if($numFilas!=false)
   {  echo "Num filas leídas: $numFilas\n<br>";
   }else
   {  echo "Los cursores estáticos no tienen acceso al número de filas leídas\n<br>";
   }

   foreach(sqlsrv_field_metadata($cursor) as $data)
   {  echo $data['Name'].", ";
      echo $data['Type'].", ";
      echo $data['Nullable']."\n<br>";
   }
   $fila = sqlsrv_fetch($cursor, SQLSRV_SCROLL_FIRST);
   while($fila != false)
   {  echo sqlsrv_get_field($cursor, 0, SQLSRV_PHPTYPE_INT) .", ".
            sqlsrv_get_field($cursor, 1, SQLSRV_PHPTYPE_STRING('UTF-8')).", ".
            sqlsrv_get_field($cursor, 2, SQLSRV_PHPTYPE_STRING('UTF-8')).", ".
            sqlsrv_get_field($cursor, 3, SQLSRV_PHPTYPE_STRING('UTF-8')).", ".
            date_format(sqlsrv_get_field($cursor, 4, SQLSRV_PHPTYPE_DATETIME), "d/m/Y").", ".
            sqlsrv_get_field($cursor, 5, SQLSRV_PHPTYPE_STRING('UTF-8'))."\n<br>";
      $fila = sqlsrv_fetch($cursor, SQLSRV_SCROLL_RELATIVE, 2);
   }


   sqlsrv_free_stmt($cursor);
   sqlsrv_close($con);
?>
