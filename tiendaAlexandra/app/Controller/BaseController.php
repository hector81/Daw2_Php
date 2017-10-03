<?php
namespace Amowhi\Cms\Controller;

use Amowhi\Cms\Repository\UsuarioRepository;
use Amowhi\Cms\Repository\FamiliaRepository;

/*Controlador del cual extienden el resto de controladores. Creados debido a la necesidad de disponer los datos de familias
en todas las vistas (al estar los departamentos en el menú y utilizar un for para recorrer los nombres de familia.)
Añado datosUsuario para disponer de datos en varias vistas.*/
class BaseController {
  
  //La función cargarVistas, muestra la vista y sus parametros.
  //En defaultParams podemos introducir los datos que requerimos en varias vistas.
  public function cargarVista($nombre, $params){
    $id=null;
    if(isset($_SESSION['idUsuario'])){
      $id=$_SESSION['idUsuario'];
    }

    $defaultParams = [
      //para mostrar los departamentos en todas las vistas(utilizado en el menú en base.php)
      'familias'=>(new FamiliaRepository())->verFamilias(),
      //para recuperar los datos del usuario en mi cuenta y en datos envío.
      'datosUsuario'=>(new UsuarioRepository())->findDatos($id),
    ];

    $params = array_merge($defaultParams, $params);

    require __DIR__ . '/../../resources/views/'.$nombre.'.php';
  }



}
