import { pool } from "../db/connection.js";
import { OPENWEATHER_API_KEY } from "../config/config.js";

class ClimaRepository {
  cargar(nombre) {
    const sql = `SELECT * FROM climas WHERE nombre = ?`;
    return pool
      .query(sql, [nombre])
      .then(([rows]) => (rows.length ? rows : null))
      .catch((err) => Promise.reject(err));
  }

  agregar(nombre, temperatura, descripcion) {
    const sql = `INSERT INTO climas (nombre, temperatura, descripcion) VALUES (?, ?, ?)`;
    return pool
      .query(sql, [nombre, temperatura, descripcion])
      .then(([result]) => result.affectedRows === 1)
      .catch((err) => Promise.reject(err));
  }

  obtenerClima(ciudad) {
    if (!ciudad) return Promise.reject(new Error("Ciudad obligatoria"));

    return this.cargar(ciudad)
      .then((cached) => {
        if (cached && cached.length > 0) {
          return {
            ciudad: cached[0].nombre,
            temperatura: cached[0].temperatura,
            descripcion: cached[0].descripcion,
          };
        }
        const url = `https://api.openweathermap.org/data/2.5/weather?q=${ciudad}&appid=${OPENWEATHER_API_KEY}&units=metric`;
        return fetch(url)
          .then((res) => {
            if (!res.ok)
              return Promise.reject(
                new Error(`Error API: ${res.status} ${res.statusText}`),
              );
            return res.json();
          })
          .then((data) => {
            return this.agregar(
              data.name,
              data.main.temp,
              data.weather[0].description,
            )
              .then(() => ({
                ciudad: data.name,
                temperatura: data.main.temp,
                descripcion: data.weather[0].description,
              }))
              .catch((err) => Promise.reject(err));
          })
          .catch((err) =>
            Promise.reject(new Error(`Error de conexión: ${err.message}`)),
          );
      })
      .catch((err) => Promise.reject(err));
  }
}

export default new ClimaRepository();
