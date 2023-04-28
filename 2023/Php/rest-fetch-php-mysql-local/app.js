const urlObtenerUsuarios =
  "https://agalarpract.byethost18.com/rest-fetch-php-mysql-local/api/obtenerUsuarios.php";
const urlAgregarUsuario =
"https://agalarpract.byethost18.com/rest-fetch-php-mysql-local/api/agregarUsuario.php";
const urlEditarUsuario =
"https://agalarpract.byethost18.com/rest-fetch-php-mysql-local/api/editarUsuario.php";
const urlBorrarUsuario =
"https://agalarpract.byethost18.com/rest-fetch-php-mysql-local/api/borrarUsuario.php";

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
    .then((respuesta) => respuesta.json())
    .then((datos) => datos)
    .catch((error) => console.log(error));
  mostrarEmpleados();
}

function mostrarEmpleados() {
  const divEmpleados = document.querySelector(".div-empleados");

  listaEmpleados.forEach((empleado) => {
    const { id, usuario, pwd, email } = empleado;

    const parrafo = document.createElement("p");
    parrafo.textContent = `${id} - ${usuario} - ${pwd} - ${email}`;
    parrafo.dataset.id = id;

    const editarBoton = document.createElement("button");
    editarBoton.onclick = () => cargarEmpleado(empleado);
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
  });
}

async function agregarEmpleado() {
  const res = await fetch(urlAgregarUsuario, {
    method: "POST",
    body: JSON.stringify(objEmpleado),
  })
    .then((respuesta) => respuesta.json())
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
    body: JSON.stringify(objEmpleado),
  })
    .then((respuesta) => respuesta.json())
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
    method: "POST",
    body: JSON.stringify({ id: id }),
  })
    .then((respuesta) => respuesta.json())
    .then((data) => data)
    .catch((error) => alert(error));

  if (res.msg === "OK") {
    alert("BORRADO");
    limpiarHTML();
    obtenerEmpleados();
    limpiarObjeto();
  }
}

function cargarEmpleado(empleado) {
  const { id, usuario, pwd, email } = empleado;

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
