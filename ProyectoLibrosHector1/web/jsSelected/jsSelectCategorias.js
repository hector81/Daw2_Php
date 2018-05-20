var peticion = null;
//1-Instanciar el objeto XMLHttpRequest
function inicializa_xhr() {
  if (window.XMLHttpRequest) {
    return new XMLHttpRequest();//El objeto XMLHttpRequest permite la recepción de respuestas del servidor en formato XML.
  } else if (window.ActiveXObject) {
    return new ActiveXObject("Microsoft.XMLHTTP");
  }
}
//Preparar la función de respuesta
function cargarCategorias() {
  if (peticion.readyState == 4) {
    if (peticion.status == 200) {
      var lista = document.getElementById("categoria");
      ////almacenamos el fichero en la variable y recorremos el fichero mediante DOM,guardamos el dato y mostramos los valores obtenidos
      var categoriaCarga = eval('(' + peticion.responseText + ')');

      lista.options[0] = new Option("- selecciona -");
      var i=1;
      for(var codigo in categoriaCarga) {
        lista.options[i] = new Option(categoriaCarga[codigo], codigo);
        i++;
      }
    }
  }
}
//Preparar la función de respuesta
function cargaSubcategoriasURL() {
  var lista = document.getElementById("categoria");//cogemos la categoria elegida arriba
  var categoriasElegida = lista.options[lista.selectedIndex].value;
  if(!isNaN(categoriasElegida)) {
    peticion = inicializa_xhr();
    if (peticion) {
      peticion.onreadystatechange = cargarSubCategorias;//Realizar la petición al servidor y ejecutar la función de respuesta
      peticion.open("POST", "http://localhost:8080/ProyectoLibrosHector1/web/jsSelected/cargaSubCategoriasJSON.php?nocache=" + Math.random(), true);
      peticion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      peticion.send("categoria=" + categoriasElegida);
    }
  }
}

function cargarSubCategorias() {
  if (peticion.readyState == 4) {
    if (peticion.status == 200) {
      var lista = document.getElementById("subcategoria");
      var subcategoriasCarga = eval('(' + peticion.responseText + ')');
      ////almacenamos el fichero en la variable y recorremos el fichero mediante DOM,guardamos el dato y mostramos los valores obtenidos
      lista.options.length = 0;
      var i=0;
      for(var codigo in subcategoriasCarga) {
        lista.options[i] = new Option(subcategoriasCarga[codigo], codigo);
        i++;
      }
    }
  }
}

window.onload = function() {
  peticion = inicializa_xhr();
  if(peticion) {
    peticion.onreadystatechange = cargarCategorias;//Realizar la petición al servidor y ejecutar la función de respuesta
    peticion.open("GET", "http://localhost:8080/ProyectoLibrosHector1/web/jsSelected/cargaCategoriasJSON.php?nocache="+Math.random(), true);
    peticion.send(null);
  }

  document.getElementById("categoria").onchange = cargaSubcategoriasURL;
}
