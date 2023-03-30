const enviaAjaxJSONGET = () => {
    const nombre = formGET.nombre.value;
    const apellido = formGET.apellido.value;

    const xmlHttp = new XMLHttpRequest();
    let urlDestino = `server.php?nombre=${nombre}&apellido=${apellido}`;
    xmlHttp.open("GET", urlDestino, true);
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4){
            let resp = xmlHttp.responseText;
            let objson = JSON.parse(resp);
            console.log(objson);
            let nombre = objson.nombre;
            let apellido = objson.apellido;
            let largonombre = objson.largonombre;
            let largoapellido = objson.largoapellido;
            console.log(nombre, apellido, largonombre, largoapellido);


            result = `nombre: ${nombre}, longitud: ${largonombre} caracteres <br>
             apellido: ${apellido}, longitud: ${largoapellido} caracteres <br>`;

             document.getElementById("mostra").innerHTML = result;

        }
    }
    formGET.nombre.value = "";
    formGET.apellido.value = "";
    xmlHttp.send(null);
    return false;
}

const enviaAjaxJSONPOST = () => {
    console.log("dentro de post");
    const nombre = formPost.nombre.value;
    const apellido = formPost.apellido.value;

    const xmlHttp = new XMLHttpRequest();
    let urlDestino = `http://localhost/2023/Php/21_Ajax_fetch/xhr/server.php`;
    let params = `nombre=${nombre}&apellido=${apellido}`
   
    xmlHttp.open("POST",urlDestino, true);
    xmlHttp.setRequestHeader("Content-Type","application/x-www-for-urlencoded");
    console.log(xmlHttp);
    xmlHttp.onreadystatechange = function(){
        if(xmlHttp.readyState == 4){
            let resp = xmlHttp.responseText;
            let objson = JSON.parse(resp);
            console.log(objson);
            let nombre = objson.nombre;
            let apellido = objson.apellido;
            let largonombre = objson.largonombre;
            let largoapellido = objson.largoapellido;
            console.log(nombre, apellido, largonombre, largoapellido);


            result = `nombre: ${nombre}, longitud: ${largonombre} caracteres <br>
             apellido: ${apellido}, longitud: ${largoapellido} caracteres <br>`;

             document.getElementById("mostra").innerHTML = result;

        }


    }
    formGET.nombre.value = "";
    formGET.apellido.value = "";
    xmlHttp.send(params);
    return false;
};

document.addEventListener("DOMContentLoaded", () => {
    jsonGet.addEventListener("click", enviaAjaxJSONGET);
    jsonPost.addEventListener("click", enviaAjaxJSONPOST);
});