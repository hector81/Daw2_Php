var peticion1 = null;var peticion2 = null;var peticion3 = null;var peticion4 = null;
///////////////////////parte para provincias
//1-Instanciar el objeto XMLHttpRequest
function inicializa_xhr() {
  if (window.XMLHttpRequest) {
    return new XMLHttpRequest();//El objeto XMLHttpRequest permite la recepción de respuestas del servidor en formato XML.
  } else if (window.ActiveXObject) {
    return new ActiveXObject("Microsoft.XMLHTTP");
  }
}
//Preparar la función de respuesta
function muestraProvincias() {
  if (peticion1.readyState == 4) {
    if (peticion1.status == 200) {
      ////almacenamos el fichero en la variable y recorremos el fichero mediante DOM,guardamos el dato y mostramos los valores obtenidos
      var lista = document.getElementById("provincia");
      var provincias = eval('(' + peticion1.responseText + ')');

      lista.options[0] = new Option("- selecciona -");
      var i=1;
      for(var codigo in provincias) {
        lista.options[i] = new Option(provincias[codigo], codigo);
        i++;
      }
    }
  }
}
///////////////////////

///////////////////////parte para municipios
function cargaMunicipios() {
  var lista = document.getElementById("provincia");//cogemos la provincia elegida arriba
  var provincia = lista.options[lista.selectedIndex].value;
  if(!isNaN(provincia)) {
    peticion1 = inicializa_xhr();
    if (peticion1) {
      peticion1.onreadystatechange = muestraMunicipios;//Realizar la petición al servidor y ejecutar la función de respuesta
      peticion1.open("POST", "http://localhost:8080/ProyectoLibrosHector1/web/jsSelected/cargaMunicipiosJSON.php?nocache=" + Math.random(), true);
      peticion1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      peticion1.send("provincia=" + provincia);
    }
  }
}
//Preparar la función de respuesta
function muestraMunicipios() {
  if (peticion1.readyState == 4) {
    if (peticion1.status == 200) {
      var lista = document.getElementById("municipio");
      var municipios = eval('(' + peticion1.responseText + ')');
      ////almacenamos el fichero en la variable y recorremos el fichero mediante DOM,guardamos el dato y mostramos los valores obtenidos
      lista.options.length = 0;
      var i=0;
      for(var codigo in municipios) {
        lista.options[i] = new Option(municipios[codigo], codigo);
        i++;
      }
    }
  }
}
///////////////////////


///////////////////////parte para tiendas

function cargaTiendas() {
  var lista = document.getElementById("municipio");//cogemos la provincia elegida arriba
  var municipio = lista.options[lista.selectedIndex].value;
  if(!isNaN(municipio)) {
    peticion2 = inicializa_xhr();
    if (peticion2) {
      peticion2.onreadystatechange = muestraTiendas;//Realizar la petición al servidor y ejecutar la función de respuesta
      peticion2.open("POST", "http://localhost:8080/ProyectoLibrosHector1/web/jsSelected/cargarTiendasCiudadJSON.php?nocache=" + Math.random(), true);
      peticion2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      peticion2.send("municipio=" + municipio);
    }
  }
}
//Preparar la función de respuesta
function muestraTiendas() {
  if (peticion2.readyState == 4) {
    if (peticion2.status == 200) {
      var lista = document.getElementById("tienda");
      var tiendas = eval('(' + peticion2.responseText + ')');
      ////almacenamos el fichero en la variable y recorremos el fichero mediante DOM,guardamos el dato y mostramos los valores obtenidos
      lista.options.length = 0;
      var i=0;
      for(var codigo in tiendas) {
        lista.options[i] = new Option(tiendas[codigo], codigo);
        i++;
      }
    }
  }
}

///////////////////////



///////////////////////parte para categorias
function cargarCategorias() {
  var lista = document.getElementById("categoria");//cogemos la provincia elegida arriba
  var categoria = lista.options[lista.selectedIndex].value;
  if(!isNaN(categoria)) {
    peticion3 = inicializa_xhr();
    if (peticion3) {
      peticion3.onreadystatechange = muestraCategorias;//Realizar la petición al servidor y ejecutar la función de respuesta
      peticion3.open("POST", "http://localhost:8080/ProyectoLibrosHector1/web/jsSelected/cargaCategoriasJSON.php?nocache=" + Math.random(), true);
      peticion3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      peticion3.send("categoria=" + categoria);
    }
  }
}
//Preparar la función de respuesta
function muestraCategorias() {
  if (peticion3.readyState == 4) {
    if (peticion3.status == 200) {
      var lista = document.getElementById("categoria");
      var categorias = eval('(' + peticion3.responseText + ')');
      ////almacenamos el fichero en la variable y recorremos el fichero mediante DOM,guardamos el dato y mostramos los valores obtenidos
      lista.options.length = 0;
      var i=0;
      for(var codigo in categorias) {
        lista.options[i] = new Option(categorias[codigo], codigo);
        i++;
      }
    }
  }
}

///////////////////////


///////////////////////parte para subcategorias

function cargarSubcategorias() {
  var lista = document.getElementById("categoria");//cogemos la categoria elegida arriba
  var categoriasElegida = lista.options[lista.selectedIndex].value;
  if(!isNaN(categoriasElegida)) {
    peticion4 = inicializa_xhr();
    if (peticion4) {
      peticion4.onreadystatechange = muestraSubCategorias;//Realizar la petición al servidor y ejecutar la función de respuesta
      peticion4.open("POST", "http://localhost:8080/ProyectoLibrosHector1/web/jsSelected/cargaSubCategoriasJSON.php?nocache=" + Math.random(), true);
      peticion4.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      peticion4.send("categoria=" + categoriasElegida);
    }
  }
}
//Preparar la función de respuesta
function muestraSubCategorias() {
  if (peticion4.readyState == 4) {
    if (peticion4.status == 200) {
      var lista = document.getElementById("subcategoria");
      var subcategoriasCarga = eval('(' + peticion4.responseText + ')');
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



///////////////////////





window.onload = function() {
  peticion1 = inicializa_xhr();
  if(peticion1) {
    peticion1.onreadystatechange = muestraProvincias;//Realizar la petición al servidor y ejecutar la función de respuesta
    peticion1.open("GET", "http://localhost:8080/ProyectoLibrosHector1/web/jsSelected/cargaProvinciasJSON.php?nocache="+Math.random(), true);
    peticion1.send(null);
  }
  peticion2 = inicializa_xhr();
  if(peticion2) {
    peticion2.onreadystatechange = muestraProvincias;//Realizar la petición al servidor y ejecutar la función de respuesta
    peticion2.open("GET", "http://localhost:8080/ProyectoLibrosHector1/web/jsSelected/cargaMunicipiosJSON.php?nocache="+Math.random(), true);
    peticion2.send(null);
  }
  peticion3 = inicializa_xhr();
  if(peticion3) {
    peticion3.onreadystatechange = muestraCategorias;//Realizar la petición al servidor y ejecutar la función de respuesta
    peticion3.open("GET", "http://localhost:8080/ProyectoLibrosHector1/web/jsSelected/cargaCategoriasJSON.php?nocache="+Math.random(), true);
    peticion3.send(null);
  }
  peticion4 = inicializa_xhr();
  if(peticion4) {
    peticion4.onreadystatechange = muestraSubCategorias;//Realizar la petición al servidor y ejecutar la función de respuesta
    peticion4.open("GET", "http://localhost:8080/ProyectoLibrosHector1/web/jsSelected/cargaSubCategoriasJSON.php?nocache="+Math.random(), true);
    peticion4.send(null);
  }

  document.getElementById("provincia").onchange = cargaMunicipios;
  document.getElementById("municipio").onchange = cargaTiendas;
  document.getElementById("categoria").onchange = cargarCategorias;
  document.getElementById("categoria").onchange = cargarSubcategorias;
}
