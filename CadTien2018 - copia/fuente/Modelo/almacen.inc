<?php
include_once __DIR__ . '/../../app/conf/sanitize.php';
class Almacen {
    private $idArticulo;//INT NOT NULL
    private $idTienda;//INT NOT NULL
    private $stock;//INT NOT NULL

    function __construct(array $almacen){
        $this->idArticulo = $almacen['idArticulo'];
        $this->idTienda = $almacen['idTienda'];
        $this->stock = $almacen['stock'];
    }

    public function getIdArticulo() :int{
        return $this->idArticulo;
    }

    public function setIdArticulo($idArticulo){
       $this->idArticulo = sanear($idArticulo);
    }

    public function getIdTienda() :int{
        return $this->idTienda;
    }

    public function setIdTienda($idTienda){
       $this->idTienda = sanear($idTienda);
    }

    public function getStock() :int{
        return $this->stock;
    }

    public function setStock($stock){
       $this->stock = sanear($stock);
    }
}

?>
