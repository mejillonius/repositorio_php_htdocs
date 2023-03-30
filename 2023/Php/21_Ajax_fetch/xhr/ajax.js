const enviaAjaxJSONGET = () => {
  const nombre = formGET.nombre.value;
  const apellido = formGET.apellido.value;

  const xmlHttp = new XMLHttpRequest();
  let urlDestino = `server.php?nombre=${nombre}&apellido=${apellido}`;
  xmlHttp.open("GET", urlDestino, true);
  xmlHttp.onreadystatechange = function () {
    if (xmlHttp.readyState == 4) {
      let resp = xmlHttp.responseText;
      let objson = JSON.parse(resp);
      console.log(objson);
      let nombre = objson.nombre;
      let apellido = objson.apellido;
      let largoNombre = objson.largonombre;
      let largoApellido = objson.largoapellido;
      result = `Nombre : ${nombre}.  Longitud : ${largoNombre} carácteres <br>
      Apellido: ${apellido}. Longitud de: ${largoApellido} carácteres`;

      document.getElementById("mostra").innerHTML = result;
    }
  };
  formGET.nombre.value = "";
  formGET.apellido.value = "";
  xmlHttp.send(null);
  return false;
};

const enviaAjaxJSONPOST = () => {
  const nombre = formPost.nombre.value;
  const apellido = formPost.apellido.value;
  const xmlHttp = new XMLHttpRequest();
  let urlDestino = "server.php";
  let params = `nombre=${nombre}&apellido=${apellido}`;
  xmlHttp.open("POST", urlDestino, true); //asincrona el true
  xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xmlHttp.onreadystatechange = function () {
    if (xmlHttp.readyState == 4) {
      let resp = xmlHttp.responseText;
      console.log(resp);
      let objJSON = JSON.parse(resp);
      let nombre = objJSON.nombre;
      let apellido = objJSON.apellido;
      let largoNombre = objJSON.largonombre;
      let largoApellido = objJSON.largoapellido;

      result = `Nombre : ${nombre}.  Longitud : ${largoNombre} carácteres <br>
      Apellido: ${apellido}. Longitud de: ${largoApellido} carácteres`;
      document.getElementById("mostra").innerHTML = result;
    }
  };
  formPost.nombre.value = "";
  formPost.apellido.value = "";
  xmlHttp.send(params);
  return false;
};

document.addEventListener("DOMContentLoaded", () => {
  /*   let jsonGet = document.querySelector("#jsonGet"); */
  jsonGet.addEventListener("click", enviaAjaxJSONGET);
  /*   let jsonPost = document.querySelector("#jsonPost"); */
  jsonPost.addEventListener("click", enviaAjaxJSONPOST);
});
