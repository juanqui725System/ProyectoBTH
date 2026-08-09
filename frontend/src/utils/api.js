const API_URL = 'https://proyectobth.onrender.com';

const buildUrl = (endpoint) => `${API_URL}/${endpoint.replace(/^\/+/, '')}`;

export const api = {
  // Función para obtener datos (Ej: listar alumnos)
  async get(endpoint) {
    try {
      const response = await fetch(buildUrl(endpoint));
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
      const response = await fetch(buildUrl(endpoint), {
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
