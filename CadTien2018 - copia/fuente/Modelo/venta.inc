<?php
include_once __DIR__ . '/../../app/conf/sanitize.php';
class Venta{
    private $idVenta;// INT IDENTITY NOT NULL,
    private $idUsuario;//NVARCHAR(20) NOT NULL,
    private $fVenta;//DATETIME2(7) NOT NULL,
    private $total;//    MONEY NOT NULL,
    private $envio;//  NCHAR(20) DEFAULT('RECOGER') ,--DOMICILIOFACTURA --OTRODOMICILIO,

   //constraint PkVenta PRIMARY KEY (idVenta)

    function __construct(array $venta){
      $this->idVenta = $venta['idVenta'];
      $this->idUsuario = $venta['idUsuario'];
      $this->fVenta = $venta['fVenta'];
      $this->total = $venta['total'];
      $this->envio = $venta['envio'];
    }

    public function getIdVenta() :int{
      return $this->idVenta;
    }

    public function setIdVenta(int $idVenta){
      $this->idVenta = sanear($idVenta);
    }

    public function getIdUsuario() :string{
      return $this->idUsuario;
    }

    public function setIdUsuario(string $idUsuario){
      $this->idUsuario = sanear($idUsuario);
    }

    public function getFVenta() :date{
      return $this->fVenta;
    }

    public function setFVenta(date $fVenta){
      $this->fVenta = sanear($fVenta);
    }

    public function getTotal() :float{
      return $this->total;
    }

    public function setTotal(float $total){
      $this->total = sanear($total);
    }

    public function getEnvio() :string{
      return $this->envio;
    }

    public function setEnvio(string $envio){
      $this->envio = sanear($envio);
    }
}

 ?>
