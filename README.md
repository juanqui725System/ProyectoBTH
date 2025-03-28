git init
Paso para subir un proyecto existente en mi PC
1.	Inicializar git
PS C:\wamp64\www\ProyectoSexto2025> git init
Initialized empty Git repository in C:/wamp64/www/ProyectoSexto2025/.git/
2.	Agregar los archivos al area de preparación
PS C:\wamp64\www\ProyectoSexto2025> git add .
warning: in the working copy of 'BaseD/dbsexto2025.php', LF will be replaced by CRLF the next time Git touches it
3.	Hacer primer commit
PS C:\wamp64\www\ProyectoSexto2025> git commit -m "Mi primer commit"
[master (root-commit) b9b5323] miprimer commit
 5 files changed, 175 insertions(+)
 create mode 100644 BaseD/dbsexto2025.php
 create mode 100644 alumno.php
 create mode 100644 conexion.php
 create mode 100644 index.php
 create mode 100644 reporteusuario.php
4.	Asegurar que la rama principal se llame main
C:\wamp64\www\ProyectoSexto2025> git branch -M main
5.	Conecta con GitHub
PS C:\wamp64\www\ProyectoSexto2025> git remote add origin https://github.com/juanqui725System/SystemSexto2025.git
6.	Subir el codigo a GitHub
PS C:\wamp64\www\ProyectoSexto2025> git branch -M main
PS C:\wamp64\www\ProyectoSexto2025> git push -u origin main
branch 'main' set up to track 'origin/main'.
Everything up-to-date
