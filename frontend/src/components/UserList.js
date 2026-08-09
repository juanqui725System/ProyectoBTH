import { api } from '../utils/api.js';

const pencilIcon = `
  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5h6m-10 15 4-1 8-8a1 1 0 0 0 0-1.4l-1.6-1.6a1 1 0 0 0-1.4 0L6 17l-1 4z" />
  </svg>`;

export async function initUserList() {
  const tbody = document.getElementById('userTableBody');
  tbody.innerHTML = '<tr><td colspan="5" class="px-4 py-4 text-center text-gray-500">Cargando...</td></tr>';

  const btnNuevo = document.getElementById('btnNuevoUsuario');
  const modal = document.getElementById('modalUsuario');
  if (btnNuevo && modal) {
    btnNuevo.addEventListener('click', () => {
      modal.classList.remove('hidden');
      modal.classList.add('flex');
    });
  }

  document.getElementById('btnCerrarModal')?.addEventListener('click', cerrarModal);
  document.getElementById('btnCancelar')?.addEventListener('click', cerrarModal);
  modal?.addEventListener('click', (e) => {
    if (e.target === modal) cerrarModal();
  });

  document.getElementById('formUsuario')?.addEventListener('submit', async (e) => {
    e.preventDefault();
    const data = {
      username: document.getElementById('username').value,
      password: document.getElementById('password').value,
      cod_empleado: document.getElementById('codEmpleado').value,
      estado: document.getElementById('estado').value
    };
    console.log('Guardar usuario:', data);
    cerrarModal();
  });

  function cerrarModal() {
    modal?.classList.add('hidden');
    modal?.classList.remove('flex');
  }

  try {
    const users = await api.get('/users');
    tbody.innerHTML = users.map(user => `
      <tr class="border-b border-gray-200 transition hover:bg-gray-50">
        <td class="px-4 py-3">${user.id}</td>
        <td class="px-4 py-3 font-medium">${user.username}</td>
        <td class="px-4 py-3">${user.estado ? '<span class="inline-block rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">Activo</span>' : '<span class="inline-block rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">Inactivo</span>'}</td>
        <td class="px-4 py-3">${user.cod_empleado}</td>
        <td class="px-4 py-3 text-center">
          <button class="btn-editar inline-flex items-center justify-center rounded-lg bg-blue-100 p-2 text-blue-700 transition hover:bg-blue-600 hover:text-white" data-id="${user.id}" title="Editar">${pencilIcon}</button>
        </td>
      </tr>
    `).join('');

    document.querySelectorAll('.btn-editar').forEach(btn => {
      btn.addEventListener('click', () => {
        console.log('Editar usuario id:', btn.dataset.id);
      });
    });
  } catch (error) {
    tbody.innerHTML = `<tr><td colspan="5" class="px-4 py-4 text-center text-red-600">Error: ${error.message}</td></tr>`;
  }
}
