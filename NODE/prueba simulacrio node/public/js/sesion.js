document.getElementById("login").addEventListener("submit", (e) => {
	e.preventDefault();
	const usuario = e.target.usuario.value;
	const contrasena = e.target.contrasena.value;
	fetch("http://localhost:3000/login", {
		headers: {
			"Content-Type": "application/json",
		},
		method: "POST",
		body: JSON.stringify({
			usuario,
			contrasena,
		}),
	})
		.then((result) => result.json())
		.then((data) => {
			console.log(data);
			if (!data.login) {
				document.getElementById("error").textContent = data.message;
				return;
			}
			if (data.role === "admin")
				document.getElementById("acciones").style.display = "block";
			document.getElementById("error").textContent = "";
			document.getElementById("session").style.display = "none";
			document.getElementById("content").style.display = "block";
			document.querySelector("#content .role").textContent = data.role;
			cargarLibros(data.role);
		});
});

document.getElementById("logout").addEventListener("click", (e) => {
	e.preventDefault();
	fetch("http://localhost:3000/logout")
		.then((result) => result.json())
		.then((data) => {
			console.log(data);
			if (!data.logout) {
				document.getElementById("error").textContent = data.message;
				return;
			}
			document.getElementById("acciones").style.display = "none";
			document.getElementById("session").style.display = "block";
			document.getElementById("content").style.display = "none";
		});
});
