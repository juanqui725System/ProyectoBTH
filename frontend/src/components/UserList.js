import { api } from '../utils/api.js';

export async function initUserList() {
  const tbody = document.getElementById('userTableBody');
  tbody.innerHTML = '<tr><td colspan="4">Cargando...</td></tr>';

  try {
    const users = await api.get('/users');
    tbody.innerHTML = users.map(user => `
      <tr>
        <td>${user.id}</td>
        <td>${user.username}</td>
        <td>${user.estado ? 'Activo' : 'Inactivo'}</td>
        <td>${user.cod_empleado}</td>
      </tr>
    `).join('');
  } catch (error) {
    tbody.innerHTML = `<tr><td colspan="4" style="color:red;">Error: ${error.message}</td></tr>`;
  }
}
