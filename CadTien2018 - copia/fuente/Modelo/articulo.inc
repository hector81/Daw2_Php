<?php
include_once __DIR__ . '/../../app/conf/sanitize.php';
class Articulo {
  private $id ;//INT IDENTITY NOT NULL,
  private $nombreCorto ;//NVARCHAR(50) NOT NULL,
  private $nombre ;//NVARCHAR(200) NOT NULL,
  private $descripcion ;//NVARCHAR (4000),
  private $PVP ;//MONEY NOT NULL,
  private $idFamilia ;//INT
  private $imagen ;//nvarchar(255)
  private $agotado ;//BIT DEFAULT 'false' NOT NULL
  private $pocasUnidades ;//BIT DEFAULT 'false' NOT NULL

  function __construct(array $articulo){
    $this->id = $articulo['id'];//INT IDENTITY NOT NULL,
    $this->nombreCorto = $articulo['nombreCorto'];//NVARCHAR(50) NOT NULL,
    $this->nombre = $articulo['nombre'];//NVARCHAR(200) NOT NULL,
    $this->descripcion = $articulo['descripcion'];//NVARCHAR (4000),
    $this->PVP = $articulo['PVP'];//MONEY NOT NULL,
    $this->idFamilia = $articulo['idFamilia'];//INT
    $this->imagen = ($articulo['imagen']==null)?'imagen no disponible':$articulo['imagen'];
    //$articulo['imagen'];//nvarchar(255)
    $this->agotado = $articulo['agotado'];//BIT DEFAULT 'false' NOT NULL
    $this->pocasUnidades = $articulo['pocasUnidades'];//BIT DEFAULT 'false' NOT NULL
  }

  public function getId() :int{
    return $this->id;
  }

  public function setId(int $id){
    $this->id = sanear($id);
  }

  public function getNombreCorto() :string{
    return $this->nombreCorto;
  }

  public function setNombreCorto(string $nombreCorto){
    $this->nombreCorto = sanear($nombreCorto);
  }

  public function getNombre() :string{
    return $this->nombre;
  }

  public function setNombre(string $nombre){
    $this->nombre = sanear($nombre);
  }

  public function getDescripcion() :string{
    return $this->descripcion;
  }

  public function setDescripcion(string $descripcion){
    $this->descripcion = sanear($descripcion);
  }

  public function getPvp() :float{//money
    return $this->PVP;
  }

  public function setPvp(float $PVP){
    $this->PVP = sanear($PVP);
  }

  public function getIdFamilia() :int{
    return $this->idFamilia;
  }

  public function setIdFamilia(int $idFamilia){
    $this->idFamilia = sanear($idFamilia);
  }

  public function getImagen() :string{//la imagen es nvarchar
    return $this->imagen;
  }

  public function setImagen(string $imagen){
    $this->imagen = sanear($imagen);
  }


  public function getAgotado() :bool{
    return $this->agotado;
  }

  public function setAgotado(bool $agotado){
    $this->agotado = sanear($agotado);
  }

  public function getPocasUnidades() :bool{
    return $this->pocasUnidades;
  }

  public function setPocasUnidades(bool $pocasUnidades){
    $this->pocasUnidades = sanear($pocasUnidades);
  }

}
 ?>
