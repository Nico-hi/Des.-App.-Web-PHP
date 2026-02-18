const fs = require("fs");
const path = require("path");

const RUTA = path.join(__dirname, "..", "uploads");

exports.listar = () => {
	return new Promise((resolve, reject) => {
		fs.readdir(RUTA, (err, archivos) => {
			if (err) reject(err);
			else resolve(archivos);
		});
	});
};

exports.existe = (nombre) => {
	return fs.existsSync(path.join(RUTA, nombre));
};

exports.rutaCompleta = (nombre) => {
	return path.join(RUTA, nombre);
};
