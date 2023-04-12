listaProductos()

function listaProductos(valor) {
    fetch("listar.php",
        {method: "POST",
        body: valor
    })
    .then(response => response.json())
    .then(response => {
        console.log(response);

        let html ="";
        for(let valor of response) {
            html += `<tr>
                <td>${valor.id}</td>
                <td>${valor.codigo}</td>
                <td>${valor.producto}</td>
                <td>${valor.precio}</td>
                <td>${valor.cantidad}</td>
                <td><button type='button' onclick=editar(${valor.id})>Editar</button>
                    <button type='button' onclick=eliminar(${valor.id})>Eliminar</button>
                </td></tr>`;
        }
        console.log(html);
        resultado.innerHTML = html;
    })
};

const buscar = document.querySelector("#buscar");
buscar.addEventListener("keyup", () => {
    const valor = buscar.value;
    if(valor == ""){
        listaProductos();
    } else {
        listaProductos(valor);
    }
});


const registrar = document.querySelector("#registrar");
registrar.addEventListener("click", () => {
    fetch("registrar.php",{
        method: "POST",
        body: new FormData(frm)
    })
    .then(response => response.text())
    .then(response => {
        if (response == "ok"){
            frm.reset();
            listaProductos();
        } else {
            idp.value = "";
            frm.reset();
            listaProductos();
        }
    });
});

function editar(id){
    fetch("editar.php",{
        method:"PATCH",
        body: id,
        headers: {
            "content-type":"application/json",
        },
    })
    .then(response => response.json())
    .then(response => {
        console.log(response);
        idp.value = response.id;
        codigo.value = response.codigo;
        producto.value = response.producto;
        precio.value = response.precio;
        cantidad.value = response.cantidad;
    })
}

function eliminar(id){
    fetch("eliminar.php", {
        method: "DELETE",
        body: id,
    })
    .then(response => response.text())
    .then(response => {
        console.log(response);
        listaProductos();
    })
}
