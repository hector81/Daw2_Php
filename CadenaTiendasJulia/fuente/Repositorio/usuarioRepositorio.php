<?php
class UsuarioRepositorio{
  public function findUsuario($nombre, $contrasenia){
    $sql = "SELECT contrasenia, grupo, nombre, apellidos, direccion, cod_postal, ciudad, provincia, pais
              FROM usuario
             WHERE usuario = :usu";
    require_once __DIR__ . '/../../core/conexionBd.php';

    $con = (new ConexionBd())->getConexion();
    $cursor = $con->prepare($sql);
    $cursor->bindValue(':usu', $nombre);
    $cursor->execute();
    if($fila = $cursor->fetch()){
      if(password_verify($contrasenia, $fila['contrasenia'])){
        $_SESSION['grupo'] = $fila['grupo'];
        $_SESSION['usuario'] = $nombre;
        $_SESSION['nombre-usu'] = $fila['nombre'];
        $_SESSION['apellidos'] = $fila['apellidos'];
        $_SESSION['direccion'] = $fila['direccion'];
        $_SESSION['cod_postal'] = $fila['cod_postal'];
        $_SESSION['ciudad'] = $fila['ciudad'];
        $_SESSION['provincia'] = $fila['provincia'];
        $_SESSION['pais'] = $fila['pais'];
        return true;
      }
    }else{
      return false;
    }
  }

  public function newUsuario($nombre, $password, $nombreReal, $apellidos, $direccion, $codpost, $ciudad, $provincia, $pais){
     $sql = "SELECT count(*)
                FROM usuario
               WHERE usuario = :usu";
      require_once __DIR__ . '/../../core/conexionBd.php';

      $con = (new ConexionBd())->getConexion();
      $cursor = $con->prepare($sql);
      $cursor->bindValue(':usu', $nombre);
      $cursor->execute();

      if($cursor->fetchColumn() >0){
        return false;
      }else{
        $passw = password_hash(trim($password), PASSWORD_BCRYPT);
        $grupo = "cliente";
        $sqlInsert = "INSERT INTO usuario (usuario, contrasenia, grupo, nombre, apellidos, direccion, cod_postal, ciudad, provincia, pais)
        VALUES (:usu, :pass, :gru, :nom, :ape, :dir, :cp, :ciu, :pro, :pai)";

        require_once __DIR__ . '/../../core/conexionBd.php';

        $con = (new ConexionBd())->getConexion();
        $cursor = $con->prepare($sqlInsert);
        $cursor->bindValue(':usu', $nombre);
        $cursor->bindValue(':pass', $passw);
        $cursor->bindValue(':gru', $grupo);
        $cursor->bindValue(':nom', trim($nombreReal));
        $cursor->bindValue(':ape', trim($apellidos));
        $cursor->bindValue(':dir', trim($direccion));
        $cursor->bindValue(':cp', (int)$codpost);
        $cursor->bindValue(':ciu', trim($ciudad));
        $cursor->bindValue(':pro', trim($provincia));
        $cursor->bindValue(':pai', trim($pais));

        try {
          $cursor->execute();
          return true;
        } catch (Exception $e) {
          echo 'Excepción capturada: ',  $e->getMessage(), "\n";
          return false;
        }
      }
    }

    public function loadOrders(){
      $sql = "SELECT id, fCompra, fEntrega, Pv
              FROM pedido
              WHERE usuario LIKE :usu";
      require_once __DIR__ . '/../../core/conexionBd.php';
      $con = (new ConexionBd())->getConexion();
      $cursor = $con->prepare($sql);
      $cursor->execute([':usu'=> $_SESSION['usuario']]);
      $pedidos = $cursor->fetchAll(PDO::FETCH_ASSOC);
      return $pedidos;
    }

}
