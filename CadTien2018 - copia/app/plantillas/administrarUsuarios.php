<?php ob_start();include 'nl2br2.php'; ?>
<h1>Bienvenido <?php echo $_SESSION['userNombre'].' perteneciente al grupo de: '.$_SESSION['grupoUser'] ;?></h1>
<div class="usuariosAdministrar">
<?php
      echo '<h1>'.'USUARIOS'.'</h1>';

      foreach ($listaUsuarios as $key1 => $usuarios) {
        echo '<table class="usuariosIzquierda">';
                      echo '<tr>';
                          echo '<td>';
                              echo 'NICK USUARIO';
                          echo '</td>';
                          echo '<td>';
                              echo $usuarios->getUsuario();
                          echo '</td>';
                      echo '</tr>';
                      echo '<tr>';
                          echo '<td>';
                              echo 'CONTRASEÑA';
                          echo '</td>';
                          echo '<td>';
                              echo $usuarios->getContrasenia();
                          echo '</td>';
                      echo '</tr>';
                      echo '<tr>';
                          echo '<td>';
                              echo 'GRUPO';
                          echo '</td>';
                          echo '<td>';
                              echo $usuarios->getGrupo();
                          echo '</td>';
                      echo '</tr>';
                      echo '<tr>';
                          echo '<td>';
                              echo 'NOMBRE';
                          echo '</td>';
                          echo '<td>';
                              echo $usuarios->getNombre();
                          echo '</td>';
                      echo '</tr>';
                      echo '<tr>';
                          echo '<td>';
                              echo 'APELLIDOS';
                          echo '</td>';
                          echo '<td>';
                              echo $usuarios->getApellido();
                          echo '</td>';
                      echo '</tr>';
                      echo '<tr>';
                          echo '<td>';
                              echo 'CALLE';
                          echo '</td>';
                          echo '<td>';
                              echo $usuarios->getCalle();
                          echo '</td>';
                      echo '</tr>';
                      echo '<tr>';
                          echo '<td>';
                              echo 'CÓDIGO POSTAL';
                          echo '</td>';
                          echo '<td>';
                              echo $usuarios->getCp();
                          echo '</td>';
                      echo '</tr>';
                      echo '<tr>';
                          echo '<td>';
                              echo 'CIUDAD';
                          echo '</td>';
                          echo '<td>';
                              echo $usuarios->getCiudad();
                          echo '</td>';
                      echo '</tr>';
                      echo '<tr>';
                          echo '<td>';
                              echo 'PROVINCIA';
                          echo '</td>';
                          echo '<td>';
                              echo $usuarios->getProvincia();
                          echo '</td>';
                      echo '</tr>';
                      echo '<tr>';
                          echo '<td>';
                              echo 'TELÉFONO';
                          echo '</td>';
                          echo '<td>';
                              echo $usuarios->getTlfno();
                          echo '</td>';
                      echo '</tr>';
                      echo '<tr>';
                          echo '<td>';
                              echo 'EMAIL';
                          echo '</td>';
                          echo '<td>';
                              echo $usuarios->getECorreo();
                          echo '</td>';
                      echo '</tr>';

              echo '<tr><td>';
              echo '<form id="borradoUsuario" name="borradoUsuario" class="borradoUsuario" action="index.php?ctl=borrarUsuario" method="POST">';
              echo '<input type="submit" class="botonCentral" name="Borrar" value="BORRAR USUARIO">';
              echo '<input type="hidden" name="nombreUsuario" value="'.$usuarios->getUsuario().'">';
              echo '</form>';
              echo '</td></tr>';
              echo '<tr><td>';
              echo '<form id="modificarUsuario" name="modificarUsuario" class="modificarUsuario" action="index.php?ctl=modificarUsuario" method="POST">';
              echo '<input type="submit" class="botonCentral" name="Borrar" value="MODIFICAR USUARIO">';
              echo '<input type="hidden" name="nickUsuario" value="'.$usuarios->getUsuario().'">';
              echo '<input type="hidden" name="nombreUsuario" value="'.$usuarios->getNombre().'">';
              echo '<input type="hidden" name="apellidoUsuario" value="'.$usuarios->getApellido().'">';
              echo '<input type="hidden" name="calleUsuario" value="'.$usuarios->getCalle().'">';
              echo '<input type="hidden" name="cpUsuario" value="'.$usuarios->getCp().'">';
              echo '<input type="hidden" name="tlfnoUsuario" value="'.$usuarios->getTlfno().'">';
              echo '<input type="hidden" name="emailUsuario" value="'.$usuarios->getECorreo().'">';
              echo '<input type="hidden" name="ciudadUsuario" value="'.$usuarios->getCiudad().'">';
              echo '<input type="hidden" name="contraseniaUsuario" value="'.$usuarios->getContrasenia().'">';
              echo '<input type="hidden" name="grupoUsuario" value="'.$usuarios->getGrupo().'">';
              echo '<input type="hidden" name="provinciaUsuario" value="'.$usuarios->getProvincia().'">';
              echo '</form>';
              echo '</td></tr>';
              echo '</table>';
      }

      echo '<h1>'.'ADMINISTRADORES'.'</h1>';

      foreach ($listaAdministradores as $key1 => $usuarios) {
                echo '<table class="administradoresDerecha">';
                echo '<tr>';
                    echo '<td>';
                        echo 'NICK USUARIO';
                    echo '</td>';
                    echo '<td>';
                        echo $usuarios->getUsuario();
                    echo '</td>';
                echo '</tr>';
                echo '<tr>';
                    echo '<td>';
                        echo 'CONTRASEÑA';
                    echo '</td>';
                    echo '<td>';
                        echo $usuarios->getContrasenia();
                    echo '</td>';
                echo '</tr>';
                echo '<tr>';
                    echo '<td>';
                        echo 'GRUPO';
                    echo '</td>';
                    echo '<td>';
                        echo $usuarios->getGrupo();
                    echo '</td>';
                echo '</tr>';
                echo '<tr>';
                    echo '<td>';
                        echo 'NOMBRE';
                    echo '</td>';
                    echo '<td>';
                        echo $usuarios->getNombre();
                    echo '</td>';
                echo '</tr>';
                echo '<tr>';
                    echo '<td>';
                        echo 'APELLIDOS';
                    echo '</td>';
                    echo '<td>';
                        echo $usuarios->getApellido();
                    echo '</td>';
                echo '</tr>';
                echo '<tr>';
                    echo '<td>';
                        echo 'CALLE';
                    echo '</td>';
                    echo '<td>';
                        echo $usuarios->getCalle();
                    echo '</td>';
                echo '</tr>';
                echo '<tr>';
                    echo '<td>';
                        echo 'CÓDIGO POSTAL';
                    echo '</td>';
                    echo '<td>';
                        echo $usuarios->getCp();
                    echo '</td>';
                echo '</tr>';
                echo '<tr>';
                    echo '<td>';
                        echo 'PROVINCIA';
                    echo '</td>';
                    echo '<td>';
                        echo $usuarios->getProvincia();
                    echo '</td>';
                echo '</tr>';
                echo '<tr>';
                    echo '<td>';
                        echo 'TELÉFONO';
                    echo '</td>';
                    echo '<td>';
                        echo $usuarios->getTlfno();
                    echo '</td>';
                echo '</tr>';
                echo '<tr>';
                    echo '<td>';
                        echo 'EMAIL';
                    echo '</td>';
                    echo '<td>';
                        echo $usuarios->getECorreo();
                    echo '</td>';
                echo '</tr>';

              echo '<tr><td>';
              echo '<form id="borradoUsuario" name="borradoUsuario" class="borradoUsuario" action="index.php?ctl=borrarUsuario" method="POST">';
              echo '<input type="submit" class="botonCentral" name="Borrar" value="BORRAR ADMINISTRADOR">';
              echo '<input type="hidden" name="nombreUsuario" value="'.$usuarios->getUsuario().'">';
              echo '</form>';
              echo '</td></tr>';
              echo '<tr><td>';
              echo '<form id="modificarUsuario" name="modificarUsuario" class="modificarUsuario" action="index.php?ctl=modificarUsuario" method="POST">';
              echo '<input type="submit" class="botonCentral" name="Borrar" value="MODIFICAR USUARIO">';
              echo '<input type="hidden" name="nickUsuario" value="'.$usuarios->getUsuario().'">';
              echo '<input type="hidden" name="nombreUsuario" value="'.$usuarios->getNombre().'">';
              echo '<input type="hidden" name="apellidoUsuario" value="'.$usuarios->getApellido().'">';
              echo '<input type="hidden" name="calleUsuario" value="'.$usuarios->getCalle().'">';
              echo '<input type="hidden" name="cpUsuario" value="'.$usuarios->getCp().'">';
              echo '<input type="hidden" name="tlfnoUsuario" value="'.$usuarios->getTlfno().'">';
              echo '<input type="hidden" name="emailUsuario" value="'.$usuarios->getECorreo().'">';
              echo '<input type="hidden" name="ciudadUsuario" value="'.$usuarios->getCiudad().'">';
              echo '<input type="hidden" name="contraseniaUsuario" value="'.$usuarios->getContrasenia().'">';
              echo '<input type="hidden" name="grupoUsuario" value="'.$usuarios->getGrupo().'">';
              echo '<input type="hidden" name="provinciaUsuario" value="'.$usuarios->getProvincia().'">';
              echo '</form>';
              echo '</td></tr>';
              echo '</table>';
      }

      echo '<div class="aclarar"></div>';
 ?>
</div>
<?php $contenido = ob_get_clean() ?>

<?php include 'baseAdministrador.php' ?>
