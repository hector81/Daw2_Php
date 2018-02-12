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

        <a href="index.php?ctl=altaUsuario">Alta Usuario</a> |

        <a href="index.php?ctl=borrarUsuario">Borrar Usuario</a> |

        <a href="index.php?ctl=verTodosUsuarios">Ver usuarios</a> |

        <a href="index.php?ctl=altaCategoria">Alta Categoria</a> |

        <a href="index.php?ctl=borrarCategoria">Borrar Categoria</a> |

        <a href="index.php?ctl=altaProducto">Alta Producto</a> |

        <a href="index.php?ctl=borrarProducto">Borrar Producto</a> |

        <a href="index.php?ctl=todosLosProductos">Todos los productos</a> |

        <a href="index.php?ctl=nuestrasTiendas">Nuestras tiendas</a> |

        <a href="index.php?ctl=nuevaFoto">Actualizar foto</a> |

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
