<?php
declare(strict_types=1);
include_once __DIR__ . '/../../app/config/sanitize.php';
class Reserva
{ private $usuarioNick;//Usuario NVARCHAR(100) NOT NULL,
  private $fReserva ;//DATETIME2(7) not null,

  public function __construct(array $reserva)
  { $this->usuarioNick = $reserva['Usuario'];
    $this->fReserva = $reserva['fReserva'];
  }

  public function setUsuarioNick(string $usuarioNick)
  { $this->usuarioNick = sanea($usuarioNick);
  }

  public function setFReserva(date $fReserva)
  { $this->fReserva = sanea($fReserva);
  }

  public function getUsuarioNick() :string
  { return (string)$this->usuarioNick;
  }

  public function getFReserva() :date
  { return (string)$this->fReserva;
  }


}//fin clase
