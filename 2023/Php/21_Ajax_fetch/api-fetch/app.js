const formulario = document.querySelector("#formulario");
let result = document.querySelector("#mostra");

formulario.addEventListener("submit", function(e){
    e.preventDefault();


    let datos = new FormData(formulario);

    console.log(datos.get("usuario"));
    console.log(datos.get("password"));

    fetch("server/datospost.php", {
        method: "POST",
        body:datos,
    })
    .then(response => response.json())
    .then(response => {
        if (response == "error") {
            result.innerHTML = `<div>rellena todos los campos</div>`;
        } else {
            console.log (response);
            result.innerHTML = `<div>${response}</div>`;
        }
    })
})