USE dbventa;
-- CLIENTES
INSERT INTO CLIENTES(ci,nombre,apellidos,direccion,telefono) VALUES
('123456','Ana','Pérez','Av. Libertad 123','70010001'),
('234567','Luis','Gómez','Calle Central 45','70010002'),
('345678','María','Rodríguez','Av. Busch 789','70010003'),
('456789','Carlos','Fernández','Calle Sucre 12','70010004'),
('567890','Laura','Martínez','Av. Beni 56','70010005'),
('678901','José','López','Calle Aroma 34','70010006'),
('789012','Marta','Torres','Av. Piraí 90','70010007'),
('890123','Pedro','Vargas','Calle Bolívar 67','70010008'),
('901234','Sofía','Rojas','Av. San Martín 11','70010009'),
('012345','Diego','Castro','Calle Warnes 22','70010010');

-- EMPLEADOS
INSERT INTO EMPLEADOS(ci,nombre,apellidos) VALUES
('111111','Juan','Ramírez'),
('222222','Andrea','Suárez'),
('333333','Miguel','Ortiz'),
('444444','Paola','Gutiérrez'),
('555555','Fernando','Aguilar'),
('666666','Carmen','Flores'),
('777777','Ricardo','Mendoza'),
('888888','Valeria','Salazar'),
('999999','Hugo','Delgado'),
('101010','Patricia','Morales');

-- USUARIOS (vinculados a empleados)
INSERT INTO USUARIOS(username,password,estado,cod_empleado) VALUES
('jramirez','hash1',true,1),
('asuarez','hash2',true,2),
('mortiz','hash3',true,3),
('pgutierrez','hash4',true,4),
('faguilar','hash5',true,5),
('cflores','hash6',true,6),
('rmendoza','hash7',true,7),
('vsalazar','hash8',true,8),
('hdelgado','hash9',true,9),
('pmorales','hash10',true,10);

-- PRODUCTOS
INSERT INTO PRODUCTOS(codBarras,descripcion,stock,precio_unitario,creado_por) VALUES
('0001','Laptop Lenovo',10,4500.00,1),
('0002','Mouse Logitech',50,120.00,2),
('0003','Teclado Mecánico',30,300.00,3),
('0004','Monitor Samsung',20,1500.00,4),
('0005','Impresora HP',15,2000.00,5),
('0006','Celular Xiaomi',25,2200.00,6),
('0007','Tablet Huawei',12,1800.00,7),
('0008','Auriculares Sony',40,350.00,8),
('0009','Disco Duro 1TB',35,600.00,9),
('0010','Memoria USB 32GB',100,80.00,10);

-- PEDIDOS
INSERT INTO PEDIDOS(cod_cliente,fecha_compra,cantidad,cod_empleado,creado_por) VALUES
(1,NOW(),2,1,1),
(2,NOW(),1,2,2),
(3,NOW(),3,3,3),
(4,NOW(),1,4,4),
(5,NOW(),2,5,5),
(6,NOW(),1,6,6),
(7,NOW(),4,7,7),
(8,NOW(),2,8,8),
(9,NOW(),1,9,9),
(10,NOW(),5,10,10);

-- PEDIDO_PRODUCTOS
INSERT INTO PEDIDO_PRODUCTOS(cod_producto,cod_pedido,cantidad,precio_unitario,descuento) VALUES
(1,1,1,4500.00,0),
(2,1,1,120.00,0),
(3,2,1,300.00,0),
(4,3,1,1500.00,100.00),
(5,4,1,2000.00,0),
(6,5,2,2200.00,200.00),
(7,6,1,1800.00,0),
(8,7,2,350.00,50.00),
(9,8,1,600.00,0),
(10,9,5,80.00,20.00);

-- EMPLEADO_PEDIDOS
INSERT INTO EMPLEADO_PEDIDOS(cod_pedido,cod_empleado,fecha) VALUES
(1,1,NOW()),
(2,2,NOW()),
(3,3,NOW()),
(4,4,NOW()),
(5,5,NOW()),
(6,6,NOW()),
(7,7,NOW()),
(8,8,NOW()),
(9,9,NOW()),
(10,10,NOW());
