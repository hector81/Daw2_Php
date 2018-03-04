<?php
include_once __DIR__ . '/../../app/conf/sanitize.php';
//usuario
class Usuario {
  private $usuario;// NVARCHAR(20) NOT NULL
  private $contrasenia;// NVARCHAR(255) NOT NULL
  private $grupo;//NVARCHAR(20) NOT NULL
  private $nombre;//NVARCHAR(50) NOT NULL
  private $apellido;//NVARCHAR(100) NOT NULL
  private $calle;//NVARCHAR(100) NOT NULL
  private $ciudad;//NVARCHAR(40) NOT NULL
  private $cp;//CHAR(5) not null
  private $provincia;//NVARCHAR(22) NOT NULL
  private $tlfno;//  CHAR(9) NOT NULL
  private $eCorreo;//NVARCHAR(100) NOT NULL,  CONSTRAINT PkUsuario PRIMARY KEY (usuario)

  function __construct(array $usuario){
      $this->usuario = $usuario['usuario'];
      $this->contrasenia = $usuario['contrasenia'];
      $this->grupo = $usuario['grupo'];
      $this->nombre = $usuario['nombre'];
      $this->apellido = $usuario['apellido'];
      $this->calle = $usuario['calle'];
      $this->ciudad = $usuario['ciudad'];
      $this->cp = $usuario['cp'];
      $this->provincia = $usuario['provincia'];
      $this->tlfno = $usuario['tlfno'];
      $this->eCorreo = $usuario['eCorreo'];
  }

  public function getUsuario() :string{
    return $this->usuario;
  }

  public function setUsuario(string $usuario){
    $this->usuario = sanear($usuario);
  }

  public function getContrasenia() :string{
    return $this->contrasenia;
  }

  public function setContrasenia(string $contrasenia){
    $this->contrasenia = sanear($contrasenia);
  }

  public function getGrupo() :string{
    return $this->grupo;
  }

  public function setGrupo(string $grupo){
    $this->grupo = sanear($grupo);
  }

  public function getNombre() :string{
    return $this->nombre;
  }

  public function setNombre(string $nombre){
    $this->nombre = sanear($nombre);
  }

  public function getApellido() :string{
    return $this->apellido;
  }

  public function setApellido(string $apellido){
    $this->apellido = sanear($apellido);
  }

  public function getCalle() :string{
    return $this->calle;
  }

  public function setCalle(string $calle){
    $this->calle = sanear($calle);
  }

  public function getCp() :string{
    return $this->cp;
  }

  public function setCp(string $cp){
    $this->cp = sanear($cp);
  }

  public function getCiudad() :string{
    return $this->ciudad;
  }

  public function setCiudad(string $ciudad){
    $this->ciudad = sanear($ciudad);
  }

  public function getProvincia() :string{
    return $this->provincia;
  }

  public function setProvincia(string $provincia){
    $this->provincia = sanear($provincia);
  }

  public function getTlfno() :string{
    return $this->tlfno;
  }

  public function setTlfno(string $tlfno){
    $this->tlfno = sanear($tlfno);
  }

  public function getECorreo() :string{
    return $this->eCorreo;
  }

  public function setECorreo(string $eCorreo){
    $this->eCorreo = sanear($eCorreo);
  }

}
?>
