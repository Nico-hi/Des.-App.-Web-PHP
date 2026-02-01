class User {
  #id;
  usuario;
  #contrasena;

  constructor(id, usuario, contrasena) {
    this.#id = id;
    this.usuario = usuario;
    this.#contrasena = contrasena;
  }

  getId() {
    return this.#id;
  }
  setId(id) {
    this.#id = id;
  }
  getContrasena() {
    return this.#contrasena;
  }
  setContrasena(contrasena) {
    this.#contrasena = contrasena;
  }

  toString(){
    return `el usuario es ${this.usuario}`
  }
}

export default User;