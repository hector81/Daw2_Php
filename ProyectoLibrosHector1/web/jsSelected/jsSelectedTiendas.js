var peticion1 = null;
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

  document.getElementById("provincia").onchange = cargaMunicipios;
  document.getElementById("municipio").onchange = cargaTiendas;
}
