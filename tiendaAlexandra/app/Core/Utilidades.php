<?php
/**He creado esta clase Utilidades donde se encuenran aquellas funciones de validaciones y "utensilios" que puedo
requerir en varias ocasiones en diferentes ficheros. Aunque algunos los utilizo en Controller y otros en Repository
al no disponer de BaseRepository y tratandose de una función he optado por agruparlas en el mismo fichero Utilidades.
**/
  namespace Amowhi\Cms\Core;

  class Utilidades{
    /*
    trim — Elimina espacio en blanco (u otros caracteres) del inicio y el final de la cadena
    stripslashes — Quita las barras de un string con comillas escapadas
    htmlspecialchars — Convierte caracteres especiales en entidades HTML, ej: < &lt, & &amp;
    */
      public static function test_input($data) {
      $character_mask = " \t\n\r\0\x0B";
      $data = trim($data,$character_mask);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    //Valida los campos introducidos por el usuario.
      public static function validarParametrosRegistroUsuario($usuario, $contrasenia,$grupo)
      {
        //Documentación:
        //http://www.igdonline.com/blog/rapido-y-completo-expresiones-regulares-en-php/
        //https://desarrolloweb.com/articulos/validar-clave-php.html
        //https://diego.com.es/expresiones-regulares-en-php
        //http://www.jveweb.net/archivo/2011/07/algunas-expresiones-regulares-y-como-usarlas-en-php.html#jveweb_es_041_03
        //http://web.ontuts.com/snippets/10-expresiones-regulares-imprescindibles-en-desarrollo-web/

        //array donde se guardarán los errores.
        $errors=[];

        //patrones-expresiones regulares
        $usuarioVal='/[a-z]*[0-9]*/';
        $contraseñaVal='/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/';

        if(!preg_match($usuarioVal,$usuario)) {
          $errors['usuario'] = true;
        }elseif(!preg_match($contraseñaVal,$contrasenia)) {
          $errors['contraseña'] = true;
        }
        return $errors;
      }

      //Valida los campos introducidos por el usuario requeridos en envio y en registro.
      public static function validarDatosUsuario($nombre, $apellidos,$direccion, $provincia, $ciudad, $codPostal, $pais,$telefono, $email)
      {
        $errors=[];

        $nombreVal='/^[A-ZÑÁÉÍÓÚ\s ].*/';
        $apellidosVal='/^[A-ZÑÁÉÍÓÚ\s ].*/';
        $direccionVal='/^[A-ZÑÁÉÍÓÚ\s ].*/';
        $ciudadVal='/^[A-ZÑÁÉÍÓÚ\s ].*/';
        $codPostalVal='/[0-9]{5}/';
        $provinciaVal='/^[A-ZÑÁÉÍÓÚ\s ].-?.*/';
        $paisVal='/^[A-ZÑÁÉÍÓÚ\s ].*/';
        $emailVal='/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/';
        $telefonoVal='/[0-9]*/';

        if(!preg_match($nombreVal,$nombre)) {
          $errors['nombre'] = true;
        }elseif(!preg_match($apellidosVal,$apellidos)) {
          $errors['apellidos'] = true;
        }elseif(!preg_match($direccionVal,$direccion)) {
          $errors['direccion'] = true;
        }elseif(!preg_match($ciudadVal,$ciudad)) {
          $errors['ciudad'] = true;
        }elseif(!preg_match($codPostalVal,$codPostal)) {
          $errors['codPostal'] = true;
        }elseif(!preg_match($provinciaVal,$provincia)) {
          $errors['provincia'] = true;
        }elseif(!preg_match($paisVal,$pais)) {
          $errors['pais'] = true;
        }elseif(!preg_match($emailVal,$email)) {
          $errors['email'] = true;
        }elseif(!preg_match($telefonoVal,$telefono)) {
          $errors['telefono'] = true;
        }

        return $errors;
      }


    //Funcion que sirve para ver la sentencia sql con los valores/parametros
    public static function parms($string,$data) {
        $indexed=$data==array_values($data);
        foreach($data as $k=>$v) {
            if(is_string($v)) $v="'$v'";
            if($indexed) $string=preg_replace('/\?/',$v,$string,1);
            else $string=str_replace(":$k",$v,$string);
        }
        return $string;
    }
  }
