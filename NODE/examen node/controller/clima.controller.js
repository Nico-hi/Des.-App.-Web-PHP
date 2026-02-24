import ClimaRepo from "../repository/clima.repository.js";

export const obtenerClima = async (req, res) => {
  try {
    const ciudad = "Madrid";
    const clima = await ClimaRepo.obtenerClima(ciudad);
    res.json({ success: true, clima });
  } catch (error) {
    res.status(500).json({ success: false, message: error.message });
  }
};
