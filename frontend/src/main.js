import { initUserList } from './components/UserList.js';
// import { initAlumnoList } from './components/AlumnoList.js';
// import { initMateriaList } from './components/MateriaList.js';
// import { initReporteList } from './components/ReporteList.js';

const app = document.getElementById('app');

const views = {
  async inicio() {
    const res = await fetch('./src/views/inicio.html');
    app.innerHTML = await res.text();
  },
  async users() {
    const res = await fetch('./src/views/user-list.html');
    app.innerHTML = await res.text();
    await initUserList();
  }
  // async alumnos() {
  //   const res = await fetch('./src/views/alumnos.html');
  //   app.innerHTML = await res.text();
  //   await initAlumnoList();
  // },
  // async materias() {
  //   const res = await fetch('./src/views/materias.html');
  //   app.innerHTML = await res.text();
  //   await initMateriaList();
  // },
  // async reportes() {
  //   const res = await fetch('./src/views/reportes.html');
  //   app.innerHTML = await res.text();
  //   await initReporteList();
  // }
};

// Conectar menú con vistas
document.querySelectorAll("[data-view]").forEach(link => {
  link.addEventListener("click", async (e) => {
    e.preventDefault();
    const view = link.dataset.view;
    if (views[view]) await views[view]();
  });
});

// Vista inicial
views.inicio();
