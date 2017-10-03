USE CadenaTiendas;

CREATE TABLE familia(
	id INT IDENTITY PRIMARY KEY,
	nombre NVARCHAR,
	descripcion NVARCHAR,
)

CREATE TABLE articulo(
	id INT IDENTITY PRIMARY KEY,
	nombreCorto NVARCHAR,
	nombre NVARCHAR,
	descripcion NVARCHAR,
	PVP MONEY,
	idFamilia INT,
	CONSTRAINT FK_ID_Familia FOREIGN KEY (idFamilia) REFERENCES
	familia(id)
)



CREATE TABLE tienda(
	id INT IDENTITY PRIMARY KEY,
	nombre NVARCHAR,
	provincia NVARCHAR,
	ciudad NVARCHAR,
	telefono NVARCHAR
)

CREATE TABLE almacen(
	idArticulo INT ,
	idTienda INT ,
	stock INT,
	CONSTRAINT FK_ID_Articulo FOREIGN KEY (idArticulo) REFERENCES
	articulo(id),
	CONSTRAINT FK_ID_Tienda FOREIGN KEY (idTienda) REFERENCES
	tienda(id)
)


create table reseniasArticulo
	(
		idResenia INT IDENTITY NOT NULL,
		idArticulo INT NOT NULL, 
		nombreArticulo NVARCHAR(50) NOT NULL,
        fechaResenia DATETIME NOT NULL, 
		emailResenia NVARCHAR(50) NOT NULL,
        puntuacion INT NOT NULL, 
		comentarios NVARCHAR(50)NOT NULL,
		modifiedDate DATETIME NOT NULL,
		CONSTRAINT PkIdResenia PRIMARY KEY (idResenia),
		CONSTRAINT Fk_IdArticulo FOREIGN KEY (idArticulo) REFERENCES articulo(id)
	)



USE CadenaTiendas;
GO

ALTER TABLE articulo
	add foto varbinary(max) null;