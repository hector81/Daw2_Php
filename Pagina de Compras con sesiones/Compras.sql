USE Compras;
GO
CREATE TABLE Clientes(
	IdCliente INT IDENTITY NOT NULL,
	NombreCliente VARCHAR(20) NOT NULL,
	PrimerApellidoCliente VARCHAR(20) NOT NULL,
	SegundoApellidoCliente VARCHAR(20) NOT NULL,
	dniCliente VARCHAR(9) NOT NULL,
	UsuarioCliente VARCHAR(9) NOT NULL,
	PasswordCliente VARCHAR(9) NOT NULL,
	DireccionCliente VARCHAR(20) NOT NULL,
	CiudadCliente VARCHAR(20) NOT NULL,
	ProvinciaCliente VARCHAR(20) NOT NULL,
	FechaNacimientoCliente VARCHAR(20) NOT NULL, 
	CONSTRAINT PkIdCliente PRIMARY KEY (IdCliente),
	CONSTRAINT UNUsuarioCliente UNIQUE(UsuarioCliente)
);

GO

CREATE TABLE Productos(
	IdProducto INT IDENTITY NOT NULL,
	NombreProducto VARCHAR(20) NOT NULL,
	PrecioProducto FLOAT NOT NULL,
	StockProducto INT NOT NULL,
	IVA INT NOT NULL,
	DescripcionProducto VARCHAR(100) NOT NULL,
	CONSTRAINT PkIdProducto PRIMARY KEY (IdProducto),
	CONSTRAINT UNIdProducto UNIQUE(IdProducto)
);

GO

CREATE TABLE Ventas (
	IdCompra INT IDENTITY NOT NULL,
	IdCliente INT NOT NULL,
	IdProducto INT NOT NULL,
	NombreProducto VARCHAR(20) NOT NULL,
	NombreCliente VARCHAR(20) NOT NULL,
	PrimerApellidoCliente VARCHAR(20) NOT NULL,
	SegundoApellidoCliente VARCHAR(20) NOT NULL,
	dniCliente VARCHAR(9) NOT NULL,
	UnidadesPedidas INT NOT NULL,
	PrecioProducto INT NOT NULL,
	IVA INT NOT NULL,
	PrecioFinal INT NOT NULL,
	CONSTRAINT PkIdCompra PRIMARY KEY (IdCompra),
	CONSTRAINT UNIdCompra UNIQUE(IdCompra),
	CONSTRAINT Fk_IdCliente FOREIGN KEY (IdCliente) REFERENCES Clientes(IdCliente),
	CONSTRAINT Fk_IdProducto FOREIGN KEY (IdProducto) REFERENCES Productos(IdProducto)
);


GO

INSERT INTO Productos(NombreProducto,PrecioProducto,StockProducto,IVA,DescripcionProducto)
VALUES('Frambuesas',199,25,16,'Jarrones decoración frambuesa');
INSERT INTO Productos(NombreProducto,PrecioProducto,StockProducto,IVA,DescripcionProducto)
VALUES('Manzanas',145,36,16,'Sabanas decoración manzana');
INSERT INTO Productos(NombreProducto,PrecioProducto,StockProducto,IVA,DescripcionProducto)
VALUES('Platano',89,356,16,'Platos decoración platano');


GO


INSERT INTO Clientes(NombreCliente,PrimerApellidoCliente,SegundoApellidoCliente,dniCliente,UsuarioCliente,PasswordCliente,DireccionCliente,CiudadCliente,ProvinciaCliente,FechaNacimientoCliente)
VALUES('Hector','Apellaniz','Alonso','16931693g','alumno','alumno1','Calle Bravo 8,2ºa','Logroño','La Rioja','1999-11-19');
INSERT INTO Clientes(NombreCliente,PrimerApellidoCliente,SegundoApellidoCliente,dniCliente,UsuarioCliente,PasswordCliente,DireccionCliente,CiudadCliente,ProvinciaCliente,FechaNacimientoCliente)
VALUES('Sara','Lamarca','Sanchez','19999693k','alumna','alumna2','Calle Siete 3,2ºa','Logroño','La Rioja','1989-05-19');
go




GO
CREATE TABLE LogCliente(
	IdSesion INT IDENTITY NOT NULL,
	IdCliente INT NOT NULL,
	HoraConexion VARCHAR(20) NOT NULL,
	CierreConexion VARCHAR(20) NOT NULL,
	onlineCliente BIT NOT NULL
)
GO
CREATE TABLE LogAdministradores(
	IdSesion INT IDENTITY NOT NULL,
	IdAdministrador INT NOT NULL,
	HoraConexion VARCHAR(20) NOT NULL,
	CierreConexion VARCHAR(20) NOT NULL,
	onlineAdministrador BIT NOT NULL
)
GO









CREATE TABLE Administradores (
	IdAdministrador INT IDENTITY NOT NULL,
	NombreAdministrador VARCHAR(20) NOT NULL,
	PrimerApellidoAdministrador VARCHAR(20) NOT NULL,
	SegundoApellidoAdministrador VARCHAR(20) NOT NULL,
	usuarioAdministrador VARCHAR(9) NOT NULL,
	passwordAdministrador VARCHAR(9) NOT NULL,
	CONSTRAINT PkIdAdministrador PRIMARY KEY (IdAdministrador),
	CONSTRAINT UNIIdAdministrador UNIQUE(IdAdministrador)
);

INSERT INTO Administradores(IdAdministrador,NombreAdministrador,PrimerApellidoAdministrador,SegundoApellidoAdministrador,usuarioAdministrador,passwordAdministrador)
VALUES('Hector','Garcia','Gonzalez','hegar','81');