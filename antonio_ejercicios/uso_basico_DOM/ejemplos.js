/* 
    ACCEDER A ELEMENTOS Y MOSTRAR SU TEXTO 
 
   Cuando el usuario pulse el botón con id="btnAcceder", queremos leer el texto que está dentro
   del elemento <h1 id="mensaje"> y mostrarlo en <p id="resultadoAcceder">.

   - document.getElementById("ID"): selecciona un elemento usando su atributo id.
   - addEventListener("click", ...): detecta cuando el usuario hace clic en el botón.
   - innerText: sirve para obtener SOLO el texto visible dentro de un elemento.

*/

document.getElementById("btnAcceder").addEventListener("click", () => {

    // Seleccionamos el <h1> que contiene el texto “Bienvenido”.
    // Esto devuelve un OBJETO tipo HTMLElement que representa ese nodo del DOM.
    const titulo = document.getElementById("mensaje");

    // Seleccionamos el <p> donde mostraremos el texto.
    const salida = document.getElementById("resultadoAcceder");

    // innerText lee el contenido textual visible del elemento <h1>.
    // No incluye etiquetas HTML, solo texto plano.
    const textoTitulo = titulo.innerText;

    // Mostramos ese texto dentro del <p> para que el usuario lo vea en pantalla.
    salida.innerText = "El texto del H1 es: " + textoTitulo;
});



/* 
   CAMBIAR EL CONTENIDO DE UN ELEMENTO  
   

   Al hacer clic en "btnCambiarContenido", reemplazamos el contenido del <h1> por texto nuevo
   usando innerHTML.

   - innerHTML permite insertar HTML, no solo texto.

*/

document.getElementById("btnCambiarContenido").addEventListener("click", () => {

    // Seleccionamos el elemento cuyo contenido queremos modificar.
    const titulo = document.getElementById("mensaje");

    // innerHTML BORRA todo el contenido actual y lo sustituye por lo que pongas.
    // Aquí insertamos texto en negrita mediante etiquetas <b>.
    titulo.innerHTML = "<b>Texto cambiado desde JavaScript (flecha)</b>";
});



/* 
   MODIFICAR ESTILOS
   
   Al pulsar "btnModificarAtributos", queremos:
   - Cambiar el estilo del elemento (color azul)

   - element.style.PROPIEDAD: modifica estilos en línea (sobrescribe CSS externo).

*/

document.getElementById("btnModificarAtributos").addEventListener("click", () => {

    // Seleccionamos el elemento a modificar
    const titulo = document.getElementById("mensaje");

    /* 
       CAMBIO DE ESTILO DIRECTO:
       --------------------------
       title.style.color = "blue";
       Esto añade el atributo: <h1 style="color: blue;">
       Los estilos en línea tienen prioridad sobre los estilos del archivo CSS.
    */
    titulo.style.color = "blue";

});



/*  CREAR Y AÑADIR ELEMENTOS AL DOM 
   
   OBJETIVO:
   Cada vez que el usuario pulse "btnAgregarElemento", se creará un nuevo <li> y se añadirá al
   final de la <ul id="lista">.

   IDEAS CLAVE:
   - createElement(“tag”): crea un nodo HTML en memoria (aún NO está en la página).
   - textContent: establece el texto interno SIN permitir HTML.
   - appendChild(): inserta un nodo como hijo de otro.

*/

document.getElementById("btnAgregarElemento").addEventListener("click", () => {

    // Obtenemos la <ul> donde se añadirán nuevos elementos
    const lista = document.getElementById("lista");

    // Creamos un NUEVO elemento <li> de cero.
    const nuevo = document.createElement("li");

    /*
       textContent vs innerHTML:
       ---------------------------
       - textContent: inserta texto plano (más seguro si metieramos información externa)
       - innerHTML: interpreta HTML
    */
    nuevo.textContent = "Nuevo elemento añadido";

    /*
       PARA ENTENDER appendChild():
       -----------------------------
       lista.appendChild(nuevo) inserta el <li> dentro de la lista, al final.
       El DOM queda modificado físicamente en el documento.
    */
    lista.appendChild(nuevo);
});



/* 
    ESCUCHAR EVENTOS ESPECIALES: DOBLE CLIC (dblclick)
   
   Detectar un doble clic en el botón "btnEventoUsuario", y mostrar un mensaje en pantalla.

   - "dblclick" es un tipo de evento que detecta doble clic del usuario.
   - Podemos usar cualquier evento: mouseover, keyup, input, scroll, etc.

*/

document.getElementById("btnEventoUsuario").addEventListener("dblclick", () => {

    // Seleccionamos el párrafo donde mostraremos el resultado
    const p = document.getElementById("resultadoEvento");

    /*
       Al detectar que el usuario ha hecho doble clic, modificamos el texto
       del <p>. Este mensaje aparecerá directamente en la página.
    */
    p.innerText = "Has hecho doble clic correctamente 😄";
});
