document.querySelector("#loginForm").addEventListener("submit", (e) => {
  e.preventDefault();

  let fd = new FormData(e.currentTarget);
  fetch("./login.php", {
    method: "POST",
    body: fd,
  })
    .then((response) => response.json())
    .then((data) => {
        console.log(data);
        
      if (data.login) {
        document.getElementById("index").style.display=none;
        document.getElementById("user-sesion").style.display=block;
      }
    });
});

document.querySelector("#registerForm").addEventListener("submit", (e) => {
  e.preventDefault();
  let fd = new FormData(e.currentTarget);
  fetch("./register.php", {
    method: "POST",
    body: fd,
  })
    .then((response) => response.json())
    .then((data) => {
        console.log(data);
    document.getElementById("salidaR").innerText = data.message;
    });
});
