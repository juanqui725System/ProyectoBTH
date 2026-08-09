import { api } from '../utils/api.js';

export async function initUserList() {
  const tbody = document.getElementById('userTableBody');
  tbody.innerHTML = '<tr><td colspan="4" class="px-4 py-4 text-center text-gray-500">Cargando...</td></tr>';

  try {
    const users = await api.get('/users');
    tbody.innerHTML = users.map(user => `
      <tr class="border-b border-gray-200 transition hover:bg-gray-50">
        <td class="px-4 py-3">${user.id}</td>
        <td class="px-4 py-3 font-medium">${user.username}</td>
        <td class="px-4 py-3">${user.estado ? '<span class="inline-block rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">Activo</span>' : '<span class="inline-block rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">Inactivo</span>'}</td>
        <td class="px-4 py-3">${user.cod_empleado}</td>
      </tr>
    `).join('');
  } catch (error) {
    tbody.innerHTML = `<tr><td colspan="4" class="px-4 py-4 text-center text-red-600">Error: ${error.message}</td></tr>`;
  }
}
