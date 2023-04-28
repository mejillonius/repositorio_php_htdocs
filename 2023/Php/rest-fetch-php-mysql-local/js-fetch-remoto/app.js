const urlObtenerUsuarios =
  "http://agalarpract.byethost18.com/rest-fetch-php-mysql-local/api/obtenerUsuarios.php";
const urlAgregarUsuario =
  "http://agalarpract.byethost18.com/rest-fetch-php-mysql-local/api/agregarUsuario.php";
const urlEditarUsuario =
  "http://agalarpract.byethost18.com/rest-fetch-php-mysql-local/api/editarUsuario.php";
const urlBorrarUsuario =
  "http://agalarpract.byethost18.com/rest-fetch-php-mysql-local/api/borrarUsuario.php";

  
/*   const urlObtenerUsuarios =
  "https://adedma.com/cifolv22-23/api2/obtenerUsuarios.php";
const urlAgregarUsuario =
  "https://adedma.com/cifolv22-23/api2/agregarUsuario.php";
const urlEditarUsuario =
  "https://adedma.com/cifolv22-23/api2/editarUsuario.php";
const urlBorrarUsuario =
  "https://adedma.com/cifolv22-23/api2/borrarUsuario.php";
 */
let listaEmpleados = [];

const objEmpleado = {
  id: "",
  usuario: "",
  pwd: "",
  email: "",
};

let editando = false;

const formulario = document.querySelector("#formulario");
const usuarioInput = document.querySelector("#usuario");
const pwdInput = document.querySelector("#pwd");
const emailInput = document.querySelector("#email");

obtenerEmpleados();

async function obtenerEmpleados() {
  listaEmpleados = await fetch(urlObtenerUsuarios)
    .then((response) => response.json())
 /*    .then((data) => console.log(data)) */
    .then((data) => {
       
  const divEmpleados = document.querySelector(".div-empleados");

 data.forEach((element) => {
    const { id, usuario, pwd, email } = element;

    const parrafo = document.createElement("p");
    parrafo.textContent = `${id} - ${usuario} - ${pwd} - ${email}`;
    parrafo.dataset.id = id;

    const editarBoton = document.createElement("button");
    editarBoton.onclick = () => cargarEmpleado(element);
    editarBoton.textContent = "Editar";
    editarBoton.classList.add("btn", "btn-editar");
    parrafo.append(editarBoton);

    const eliminarBoton = document.createElement("button");
    eliminarBoton.onclick = () => eliminarEmpleado(id);
    eliminarBoton.textContent = "Eliminar";
    eliminarBoton.classList.add("btn", "btn-eliminar");
    parrafo.append(eliminarBoton);

    const hr = document.createElement("hr");

    divEmpleados.appendChild(parrafo);
    divEmpleados.appendChild(hr);
  })
  })
   .catch((error) => console.log(error));
}


async function agregarEmpleado() {
  const res = await fetch(urlAgregarUsuario, {
    method: "POST",
    mode: "cors" ,
    body: JSON.stringify(objEmpleado),
    headers: { 'Content-type': 'application/json' },
  })
    .then((response) => response.json())
    .then((data) => data)
    .catch((error) => alert(error));

  if (res.msg === "OK") {
    alert("Registro correcto");
    limpiarHTML();
    formulario.reset();
    obtenerEmpleados();
    limpiarObjeto();
  }
}

async function editarEmpleado() {
  objEmpleado.usuario = usuarioInput.value;
  objEmpleado.pwd = pwdInput.value;
  objEmpleado.email = emailInput.value;

  const res = await fetch(urlEditarUsuario, {
    method: "PUT",
     mode: "cors" ,
    body: JSON.stringify(objEmpleado),
    headers: {'Content-type': 'application/json'},
  })
    .then((response) => response.json())
    .then((data) => data)
    .catch((error) => alert(error));

  if (res.msg === "OK") {
    alert("Actualizado");
    limpiarHTML();
    obtenerEmpleados();
    formulario.reset();
    limpiarObjeto();
  }
  formulario.querySelector('button[type="submit"]').textContent = "Añadir";

  editando = false;
}


async function eliminarEmpleado(id) {
  const res = await fetch(urlBorrarUsuario, {
    method: "DELETE",
     mode: "cors" ,
    body: JSON.stringify({ id: id }),
    headers: { 'Content-type': 'application/json' },
  })
    .then((response) => response.json())
    .then((data) => data)
    .catch((error) => alert(error));

  if (res.msg === "OK") {
    alert("BORRADO");
    limpiarHTML();
    obtenerEmpleados();
    limpiarObjeto();
  }
}

function cargarEmpleado(element) {
  const { id, usuario, pwd, email } = element;

  usuarioInput.value = usuario;
  pwdInput.value = pwd;
  emailInput.value = email;

  objEmpleado.id = id;

  formulario.querySelector('button[type="submit"').textContent = "Actualizar";
  editando = true;
}

function limpiarHTML() {
  const divEmpleados = document.querySelector(".div-empleados");
  while (divEmpleados.firstChild) {
    divEmpleados.removeChild(divEmpleados.firstChild);
  }
}

function limpiarObjeto() {
  objEmpleado.id = "";
  objEmpleado.usuario = "";
  objEmpleado.pwd = "";
  objEmpleado.email = "";
}

formulario.addEventListener("submit", (e) => {
  e.preventDefault();

  if ([usuarioInput.value, pwdInput.value, emailInput.value].includes("")) {
    alert("Todos los campos son obligatorios");
    return;
  }

  if (editando) {
    editarEmpleado();
    editando = false;
  } else {
    objEmpleado.id = null;
    objEmpleado.usuario = usuarioInput.value;
    objEmpleado.pwd = pwdInput.value;
    objEmpleado.email = emailInput.value;

    agregarEmpleado();
  }
});
