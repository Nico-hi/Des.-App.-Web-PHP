class Incidencias {
  #id;
  titulo;
  descripcion;
  estado;
  #usuario_id;

  constructor(id, titulo, descripcion, estado, usuario_id) {
    this.#id = id;
    this.titulo = titulo;
    this.descripcion = descripcion;
    this.estado = estado;
    this.#usuario_id = usuario_id;
  }

  getId() {
    return this.#id;
  }
  setId(id) {
    this.#id = id;
  }
  getUsuarioId() {
    return this.#usuario_id;
  }
  setUsuarioId(usuario_id) {
    this.#usuario_id = usuario_id;
  }

  toJson() {
    return {
      titulo: this.titulo,
      descripcion: this.descripcion,
      estado: this.estado,
      usuario: this.getUsuarioId(),
    };
  }
}

export default Incidencias;
