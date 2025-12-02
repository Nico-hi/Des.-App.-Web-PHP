// Esperamos a que todo el HTML del DOM se haya cargado
// para que podamos seleccionar los elementos sin errores.
document.addEventListener("DOMContentLoaded", (e) => {

    // Selección de elementos importantes del DOM ---

    // Formulario principal
    const formulario = document.getElementById("formulario");

    // Inputs dentro del formulario
    const inputNombre = document.getElementById("nombre");
    const inputEmail = document.getElementById("email");

    // Div para mostrar mensaje de error del email
    const mensajeEmail = document.getElementById("mensajeEmail");

    // Select de país
    const selectPais = document.getElementById("pais");

    // Lista de usuarios (es el <ul>)
    const listaUsuarios = document.getElementById("usuarios");

    // Botón de saludo
    const botonSaludo = document.getElementById("botonSaludo");

    // ------------------------------------------------------
    // Ejemplo e.type: mismo botón con distintos eventos
    // ------------------------------------------------------

    botonSaludo.addEventListener("mouseenter", (e) => manejarBoton(e));
    botonSaludo.addEventListener("click", (e) => manejarBoton(e));

    function manejarBoton(e) {
        // e.type nos dice qué tipo de evento disparó la función
        if (e.type === "mouseenter") {
            // Cambiamos el texto cuando el ratón entra en el botón
            botonSaludo.textContent = "¡Pasa el cursor sobre mí!";
        }
        if (e.type === "click") {
            // Cambiamos el texto cuando el usuario hace clic
            botonSaludo.textContent = "¡Hola!";
        }
    }

    // ------------------------------------------------------
    // Ejemplo e.target: lista de usuarios
    // ------------------------------------------------------
    // Detectamos en qué <li> exacto hizo clic el usuario
    listaUsuarios.addEventListener("click", (e) => {
        // Primero quitamos la clase 'seleccionado' de todos los <li>
        listaUsuarios.querySelectorAll("li").forEach(li => li.classList.remove("seleccionado"));

        // e.target es el elemento exacto que disparó el evento
        // el if asegura que el código de dentro suyo solo se ejecute si 
        // el usuario hizo clic en un <li>, 
        // y no en otra parte de la lista o en un espacio vacío
        if (e.target.tagName == "li") {
            // Añadimos clase al <li> clicado
            e.target.classList.add("seleccionado");
        }
    });

    // ------------------------------------------------------
    // Ejemplo e.target: validar email mientras escribe
    // ------------------------------------------------------
    inputEmail.addEventListener("input", (e) => {
        // e.target es el input que se está modificando
        const valor = e.target.value;

        // Validamos que contenga '@' y no esté vacío
        if (!valor.includes("@") || valor.trim() === "") {
            e.target.classList.add("error"); // resaltar input en rojo
            mensajeEmail.textContent = "Email inválido"; // mensaje de error
        } else {
            e.target.classList.remove("error"); // quitamos el error si es válido
            mensajeEmail.textContent = "";
        }
    });

    // ------------------------------------------------------
    // Ejemplo focus (clicar dentro) / blur (clicar fuera) para nombre
    // ------------------------------------------------------
    // e.target es el input que recibe o pierde el foco
    inputNombre.addEventListener("focus", (e) => {
        // Cambio visual cuando el usuario entra en el campo
        e.target.style.backgroundColor = "#ffffe0"; // amarillo claro
    });
    inputNombre.addEventListener("blur", (e) => {
        // Restauramos estilo cuando el usuario sale del campo
        e.target.style.backgroundColor = "";
    });

    // ------------------------------------------------------
    // 5. change (confirmar un cambio de valor) para select de país
    // ------------------------------------------------------
    selectPais.addEventListener("change", (e) => {
        // e.target.value nos dice la opción seleccionada
        alert("Has seleccionado: " + e.target.value);
    });

    // ------------------------------------------------------
    // 6. submit: evitar envío si hay errores
    // ------------------------------------------------------
    formulario.addEventListener("submit", (e) => {
        // Comprobamos que todos los campos estén completos y válidos
        if (
            inputNombre.value.trim() === "" ||
            inputEmail.value.trim() === "" ||
            !inputEmail.value.includes("@") ||
            selectPais.value === ""
        ) {
            // e.preventDefault() evita que el formulario se envíe al servidor
            e.preventDefault();

            // Mostramos alerta de error
            alert("Por favor completa correctamente todos los campos antes de enviar.");
        } else {
            // Si todo está bien, podemos dejar que se envíe
            alert("Formulario listo para enviar al servidor, y recargamos!");
        }
    });
});
