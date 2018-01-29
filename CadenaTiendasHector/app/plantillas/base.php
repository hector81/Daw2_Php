<!DOCTYPE html>
<html>
  <head>
    <title>Cadena Tiendas</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href='web/css/estilos.css' />
  </head>
  <body>
    <div id="contenedor">
      <header>
        <h1>Cadena Tiendas Media</h1>
      </header>
      <nav>
        <hr>

        <a href="index.php?ctl=categorias">Categorias</a> |

        <a href="index.php?ctl=todosLosProductos">Todos los productos</a> |

        <a href="index.php?ctl=nuestrasTiendas">Nuestras tiendas</a> |

        <a href="index.php?ctl=altaUsuario">Alta Usuario</a> |

        <a href="index.php?ctl=buscar">Buscar</a> |

        <a href="index.php?ctl=verArticulo">Ver Articulo</a> |

        <a href="index.php?ctl=cerrarSesion">Cerrar sesion</a>

        <hr>
      </nav>
      <div id="contenido">
        <?= $contenido ?>
      </div>
      <footer>
        <hr>
        <p align="center">- Pie de página -</p>
      </footer>
    </div>
  </body>
</html>
