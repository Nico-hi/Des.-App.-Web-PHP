import IncidenciasRepo from "../repository/incidencias.repository.js";

export const getIncidencias = async (req, res) => {
  try {
    let { id } = req.session.usuario || {};
    let rows = await IncidenciasRepo.getIncidencias(id);
    
    return res.status(200).json({ rows, id });
  } catch (error) {
    console.error('Error getIncidencias:', error);
    return res.status(500).json({ message: "hubo un error" });
  }
};

export const getIncidencia = async (req, res) => {
  try {
    let { id } = req.params;
    let rows = await IncidenciasRepo.getIncidencia(id);
    
    if (rows) {
      return res.status(200).json({ rows });
    }
    return res.status(404).json({ message: "Incidencia no encontrada" });
  } catch (error) {
    console.error('Error getIncidencia:', error);
    return res.status(500).json({ message: "hubo un error" });
  }
};

export const crearIncidencia = async (req, res) => {
  try {
    let { id } = req.session.usuario || {};
    let { titulo, descripcion, estado } = req.body;
    
    let result = await IncidenciasRepo.crearIncidencia(titulo, descripcion, estado, id);
    
    if (result) {
      return res.status(201).json({ result: true, message: "la incidencia se creo correctamente" });
    }
    return res.status(500).json({ result: false, message: "hubo un error" });
  } catch (error) {
    console.error('Error crearIncidencia:', error);
    return res.status(500).json({ result: false, message: "hubo un error" });
  }
};

export const borrarIncidencia = async (req, res) => {
  try {
    let { incidencia_id } = req.body;
    console.log("borrar", incidencia_id);
    
    let result = await IncidenciasRepo.eliminarIncidencia(incidencia_id);
    // console.log(result);
    
    if (result) {
      return res.status(200).json({ result: true, message: "la incidencia se eliminó" });
    }
    return res.status(404).json({ message: "Incidencia no encontrada" });
  } catch (error) {
    console.error('Error borrarIncidencia:', error);
    return res.status(500).json({ message: "hubo un error" });
  }
};

export const actualizarIncidencia = async (req, res) => {
  try {
    let { incidencia_id, estado } = req.body;
    // console.log(incidencia_id,estado);
    
    
    let result = await IncidenciasRepo.actualizarIncidencia(estado,incidencia_id);
    // console.log(result);
    
    if (result) {
      return res.status(200).json({
        result: true,
        message: "la incidencia se modificó correctamente",
      });
    }
    return res.status(404).json({ message: "No se pudo actualizar" });
  } catch (error) {
    console.error('Error actualizarIncidencia:', error);
    return res.status(500).json({ message: "hubo un error" });
  }
};
