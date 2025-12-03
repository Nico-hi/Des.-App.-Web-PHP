window.addEventListener("DOMContentLoaded", () => {
  // esperamos a que todo el DOM este cargado
  document
    .querySelectorAll("#preguntas section p:not(p:first-of-type)")
    .forEach((e) => {
      //del documento sacamos las los elemenos que sean p
      // pero no del primer de su tipo y de paso que sea hijo de #preguntas section
      e.addEventListener("click", (e) => {
        // por cada click que hagamos en un elemento p de la anterior seleccion
        //console.log(e.target.parentElement);

        e.target.parentElement
          .querySelectorAll("p.active")
          .forEach((element) => {
            //sacamos el padra del elemento anterior, el que hicimos click, luego sus hijos que tengan el la clase active
            //y si hay se les borrara la clase            console.log(element);
            element.classList.remove("active");
          });
        // console.log(e.target);
        e.target.classList.add("active");
      });
    });

  // esto nos hara la redireccion para la parte del index, la pagina inicial
  const respuestas_correctas = [
    "Respuesta correcta: B",
    "Respuesta correcta: D",
    "Respuesta correcta: B",
    "Respuesta correcta: B",
    "Respuesta correcta: B",
    "Respuesta correcta: B",
    "Respuesta correcta: B",
    "Respuesta correcta: C",
    "Respuesta correcta: B",
    "Respuesta correcta: C",
    "Respuesta correcta: B",
    "Respuesta correcta: B",
    "Respuesta correcta: B",
    "Respuesta correcta: B",
    "Respuesta correcta: B",
    "Respuesta correcta: B",
  ];
  document.querySelectorAll("button").forEach((e) => {
    e.addEventListener("click", (e) => {
      //   console.log(e.target);
      //   console.log(e.target.textContent);

      if (e.target.textContent == "regresar") {
        window.location = "index.html";
      }
      if (e.target.textContent == "mostrar respuestas") {
        let i = 0;
        document
          .querySelectorAll("#preguntas section p:last-child")
          .forEach((e) => {
            e.textContent = respuestas_correctas[i];
            //console.log(e.childElementCount);
            i++;
          });
      }
    });
  });
});
