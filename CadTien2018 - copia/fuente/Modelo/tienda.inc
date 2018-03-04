<?php
include_once __DIR__ . '/../../app/conf/sanitize.php';
class Tienda {

  private $id;// INT NOT NULL IDENTITY,
  private $nombre;// NVARCHAR(100) NOT NULL,
  private $provincia;// NVARCHAR(15) NOT NULL,
  private $ciudad;// NVARCHAR(50) NOT NULL,
  private $tlfno;// NVARCHAR(9) NOT NULL,
//htmlspecialchars
//htmlentities cuando si entras un nombre y tiene un punto y coma que php lo puede interpretar como ordern, lo elimina
  function __construct(array $tiendas){
      $this->id = $tiendas['id'];// INT NOT NULL IDENTITY,
      $this->nombre = $tiendas['nombre'];// NVARCHAR(100) NOT NULL,
      $this->provincia = $tiendas['provincia'];// NVARCHAR(15) NOT NULL,
      $this->ciudad = $tiendas['ciudad'];// NVARCHAR(50) NOT NULL,
      $this->tlfno = $tiendas['tlfno'];// NVARCHAR(9) NOT NULL,
  }

  function getId() :int{
    return $this->id;
  }

  function setId(int $id){
    $this->id = sanear($id);
  }

  function getNombre() :string{
    return $this->nombre;
  }

  function setNombre(string $nombre){
    $this->nombre = sanear($nombre);
  }

  function getProvincia() :string{
    return $this->provincia;
  }

  function setProvincia(string $provincia){
    $this->provincia = sanear($provincia);
  }

  function getCiudad() :string{
    return $this->ciudad;
  }

  function setCiudad(string $ciudad){
    $this->ciudad = sanear($ciudad);
  }

  function getTelefono() :string{
    return $this->tlfno;
  }

  function setTelefono(string $tlfno){
    $this->tlfno = sanear($tlfno);
  }


}
?>
