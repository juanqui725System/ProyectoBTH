# backendSexto2026
### 1. inicializar La coneccion con el proyecto al git
```bash
   git init
```
### 2.	Agregar los archivos al area de preparación

```bash
   git add .
```
### 3.	Hacer primer commit
```bash
   git commit -m "Mi primer commit"
```
### 4.	Asegurar que la rama principal se llame main

```bash
   git branch -M main
```
### 5.	Conecta con GitHub
```bash
   git remote add origin https://github.com/juanqui725System/SystemSexto2025.git
```
### 6.	Subir el codigo a GitHub
```bash
   git branch -M main
   git push -u origin main
```


### 7. Si existe conflicto para que compartan origen comun 
    git pull origin main --allow-unrelated-histories

8. Forzar a la rama main
    git branch -f main HEAD
9. Subir los cambios a GitHub forzando la actualización 
    git push -u origin main --force
## adicionar Tailwind al proyecto
# 🚀 Guía de Configuración de Tailwind CSS v4 (Entorno Offline)

Este proyecto utiliza **Tailwind CSS v4** para el diseño de la interfaz. Sigue estos pasos para configurar tu entorno local. Una vez instalado, podrás trabajar **100% sin internet**.

## 📌 Requisitos Previos
1. Tener instalado [Node.js](https://nodejs.org).
2. Abrir la terminal de VS Code posicionándote dentro de la carpeta `frontend`:
   ```bash
   cd frontend
   ```

---

## 🛠️ Pasos para la Instalación Inicial (Solo requiere internet una vez)

Si estás iniciando tu proyecto desde cero en tu computadora local, ejecuta los siguientes comandos en tu terminal de PowerShell o CMD:

### 1. Inicializar el proyecto Node
```bash
npm init -y
```

### 2. Instalar Tailwind v4 y el Compilador Local
```bash
npm install tailwindcss @tailwindcss/cli
```

---

## ⚙️ Configuración de Archivos

### 3. Configurar el archivo de Estilos Base
Abre o crea el archivo en la ruta `src/styles/tailwind.css` y asegúrate de que tenga únicamente esta línea en la primera línea del archivo:
```css
@import "tailwindcss";
```

### 4. Automatizar el Comando de Compilación
Abre tu archivo `package.json` en la raíz de la carpeta `frontend`. Busca la sección `"scripts"` y modifícala para que quede exactamente así:
```json
"scripts": {
  "dev": "tailwindcss -i ./src/styles/tailwind.css -o ./src/styles/output.css --watch"
}
```

---

## 🔗 Vinculación en los Archivos HTML

Para que los estilos se apliquen correctamente en tus interfaces, debes enlazar el archivo generado (`output.css`) en la etiqueta `<head>` según la ubicación de tu archivo:

*   **Si tu archivo está en la Raíz (`index.html`):**
    ```html
    <link href="./src/styles/output.css" rel="stylesheet">
    ```
*   **Si tu archivo está dentro de Vistas (`src/views/archivo.html`):**
    ```html
    <link href="../styles/output.css" rel="stylesheet">
    ```

---

## 💻 ¿Cómo trabajar en clase? (Modo Offline)

Cada vez que entres al laboratorio o vayas a programar tus interfaces, abre tu terminal en la carpeta `frontend` y ejecuta:

```bash
npm run dev
```

⚠️ **¡IMPORTANTE!** No cierres esa terminal. El comando se quedará "escuchando" (`--watch`). Cada vez que modifiques tu HTML y guardes los cambios (`Ctrl + S`), los estilos visuales se actualizarán de forma automática y local.
