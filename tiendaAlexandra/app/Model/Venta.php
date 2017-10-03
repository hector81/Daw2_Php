<?php
  namespace Amowhi\Cms\Model;

  class Venta
  { private $idVenta;
    private $idArticulo;
    private $fCompra;
    private $fEntrega;
    private $pv;


    public function __construct($fila)
    { $this->idVenta = $fila['idVenta'];
      $this->idArticulo = $fila['idArticulo'];
      $this->fCompra = $fila['fCompra'];
      $this->fEntrega = $fila['fEntrega'];
      $this->pv = $fila['pv'];
    }

    public function setIdArticulo($aIdArticulo)
    { $this->idArticulo = $aIdArticulo;
    }

    public function setFCompra($aFCompra)
    { $this->fCompra = $aFCompra;
    }

    public function setFEntrega($aFEntrega)
    {
      $this->fEntrega = $aFEntrega;
    }

    public function setPv($aPv)
    { $this->pv = $aPv;
    }

    public function getIdVenta()
    { return $this->idVenta;
    }

    public function getIdArticulo()
    { return $this->idVenta;
    }

    public function getFCompra()
    { return $this->fCompra;
    }

    public function getFEntrega()
    {  return $this->fEntrega;
    }

    public function getPv(){
      return $this->pv;
    }

  }
