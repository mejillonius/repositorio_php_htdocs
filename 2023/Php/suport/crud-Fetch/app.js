// carreguem la llista de productes a la vista
listaProductos();

function listaProductos(buscar) {
	// llama al fichero listar.php
	// le envia los datos por metodo POST
	// se los pasa a través del body
	fetch("listar.php", {
		method: "POST",
		body: buscar,
	})
		// recibe una respuesta, i trabaja con ella, en este caso la parsea como texto
		.then((response) => response.text())
		// enlaza una segunda acción en la que muestra los datos
		.then((response) => {
			// mostra a la div resultado el que hem rebut en el response
			resultado.innerHTML = response;
		});
}

// enmagatzemem la ruta a la botó registrar del DOM
const registrar = document.getElementById("registrar");

registrar.addEventListener("click", () => {
	// comprovem si ja tenim id, això voldrà dir que estem modificant un registre existent
	if (idp.value != "") {
		// demanem confirmació per saber si realment volem modificar un registre existent
		// així donem la opció de poder cancelar l'acció abans de sobreesciure el registre
		Swal.fire({
			title: "Vols ACTUALITZAR un producte EXISTENT?",
			text: "Si el que vols és crear un Producte Nou clica al botó Crear Nuevo Producto",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Sí, ACTUALITZA",
		}).then((result) => {
			// si ens confirmen vol dir que es vol sobreesciure el registre i per tant executarem el fetch
			// per actualitzar els valors del registre
			if (result.isConfirmed) {
				// usamos fetch llamando al fichero registrar.php
				fetch("registrar.php", {
					method: "POST",
					// les dades que enviem són les que recollim del formulari de registre
					body: new FormData(frm),
				})
					// parseamos la respuesta como texto
					.then((response) => response.text())
					.then((response) => {
						// notificamos que se guardado bien el registro
						Swal.fire({
							position: "top-center",
							icon: "success",
							title: "S'ha ACTUALITZAT correctament el registre",
							showConfirmButton: false,
							timer: 1500,
						});
						// al haver guardat bé el registre resetejem la llista i ho posem a introduir porducte nou sense id
						idp.value = "";
						frm.reset();
						// refresquem el llistat de productes on es mostrarà ja el producte afegit
						listaProductos();
						// tornem a la presentació inicial
						// mostrem només el botó de registrar
						nuevoProducto.type = "hidden";
						// posem el texto de Registrar al boto que ara és actualitzar
						registrar.value = "Registrar";
					});
			}
		});
	} else {
		// comprovem que no s'intenti registrar un producte sense haver introduit cap dada en ell, un producte buit

		if (
			idp.value == "" &&
			producto.value == "" &&
			precio.value == "" &&
			cantidad.value == "" &&
			codigo.value == ""
		) {
			// mostrem l'advetencia per pantalla que no hi ha res a registrar i no fem res més
			Swal.fire("Error", "El producte està buit", "warning");
		} else {
			// si no té ja id i no està buit voldrà dir que és un producte nou
			// usamos fetch llamando al fichero registrar.php
			fetch("registrar.php", {
				method: "POST",
				// enviem les dades contingudes al registre
				body: new FormData(frm),
			})
				// parseamos la respuesta como texto
				.then((response) => response.text())
				.then((response) => {
					// notifiquem que s'ha guardat correctament el registre
					Swal.fire({
						position: "top-center",
						icon: "success",
						title: "S'ha GUARDAT correctament el producte",
						showConfirmButton: false,
						timer: 1500,
					});
					// al haver guardat bé el registre resetejem la llista i ho posem a introduir porducte nou sense id
					idp.value = "";
					frm.reset();
					// refresquem el llistat de productes on es mostrarà ja el producte afegit
					listaProductos();
				});
		}
	}
});

// enmagatzemem la ruta al input buscar del DOM
const buscar = document.getElementById("buscar");
// cada cop que prenem una tecla al input buscar s'ejecutarà
buscar.addEventListener("keyup", () => {
	// recollim la dada que hi ha al input buscar
	const valor = buscar.value;
	if (valor == "") {
		// si no hem introduït res no li passa valor a buscar a la funció
		listaProductos();
	} else {
		// li diu quins valors ha de buscar
		listaProductos(valor);
	}
});

// ELIMINAR
// ens arriba el id del registre que volem eliminar
function eliminar(id) {
	// demanem confirmació de que realment volem esborrar
	Swal.fire({
		title: "Vols esborrar el producte?",
		text: "Aquesta acció no es podrà desfer",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Sí, esborra",
	}).then((result) => {
		// si confirmem donarà el missatge
		// i esborrarà el registre
		if (result.isConfirmed) {
			Swal.fire("Esborrat!!!", "El producte s'ha esborrat", "success");
			// enviem les dades a eliminar.php per que esborri el registre
			// ho fem enviant el id al fitxer eliminar.php pel mètode POST
			fetch("eliminar.php", {
				method: "POST",
				body: id,
			})
				.then((response) => response.text())
				.then((response) => {
					// mostrem tots els registres, que no contindrà ja el que hem eliminat
					listaProductos();
				});
		} else {
			// si no acceptem esborrar no farà res i ens mostrarà un missatge confirmant la nostra tria
			Swal.fire("Cancelat!!!", "El producte NO s'ha esborrat", "warning");
		}
	});
}

// EDITAR
// en la funció editar rebrem el id del registre que volem editar
// el que farà és retornar-nos les dades d'aquest registre per mostrar-les al formulari de registre
// per tal que allà les poguem editar
function editar(id) {
	fetch("editar.php", {
		method: "POST",
		body: id,
	})
		// nos llegan los datos como json
		.then((response) => response.json())
		.then((response) => {
			console.log(response);

			// treballem directament sobre el id sense haver de fer getElementById ja que estem treballant sobre inputs
			// dintre de un form, en un procès d'enviament o rebuda de dades
			// només dintre del fetch API o del xmlHttpRequest

			// carreguem al formulari les dades del registre a editar
			idp.value = response.id;
			codigo.value = response.codigo;
			producto.value = response.producto;
			precio.value = response.precio;
			cantidad.value = response.cantidad;

			// Canviem el text del botó registrar
			registrar.value = "Actualizar";
			// mostrem el botó de crear un nou producte
			nuevoProducto.type = "button";
		});

	// Aquí esperarem a que es pitji el botó nuevo producto
	// guardem en una constant l'adreça en el DOM

	const nuevoProducto = document.getElementById("nuevoProducto");
	// cada cop que prenem una tecla al input nuevoProducto s'ejecutarà
	nuevoProducto.addEventListener("click", () => {
		// posem el id sense valor
		idp.value = "";
		// netejem el formulari
		frm.reset();
		// mostrem tots els registres que no contindrà ja el que hem eliminat
		listaProductos();
		// mostrem només el botó de registrar
		nuevoProducto.type = "hidden";
		// posem el texto de Registrar al boto que ara és actualitzar
		registrar.value = "Registrar";
	});
}
