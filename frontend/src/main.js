import { initUserList } from './views/usuario/UserList.js';
// import { initAlumnoList } from './views/alumno/AlumnoList.js';
// import { initMateriaList } from './views/materia/MateriaList.js';
// import { initReporteList } from './views/reporte/ReporteList.js';

const app = document.getElementById('app');

const views = {
  async inicio() {
    const res = await fetch(`./src/views/home.html?t=${Date.now()}`);
    app.innerHTML = await res.text();
  },
  async users() {
    const res = await fetch(`./src/views/usuario/userioList.html?t=${Date.now()}`);
    app.innerHTML = await res.text();
    await initUserList();
  }
  // async alumnos() {
  //   const res = await fetch('./src/views/alumno/alumno-list.html');
  //   app.innerHTML = await res.text();
  //   await initAlumnoList();
  // },
  // async materias() {
  //   const res = await fetch('./src/views/materia/materia-list.html');
  //   app.innerHTML = await res.text();
  //   await initMateriaList();
  // },
  // async reportes() {
  //   const res = await fetch('./src/views/reporte/reporte-list.html');
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
