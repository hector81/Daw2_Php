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
function muestraProvincias() {
  if (peticion.readyState == 4) {
    if (peticion.status == 200) {
      ////almacenamos el fichero en la variable y recorremos el fichero mediante DOM,guardamos el dato y mostramos los valores obtenidos
      var lista = document.getElementById("provincia");
      var provincias = eval('(' + peticion.responseText + ')');

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
    peticion = inicializa_xhr();
    if (peticion) {
      peticion.onreadystatechange = muestraMunicipios;//Realizar la petición al servidor y ejecutar la función de respuesta
      peticion.open("POST", "http://localhost:8080/ProyectoLibrosHector1/web/jsSelected/cargaMunicipiosJSON.php?nocache=" + Math.random(), true);
      peticion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      peticion.send("provincia=" + provincia);
    }
  }
}
//Preparar la función de respuesta
function muestraMunicipios() {
  if (peticion.readyState == 4) {
    if (peticion.status == 200) {
      var lista = document.getElementById("municipio");
      var municipios = eval('(' + peticion.responseText + ')');
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

window.onload = function() {
  peticion = inicializa_xhr();
  if(peticion) {
    peticion.onreadystatechange = muestraProvincias;//Realizar la petición al servidor y ejecutar la función de respuesta
    peticion.open("GET", "http://localhost:8080/ProyectoLibrosHector1/web/jsSelected/cargaProvinciasJSON.php?nocache="+Math.random(), true);
    peticion.send(null);
  }

  document.getElementById("provincia").onchange = cargaMunicipios;
}
