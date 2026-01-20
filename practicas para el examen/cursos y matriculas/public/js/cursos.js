const matricularse = (id) => {
  console.log(id);
  let fd = new FormData();
  fd.append("cursoId", id);
  fetch("./../src/controller/matricularse.php", {
    method: "POST",
    body: fd,
  })
    .then((result) => result.json())
    .then((data) => {
      alert(data.message);
    });
};
const desmatricularse = (id) => {
  //console.log(id);

  let fd = new FormData();
  fd.append("cursoId", id);
  fetch("./../src/controller/desmatricularse.php", {
    method: "POST",
    body: fd,
  })
    .then((result) => result.json())
    .then((data) => {
      alert(data.message);
    });
};

const cargarMatricula = () => {
  fetch("./../src/controller/cargar-matricula.php")
    .then((result) => result.json())
    .then((cursos) => {
      // console.log(cursos);
      if (cursos.message) {
        document.getElementById("lista_mat").innerHTML = cursos.message;
        return;
      }

      let salida = "<ul>";

      if (cursos) {
        salida += `<li>Curso: ${cursos.curso} </br> 
        descripcion: ${cursos.descripcion}</br>
         <button class='desmatricularse' data-id=${cursos.id}>desmatricularse</button class='matricularse'> </li>
         </br>`;
      } else {
        for (let curso of cursos) {
          salida += `<li>Curso: ${curso.curso} </br> 
          descripcion: ${curso.descripcion}</br>
          <button class='desmatricularse' data-id=${curso.id}>desmatricularse</button class='matricularse'> </li>
          </br>`;
        }
      }
      salida += "</ul>";
      document.getElementById("lista_mat").innerHTML = salida;
      // aca agregamos el evento, para que cada elemento pueda matricularse
      document.querySelectorAll(".desmatricularse").forEach((e) => {
        e.addEventListener("click", () => {
          // console.log(e.dataset.id);

          desmatricularse(e.dataset.id);
          cargarMatricula();
        });
      });
    });
};

const cargarCursos = () => {
  fetch("./../src/controller/cargar-cursos.php")
    .then((result) => result.json())
    .then((cursos) => {
      let salida = "<ul>";

      for (let curso of cursos) {
        salida += `<li>Curso: ${curso.curso} </br> 
        descripcion: ${curso.descripcion}</br>
         <button class='matricularse' data-id=${curso.id}>matricularse</button class='matricularse'> </li>
         </br>`;
      }
      salida += "</ul>";
      document.getElementById("listado").innerHTML = salida;
      // aca agregamos el evento, para que cada elemento pueda matricularse
      document.querySelectorAll(".matricularse").forEach((e) => {
        e.addEventListener("click", () => {
          matricularse(e.dataset.id);
        });
      });
    });
};
