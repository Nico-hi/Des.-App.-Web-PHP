const axios = require("axios");
const ClimaBBDD = require("./climaBBDD.js");

class ClimaDAO {
	static async obtenerClima(ciudad) {
		const apiKey = process.env.OPENWEATHER_API_KEY;
		const url = `https://api.openweathermap.org/data/2.5/weather?q=${ciudad}&APPID=${apiKey}`;
		//api.openweathermap.org/data/2.5/weather?q=London,uk&APPID=3d3609d1a3deb1a1187a6dd5ee91664d
		try {
			console.log(ciudad);
			let ciudad_temp = await ClimaBBDD.cargar(ciudad);
			if (!!ciudad_temp) {
				console.log(ciudad_temp);
				return {
					ciudad: ciudad_temp[0].nombre,
					temperatura: ciudad_temp[0].tempertaruta,
					descripcion: ciudad_temp[0].descripcion,
				};
			}
			const response = await axios.get(url);
			const data = response.data;
			let result = await ClimaBBDD.agregar(
				data.name,
				data.main.temp,
				data.weather[0].description,
			);
			if (result) {
				throw new Error("Error al guardar en la base de datos");
			}
			return {
				ciudad: data.name,
				temperatura: data.main.temp,
				descripcion: data.weather[0].description,
			};
		} catch (error) {
			if (error.response) {
				throw new Error(
					`Error API: ${error.response.status} ${error.response.statusText}`,
				);
			} else {
				throw new Error(`Error de conexión: ${error.message}`);
			}
		}
	}
}

module.exports = ClimaDAO;
