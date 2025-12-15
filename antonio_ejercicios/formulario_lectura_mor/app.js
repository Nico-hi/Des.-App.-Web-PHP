// Seleccionamos el formulario con id "filtro" y añadimos un listener para el evento "submit"
// Ojo ponemos el parámetro e o como le queramos llamar para poder acceder a información del evento
document.getElementById("filtro").addEventListener("submit", e => {

    /* 

    getElementById("filtro") busca en el DOM un elemento con id="filtro".
    addEventListener("submit", ...) dice: "Cuando el formulario se intente enviar, ejecuta esta función".
    
    Permite interceptar el envío antes de que el navegador haga la acción por defecto (recargar página),
    lo cual nos da control total para manejar los datos con JavaScript.


    Esto nos introduce al concepto de eventos en JS y manipulación del DOM.
    */

    // Evitamos el comportamiento por defecto del formulario
    e.preventDefault();

    /*
    e.preventDefault() cancela la acción predeterminada del evento "submit",
    que normalmente enviaría el formulario y recargaría la página.

    Sin esto, cada vez que el usuario envía el formulario,
    se perdería toda la información mostrada dinámicamente.
    
    Esto es esencial para aplicaciones web interactivas tipo "single-page applications" (SPA),
    donde queremos que la página se mantenga y solo actualicemos partes de ella.
    */

    // Enviamos los datos del formulario al servidor usando fetch()
    fetch("public/buscador.php", {  // URL del script PHP que procesará los datos
        method: "POST",       // Usamos POST para enviar datos de manera segura
        body: new FormData(e.target) // Creamos un objeto FormData con todos los campos del formulario
    })



    /*

    fetch() es la API moderna de JavaScript para hacer peticiones HTTP asíncronas.
    Devuelve una promesa (Promise) que se resolverá cuando el servidor responda.
    Una promesa representa un valor que todavía no está disponible, porque la petición HTTP está en curso y tardará un tiempo en completarse.


    FormData:
    Es un objeto especial que toma un <form> y empaqueta todos sus campos
    para enviarlos como si fuera un envío de formulario tradicional (multipart/form-data).
    
    Ventajas:
    - FormData toma todos los campos automáticamente, manteniendo nombres, valores y estructura interna sin que tengamos que hacer nada.
    - Compatible con cualquier formulario.
    - Funcionaría para ficheros
    */

    // Convertimos la respuesta del servidor a un objeto JS usando JSON
    .then(r => r.json())

    /*
    - `r` es el objeto Response que devuelve fetch().
    - r.json() lee el cuerpo de la respuesta y lo interpreta como JSON.
    - Devuelve otra promesa que se resuelve con el objeto JS resultante.

    PHP devuelve datos en formato JSON, y JavaScript los transforma a objetos/arrays
    que podemos usar directamente en el DOM.
    Esto permite separar **lógica de servidor** (PHP) de **presentación en cliente** (JS).
    */

    // Procesamos la lista de objetos recibida (equivale a r => r.json(),
    //se podría haber llamado de cualquier manera )
    .then(lista => {        
        let html = ""; // Variable que almacenará el HTML que vamos a insertar dinámicamente

        // Recorremos cada elemento del array 'lista'. Se llama p como se podría haber llamado como sea
        lista.forEach(p => 
            // Creamos un <li> para cada producto con nombre y precio
            html = html + "<li>" + p.nombre + " - " + p.precio + " Euros</li>"
        );

        /*
        - Recorre cada elemento del array (cada producto devuelto por PHP).
        - Construye una cadena de HTML con <li> para cada elemento.

        - Muestra cómo generar contenido dinámico basado en datos del servidor.

        - Ventaja:
        - Antes, habría que recargar toda la página para mostrar nuevos datos.
        - Ahora la página permanece, y solo se actualiza la sección de resultados.
        */

        // Insertamos el HTML generado en el DOM
        document.getElementById("resultados").innerHTML = html;

        /*
        - Busca el elemento con id "resultados" en el DOM.
        - Sustituye su contenido con la nueva lista de <li>.

        Ventaja:
        - Permite actualizar solo una parte de la página.
        - Evita recargar toda la página, lo que mejora la UX.
        */

        /* Ventajas totales:
            Solo cambia <ul id="resultados">
            Todo lo demás se mantiene
            No pierdes el scroll
            No se borra el filtro
            Instantáneo
            Flujo tipo app moderna */

    });

});
