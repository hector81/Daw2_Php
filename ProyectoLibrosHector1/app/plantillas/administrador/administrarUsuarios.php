<?php
ob_start();
include './app/config/nl2br2.php';
?>

<?php
foreach ($listaUsuarios as $key1 => $usuario) {
    if ($key1 == 'administradorArray') {
        echo '<h2>ADMINISTRADORES</h2>';
        echo '<p>En esta tabla estan todos los administradores inscritos</p>';
        echo '<table class="table table-condensed">';
        echo '<thead>';
        echo '<tr>';
        echo '<th style="word-break: break-all;">Nick</th>';
        echo '<th style="word-break: break-all;">Nombre</th>';
        echo '<th style="word-break: break-all;">Apellido 1</th>';
        echo '<th style="word-break: break-all;">Apellido 2</th>';
        echo '<th style="word-break: break-all;">Teléfono</th>';
        echo '<th style="word-break: break-all;">Nif</th>';
        echo '<th style="word-break: break-all;">Email</th>';
        echo '<th style="word-break: break-all;">Acciones</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($usuario as $key2 => $value) {
            echo '<tr>';
            echo '<td style="word-break: break-all;">' . $value['NICK_USUARIO'] . '</td>';
            echo '<td style="word-break: break-all;">' . $value['Nombre'] . '</td>';
            echo '<td style="word-break: break-all;">' . $value['PrimerApellido'] . '</td>';
            echo '<td style="word-break: break-all;">' . $value['SegundoApellido'] . '</td>';
            echo '<td style="word-break: break-all;">' . $value['Telefono'] . '</td>';
            echo '<td style="word-break: break-all;">' . $value['Nif'] . '</td>';
            echo '<td style="word-break: break-all;">' . $value['Email'] . '</td>';
            echo '<td style="word-break: break-all;">
                <a href="index.php?ctl=modificarUsuario&email=' . $value['Email'] . '">
                <span class="glyphicon glyphicon-pencil"></span>
                </a>
                <a href="index.php?ctl=borrarUsuarios&email=' . $value['Email'] . '">
                <span class="glyphicon glyphicon-remove"></span>
                </a>
                <a href="index.php?ctl=verUsuarioIndividual&email=' . $value['Email'] . '">
                <span class="glyphicon glyphicon-eye-open"></span>
                </a>
                </td>';
            echo '</tr>';

        }
        echo '</tbody>';
        echo '</table>';
    }
    if ($key1 == 'usuarioArray') {
        echo '<h2>USUARIOS</h2>';
        echo '<p>En esta tabla estan todos los usuario inscritos:</p>';
        echo '<table class="table table-condensed">';
        echo '<thead>';
        echo '<tr>';
        echo '<th style="word-break: break-all;">Nick</th>';
        echo '<th style="word-break: break-all;">Nombre</th>';
        echo '<th style="word-break: break-all;">Apellido 1</th>';
        echo '<th style="word-break: break-all;">Apellido 2</th>';
        echo '<th style="word-break: break-all;">Teléfono</th>';
        echo '<th style="word-break: break-all;">Nif</th>';
        echo '<th style="word-break: break-all;">Email</th>';
        echo '<th style="word-break: break-all;">Acciones</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($usuario as $key2 => $value) {
            echo '<tr>';
            echo '<td style="word-break: break-all;">' . $value['NICK_USUARIO'] . '</td>';
            echo '<td style="word-break: break-all;">' . $value['Nombre'] . '</td>';
            echo '<td style="word-break: break-all;">' . $value['PrimerApellido'] . '</td>';
            echo '<td style="word-break: break-all;">' . $value['SegundoApellido'] . '</td>';
            echo '<td style="word-break: break-all;">' . $value['Telefono'] . '</td>';
            echo '<td style="word-break: break-all;">' . $value['Nif'] . '</td>';
            echo '<td style="word-break: break-all;">' . $value['Email'] . '</td>';
            echo '<td style="word-break: break-all;">
              <a href="index.php?ctl=modificarUsuario&email=' . $value['Email'] . '">
              <span class="glyphicon glyphicon-pencil"></span>
              </a>
              <a href="index.php?ctl=borrarUsuarios&email=' . $value['Email'] . '">
              <span class="glyphicon glyphicon-remove"></span>
              </a>
              <a href="index.php?ctl=verUsuarioIndividual&email=' . $value['Email'] . '">
              <span class="glyphicon glyphicon-eye-open"></span>
              </a>
              </td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    }
}

?>



<?php
$contenido = ob_get_clean()?>
<?php
include 'baseAdministrador.php';
?>
