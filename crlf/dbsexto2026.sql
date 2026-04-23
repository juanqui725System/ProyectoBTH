-- eliminar si existe la base de datos
DROP DATABASE IF EXISTS DBSEXTO2026;
-- crear la base de datos 
CREATE DATABASE DBSEXTO2026;
-- activar la base de datos a usar
USE DBSEXTO2026; 
-- Eliminar la tabla si existe
DROP TABLE IF EXISTS roles;
-- 1. Tabla de Roles (Administrador, Usuario, etc.)
CREATE TABLE IF NOT EXISTS roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE,
    descripcion VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;


-- Eliminar la tabla usuario si existe
DROP	TABLE IF EXISTS usuarios;
-- Crar la tabla usuario
-- 2. Tabla de Usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rol_id INT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, -- Para usar password_hash() de PHP
    token_recuperacion VARCHAR(255) NULL,
    activo TINYINT(1) DEFAULT 1, -- 1 = Activo, 0 = Suspendido
    ultimo_login DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_usuario_rol FOREIGN KEY (rol_id) REFERENCES roles(id) ON DELETE RESTRICT
) ENGINE=InnoDB;

-- 3. Inserción de roles básicos
INSERT INTO roles (nombre, descripcion) VALUES 
('Admin', 'Acceso total al sistema'),
('Editor', 'Puede modificar contenido'),
('Usuario', 'Acceso limitado');

-- realizar la consulta de la tabla permiso
SELECT * FROM roles;
-- adicionar datos a la tabla usuario
INSERT INTO USUARIO(NOMBRE,EMAIL,PASSWORD,TELEFONO,IDPERMISO)
VALUES('Marcos','marcos@gmail.com','123456','7215555',2);

SELECT * FROM USUARIO;
SELECT * FROM roles;
 