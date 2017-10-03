<?php
namespace Amowhi\Cms\Repository;
use Amowhi\Cms\Core\Database;

class UsuarioRepository
{
  private $con = null;

  public function __construct(){
    $this->con = (new Database())->getConexion();
  }

  //Busca el usuario y contraseña del login,si coincide con los de la tabla usuario devuelve true al controlador.
  public function findUsuario($nombre, $contrasenia)
  { $sql = "SELECT id, contrasenia, grupo FROM usuario WHERE usuario = :usu";

    $cursor = $this->con->prepare($sql);
    $cursor->bindValue(':usu', $nombre);
    $cursor->execute();
    if($fila = $cursor->fetch()){
      if(password_verify($contrasenia, $fila['contrasenia'])){
        $_SESSION['grupo'] = $fila['grupo'];
        $_SESSION['idUsuario'] = $fila['id'];
        $_SESSION['usuario'] = $nombre;

       return true;
      }else{
       return false;
      }
    }
  }

  //Realiza el insert del nuevo usuario en la tabla usuario.
  public function registerUsuario($usuario, $contrasenia,$grupo, $nombre, $apellidos,$direccion, $provincia, $ciudad, $codPostal, $pais,$telefono, $email)
  {
    try{
      $sql="INSERT INTO usuario(usuario,contrasenia,grupo,nombre, apellidos,direccion,ciudad,provincia,codigoPostal,pais,telefono,email) VALUES (:usu, :pwd, :grp, :nombre, :apellidos, :direccion, :provincia, :ciudad, :codigoPostal, :pais, :telefono, :email )";
      $cursor = $this->con->prepare($sql);
      $cursor->bindValue(':usu', $usuario);
      $cursor->bindValue(':pwd', $contrasenia);
      $cursor->bindValue(':grp', $grupo);
      $cursor->bindValue(':nombre', $nombre);
      $cursor->bindValue(':apellidos', $apellidos);
      $cursor->bindValue(':direccion', $direccion);
      $cursor->bindValue(':provincia', $provincia);
      $cursor->bindValue(':ciudad', $ciudad);
      $cursor->bindValue(':codigoPostal', $codPostal);
      $cursor->bindValue(':pais', $pais);
      $cursor->bindValue(':telefono', $telefono);
      $cursor->bindValue(':email', $email);

      $cursor->execute();
      $afectadas = $cursor->rowCount();
        if ($afectadas>0){
        header('Location: /Namespaces/web/index.php?ctl=iniciaSesion&registroOk');
        }
    }catch(\PDOException $ex){
      die("Ha habido un error inesperado: ".$ex);
    }
  }

  //Busca los datos del usuario según el idUsuario de la session
  public function findDatos($idUsuario)
  {
    try{
        $sql = "SELECT id,usuario,nombre, apellidos,direccion,ciudad,provincia,codigoPostal,pais,telefono,email
                FROM usuario WHERE id = :id";

        $cursor = $this->con->prepare($sql);
        $cursor->bindValue(':id', $idUsuario);
        $cursor->execute();
        $datosUsuario=[];
        if($fila = $cursor->fetch()){
          $datosUsuario = [
          'idUsuario' => $fila['id'],
          'usuario' => $fila['usuario'],
          'nombre' => $fila['nombre'],
          'apellidos' => $fila['apellidos'],
          'direccion' => $fila['direccion'],
          'provincia' => $fila['provincia'],
          'ciudad' => $fila['ciudad'],
          'codigoPostal' => $fila['codigoPostal'],
          'pais' => $fila['pais'] ,
          'telefono' => $fila['telefono'] ,
          'email' => $fila['email'] ,
          ];
        }
        return $datosUsuario;

    }catch(\PDOException $ex){
      die("Ha habido un error inesperado: ".$ex);
    }
  }


  public function actualizarDatos($idUsuario, $nombre, $apellidos,$direccion, $provincia, $ciudad, $codPostal, $pais,$telefono, $email)
  {
    try{
      $sql = "UPDATE usuario  SET nombre = :nombre, apellidos = :apellidos,direccion = :direccion, ciudad = :ciudad,
      provincia = :provincia, codigoPostal = :codigoPostal, pais = :pais,telefono = :telefono, email = :email
      WHERE id = :id";

      $cursor = $this->con->prepare($sql);
      $cursor->bindValue(':nombre', $nombre);
      $cursor->bindValue(':apellidos', $apellidos);
      $cursor->bindValue(':direccion', $direccion);
      $cursor->bindValue(':provincia', $provincia);
      $cursor->bindValue(':ciudad', $ciudad);
      $cursor->bindValue(':codigoPostal', $codPostal);
      $cursor->bindValue(':pais', $pais);
      $cursor->bindValue(':telefono', $telefono);
      $cursor->bindValue(':email', $email);
      $cursor->bindValue(':id', $idUsuario);

      $cursor->execute();
    }catch(\PDOException $ex){
      die("Ha habido un error inesperado: ".$ex);
    }
  }

  public function findEnviosUsuario($idUsuario)
  {
    $sql="SELECT id,idUsuario, idVenta, nombre,apellidos,direccion, ciudad, provincia, codigoPostal, pais, estado,tiendaSeleccionada,
    tipoEnvio = CASE
                    WHEN tipoEnvio = '0' THEN 'Recogida en Tienda'
                    WHEN tipoEnvio = '5.99' THEN 'Compra Online'
                    END
    FROM envios WHERE idUsuario = :idUsuario";

    $cursor = $this->con->prepare($sql,array(\PDO::ATTR_CURSOR=>\PDO::CURSOR_SCROLL));
    $cursor->bindValue(':idUsuario',$idUsuario);
    $cursor->execute();
    $envios = $cursor->fetchAll();

    return $envios;
  }
}
