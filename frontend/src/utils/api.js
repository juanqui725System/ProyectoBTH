const API_URL = 'http://api.sexto2026';

export const api = {
  // Función para obtener datos (Ej: listar alumnos)
  async get(endpoint) {
    try {
      const response = await fetch(`${API_URL}${endpoint}`);
      if (!response.ok) throw new Error('Error en la red');
      return await response.json();
    } catch (error) {
      console.error("Error en GET:", error);
      throw error;
    }
  },
  // Función para enviar datos (Ej: registrar un alumno)
  async post(endpoint, data) {
    try {
      const response = await fetch(`${API_URL}${endpoint}`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
      });
      if (!response.ok) throw new Error('Error al guardar');
      return await response.json();
    } catch (error) {
      console.error("Error en POST:", error);
      throw error;
    }
  }
};
