import { api } from '../../utils/api.js';
import { openModal } from '../../utils/Modal.js';

const pencilIcon = '<iconify-icon icon="mdi:pencil" width="18"></iconify-icon>';

export async function initUserList() {
  const tbody = document.getElementById('userTableBody');
  tbody.innerHTML = '<tr><td colspan="5" class="px-4 py-4 text-center text-gray-500">Cargando...</td></tr>';

  //Funcion global para abrir el formulario (nuevo o editar)
  //Sin id = nuevo, con id = editar
  window.abrirFormUsuario = async (id = null) => {
    const res = await fetch(`./src/views/usuario/usuarioForm.html?t=${Date.now()}`);
    const body = await res.text();

    const usuario = id !== null
      ? window.listaUsuarios.find(u => String(u.id) === String(id))
      : null;

    openModal({
      title: usuario ? `Editar Usuario ${usuario.username}` : 'Nuevo Usuario',
      body,
      onConfirm: (data) => {
        if (usuario) {
          console.log('Actualizar usuario', usuario.id, ':', data);
        } else {
          console.log('Guardar usuario:', data);
        }
      }
    });

    if (usuario) {
      document.getElementById('username').value = usuario.username;
      document.getElementById('codEmpleado').value = usuario.cod_empleado;
      document.getElementById('estado').value = usuario.estado;
      document.getElementById('password').value = '';
    }
  };

  try {
    //llamamos al Api del servidor
    const users = await api.get('/users');
    //Guardamos la lista en una variable global para usarla al editar
    window.listaUsuarios = users;

    tbody.innerHTML = users.map(user => `
      <tr class="border-b border-gray-200 transition hover:bg-gray-50">
        <td class="px-4 py-3">${user.id}</td>
        <td class="px-4 py-3 font-medium">${user.username}</td>
        <td class="px-4 py-3">${user.estado ? '<span class="inline-block rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">Activo</span>' : '<span class="inline-block rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">Inactivo</span>'}</td>
        <td class="px-4 py-3">${user.cod_empleado}</td>
        <td class="px-4 py-3 text-center">
          <button class="inline-flex items-center justify-center rounded-lg bg-blue-100 p-2 text-blue-700 transition hover:bg-blue-600 hover:text-white" onclick="abrirFormUsuario(${user.id})" title="Editar">${pencilIcon}</button>
        </td>
      </tr>
    `).join('');
  } catch (error) {
    tbody.innerHTML = `<tr><td colspan="5" class="px-4 py-4 text-center text-red-600">Error: ${error.message}</td></tr>`;
  }
}
