class User {
  #id;
  usuario;
  #contrasena;
  #role;

  constructor(id, usuario, contrasena, role) {
    this.#id = id;
    this.usuario = usuario;
    this.#contrasena = contrasena;
    this.#role = role;
  }

  getId() {
    return this.#id;
  }
  setId(id) {
    this.#id = id;
  }
  getConstrasena() {
    return this.#contrasena;
  }
  setConstrasena(contrasena) {
    this.#contrasena = contrasena;
  }
  getRole() {
    return this.#role;
  }
  setRole(role) {
    this.#role = role;
  }
}

export default User;
