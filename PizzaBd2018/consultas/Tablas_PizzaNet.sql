 --create database PizzaNet;
USE PizzaNet;--Informar siempre de la bd que se va a utilizar
GO

CREATE TABLE Cliente(
	idCliente INT NOT NULL IDENTITY,
	nombre NVARCHAR(100) NOT NULL,
	direccion NVARCHAR(100) NOT NULL,
	tlfno NCHAR(9) NOT NULL,
	eCorreo NVARCHAR(100) NOT NULL,
	CONSTRAINT PkCliente PRIMARY KEY (idCliente)
);

CREATE TABLE Pizza(
	idPizza INT NOT NULL IDENTITY,
	nombre NVARCHAR(50),
	descripcion NVARCHAR(150),
	CONSTRAINT PkPizza PRIMARY KEY (idPizza)
);

INSERT INTO Pizza (nombre, descripcion) VALUES 
('Margarita', 'Con tomate, mozzarella, albahaca fresca, sal y aceite'),
('Barbacoa', 'Con carne picada de cerdo, pimiento rojo, cebolla, salsa barbacoa y mozzarella'),
('4 Estaciones', 'Con aceitunas verdes, berenjena, champiñones, mozzarella, oregano, prosciutto...'),
('4 Quesos', 'Con salsa de tomate, aceitunas negras, mozzarella, parmesano reggiano, emmental...'),
('Romana', 'Con jamón york, champiñones, aceitunas negras, mozzarella, salsa de tomate y oregano'),
('Mediterránea', 'Con espárragos verdes, calabacín, setas, mozzarella y salsa de tomate'),
('Carbonara', 'Con bacon, parmesano, mozzarella, nata líquida, yemas de huevo y salsa de tomate');
GO

CREATE TABLE Tamanio(
	idTamanio INT NOT NULL IDENTITY,
	nombre NVARCHAR(8) NOT NULL,
	CONSTRAINT PkTamanio PRIMARY KEY (idTamanio)
);

INSERT INTO Tamanio (nombre) VALUES ('Normal'), ('Grande'), ('Familiar');
GO

CREATE TABLE Extras(
	idExtra	INT NOT NULL IDENTITY,
	nombre	NVARCHAR(15) NOT NULL,
	pv MONEY NOT NULL,
	CONSTRAINT PkExtras PRIMARY KEY (idExtra)
);

INSERT INTO Extras (nombre, pv) VALUES
('Queso', 0.55),
('Jamón', 0.75),
('Pimiento', 0.4),
('Pollo', 0.6),
('Cebolla', 0.3),
('Cerdo', 0.7);
GO

CREATE TABLE Precios(
	idPrecio INT NOT NULL IDENTITY,
	idPizza INT NOT NULL,
	idTamanio INT NOT NULL,
	pv MONEY NOT NULL,
	CONSTRAINT PkPrecios PRIMARY KEY (idPrecio),
	CONSTRAINT FkPizzaNPrecio FOREIGN KEY (idPizza) REFERENCES Pizza (idPizza),
	CONSTRAINT FkTamanioNPrecio FOREIGN KEY (idTamanio) REFERENCES Tamanio (idTamanio)
);

INSERT INTO Precios (idPizza, idTamanio, pv) VALUES
(1, 1, 9),
(1, 2, 11.5),
(1, 3, 14),
(2, 1, 10.5),
(2, 2, 13),
(2, 3, 16),
(3, 1, 10),
(3, 2, 12),
(3, 3, 15),
(4, 1, 8),
(4, 2, 10),
(4, 3, 13),
(5, 1, 8),
(5, 2, 10),
(5, 3, 13),
(6, 1, 11),
(6, 2, 13.75),
(6, 3, 16.25),
(7, 1, 9.5),
(7, 2, 11.75),
(7, 3, 14.25);
GO

CREATE TABLE Pedido(
	idPedido INT NOT NULL IDENTITY,
	idCliente INT NOT NULL,
	fPedido DATETIME2(7) NOT NULL DEFAULT GETDATE(),
	servido BIT DEFAULT 'false' NOT NULL ,-- bol insert TRU O FALSEV servido BIT DEFAULT 'false' NOT NULL ,-- insert TRU O FALSE
	importe MONEY NULL,
	CONSTRAINT PkPedido PRIMARY KEY (idPedido),
	CONSTRAINT FkClienteNPedido FOREIGN KEY (idCliente) REFERENCES Cliente (idCliente)
);

CREATE TABLE LineaPedido(
	idPedido INT NOT NULL,
	idPrecio INT NOT NULL,
	cantidad TINYINT NOT NULL,
	masa NVARCHAR(10) DEFAULT 'Normal' NOT NULL
	CONSTRAINT PkLineaPedido PRIMARY KEY (idPedido, idPrecio),
	CONSTRAINT FkPedidoNLineaPedido FOREIGN KEY (idPedido) REFERENCES Pedido (idPedido)
	CONSTRAINT FkPrecioNLineaPedido FOREIGN KEY (idPrecio) REFERENCES Precios (idPrecio)
);

CREATE TABLE ExtrasPedido(
	idPedido INT NOT NULL,
	idPrecio INT NOT NULL,
	idExtra INT NOT NULL,
	CONSTRAINT PkExtrasPedido PRIMARY KEY (idPedido, idPrecio, idExtra),
	CONSTRAINT FkLineaPedidoNExtrasPedido FOREIGN KEY (idPedido, idPrecio) REFERENCES LineaPedido (idPedido, idPrecio),
	CONSTRAINT FkExtrasNExtrasPedido FOREIGN KEY (idExtra) REFERENCES Extras (idExtra)
);

--use PizzaNet;
--go
--alter table lineapedido
--add masa nvarchar(10) default 'Normal' not null;

--------------------------------------------
---------VISTAS---------
----------------------------------------------
--VISTAS PRECIOS

go
CREATE VIEW precio AS
SELECT idPrecio, pz.nombre as pizza, t.nombre as tamanio, pv FROM tamanio as t
 INNER JOIN precios as p ON t.idTamanio = p.idTamanio
 INNER JOIN Pizza as pz ON p.IdPizza = pz.IdPizza;

 
--VISTA EXTRAS

GO
CREATE VIEW VistaEXTRAS AS
--SELECT extra.nombre AS NOMBRE_EXTRA, pz.nombre AS PIZZA_NOMBRE, t.nombre AS TAMANO , p.pv AS PRECIO FROM Extras as extra
SELECT extra.nombre AS NOMBRE_EXTRA, extra.pv AS PRECIO FROM Extras as extra;
 --INNER JOIN ExtrasPedido AS epedido ON epedido.IdExtra = extra.IdExtra
 --INNER JOIN LineaPedido AS lp ON lp.idPedido = epedido.idPedido
 --INNER JOIN Precios as p ON p.IdPrecio = lp.IdPrecio
 --INNER JOIN Pizza as pz ON pz.IdPizza = p.IdPizza
 --INNER JOIN Tamanio as t ON p.IdTamanio = t.IdTamanio
 ;
 
 
 --VISTA PEDIDO COCINA


go
CREATE VIEW PedidoCocina AS
SELECT p.fPedido AS FECHA_PEDIDO, p.idPedido AS IDPEDIDO,pz.nombre AS PIZZA ,t.nombre AS TAMANIO, c.nombre AS NOMBRE_CLIENTE
, ex.nombre AS EXTRAS 
FROM Pedido AS p
 INNER JOIN LineaPedido AS lp ON p.IdPedido = lp.IdPedido
 INNER JOIN Cliente AS c ON c.idCliente = p.idCliente
 INNER JOIN Precios AS pr ON lp.IdPrecio = pr.IdPrecio
 INNER JOIN Pizza AS pz ON pz.IdPizza = pr.IdPizza
 INNER JOIN Tamanio AS t ON t.IdTamanio = pr.IdTamanio
 INNER JOIN ExtrasPedido AS ep ON ep.idPedido = lp.idPedido 
 INNER JOIN Extras AS ex ON ep.idExtra = ex.idExtra
 LEFT OUTER JOIN  ExtrasPedido AS ep1 ON lp.IdPedido = ep1.IdPedido and lp.IdPrecio = ep1.IdPrecio
 LEFT OUTER JOIN Extras AS e ON ep.idExtra = e.idExtra
 ;
 
 go
 --------------------------------------------
---------PROCEDMIENTOS---------
----------------------------------------------
 
 CREATE PROCEDURE insertarCliente
(
	@nombre NVARCHAR(100),
	@direccion NVARCHAR(100),
	@tlfno CHAR(9),
	@eCorreo NVARCHAR(100),
	@id INT OUTPUT
)
AS BEGIN
	INSERT INTO Cliente(nombre,direccion,tlfno,eCorreo)
	VALUES (@nombre,@direccion,@tlfno,@eCorreo);--VALUES (@nombre,@direccion,@tlfno,@eCorreo,@id);
	SET @id = SCOPE_IDENTITY();--va a coger el valor de salida general
END;

GO

CREATE PROCEDURE insertarPedido
(
	@idCliente INT,
	@fPedido DATETIME2(7),
	@servido BIT,
	@importe FLOAT,
	@id INT OUTPUT
)
AS BEGIN
	INSERT INTO Pedido(idCliente,fPedido,servido,importe)
	VALUES (@idCliente,@fPedido,@servido,@importe);
	SELECT @id =  SCOPE_IDENTITY();
END;

--GO

--CREATE PROCEDURE insertarLineaPedido
--(
--	@idPedido INT,
--	@idPrecio INT,
--	@cantidad TINYINT,
--	@masa NVARCHAR(10)
--)
--AS BEGIN
--	INSERT INTO LineaPedido(idPedido,idPrecio,cantidad,masa)
--	VALUES (@idPedido,@idPrecio,@cantidad,@masa);
--END;

GO
--er]Instrucción INSERT en conflicto con la restricción FOREIGN KEY "FkPrecioNLineaPedido". 
--El conflicto ha aparecido en la base de datos "PizzaNet1", tabla "dbo.Precios", column 'idPrecio'.1
CREATE PROCEDURE insertaLineaPedido( --22-01-2018
  @idPedido INT,
  @pizza    NVARCHAR(50),
  @tamanio  NVARCHAR(8),
  @cantidad TINYINT,
  @masa     NVARCHAR(10),
  @idPv     INT OUTPUT
) AS
  BEGIN
    SELECT @idPv = Pr.idPrecio
    FROM Precios AS Pr
      INNER JOIN Pizza P ON Pr.idPizza = P.idPizza
      INNER JOIN Tamanio T ON Pr.idTamanio = T.idTamanio
    WHERE P.nombre = @pizza AND T.nombre = @tamanio;
    INSERT INTO LineaPedido (idPedido, idPrecio, cantidad, masa) VALUES (@idPedido, @idPv, @cantidad, @masa)
  END
GO

--CREATE PROCEDURE insertarExtrasPedido
--(
--	@idPedido INT,
--	@idPrecio INT,
--	@idExtras INT
--)
--AS BEGIN
--	INSERT INTO ExtrasPedidos(idPedido,idPrecio,idExtras)
--	VALUES (@idPedido,@idPrecio,@idExtras);
--END;
--GO

CREATE PROCEDURE insertarExtrasPedido( --22-01-2018
  @idPedido INT,
  @idPrecio INT,
  @extra    NVARCHAR(15)
) AS
  BEGIN
    INSERT INTO ExtrasPedido (idPedido, idPrecio, idExtra)
      SELECT
        @idPedido,
        @idPrecio,
        idExtra
      FROM Extras
      WHERE nombre = @extra
  END
GO

CREATE PROCEDURE prPedidoCliente  --22-01-2018
    @idCliente INT
AS
  BEGIN
    SELECT
      pe.idPedido AS Pedido,
      pz.nombre   AS Pizza,
      t.nombre    AS Tamaño,
      masa        AS Masa,
      e.nombre    AS Extras,
      cantidad    AS Cantidad
    FROM Pedido AS pe
      INNER JOIN LineaPedido AS lp ON pe.idPedido = lp.idPedido
      INNER JOIN Precios AS p ON lp.idPrecio = p.idPrecio
      INNER JOIN Pizza AS pz ON p.idPizza = pz.idPizza
      INNER JOIN Tamanio AS t ON p.idTamanio = t.idTamanio
      LEFT JOIN ExtrasPedido AS ep ON lp.idPedido = ep.idPedido AND lp.idPrecio = ep.idPrecio
      LEFT JOIN Extras AS e ON ep.idExtra = e.idExtra
    WHERE pe.idCliente = @idCliente;
  END
GO



--VISTA TAMAÑOS
 
GO
CREATE VIEW VistaTamanos AS
SELECT t.nombre as tamanio, pv FROM tamanio as t
 INNER JOIN precios as p ON t.idTamanio = p.idTamanio
 INNER JOIN Pizza as pz ON p.IdPizza = pz.IdPizza;
 ;


--hay 3 @@IDENTITY,ident_curry,SCOPE_IDENTITY
--USE PizzaNet;
--go
--BEGIN TRAN
--insert(into)()vlaues pizza ejemplo
--SELECT  *  FROM Pizza
--SELECT  SCOPE_IDENTITY() ;---devuelve la ultima columna insertada

--rollback;--esto es necesario para que la jecute completamente y otros puedan hacer mas slect o otras consulta sobre la misma tabala
--una vez confirmada la transaccion ya no se puede echar averiguarPreciosTotalExtras



--read commit //de lecturas ya confirmadas
--TRANSACCION. EJ: SACAR DINERO DE UNA CUENTA Y PONERLO A averiguarPreciosTotalExtras
--ES ATOMICA, TODAS TIENEN EXITO, TODAS FRACASAN
--AISLAMEINTOD, DURABILIDAD ,CONSISTENCIA
--CONCURREENCIA
--EJEMPLO, DE UNA CUENTA DE 100, UNO SACA 100 Y OTRO A LA VEZ SACA 40
--SE EVITA A TRAVES DE NIVELES DE AISLAMIENTO.
--HAY DOS METODDOS
--LECTURAS SUCUIAS Y LECTURAS REPETIBLES--COMMIT O ROLLBACK



--set transaction isolation level
 
 
 
 
 
 
-- SeLECT @@identity as funsystem
--select scope_identity() as funnormañ7declare @id int;
--exec isenrtarCliente 'a','','','', @ID OUTPUT
--SELECT @ID
--SEÑECT CSOPE_IDENTITY()

--GO

--SELECT @@IDENTITYÇ
--SELECT SCOPE:IDENTITY();--ENTIENDE DE AMBITOS



---------------
--SLECT @@identity as funsystem;--NULL NO ESTA EN LA MISMA SESION
--select scope_identity() as funnormañ7declare @id int;--NULL NO ESTA EN LA MISMA SESION
--SELECRT IDENT CUURETN(CLIENTE)--DA BIEN

