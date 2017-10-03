USE Hospital;
GO
CREATE TABLE Paciente(
	IdPaciente INT NOT NULL,
	NumSS CHAR(20) NOT NULL,
	Nombre VARCHAR(40) NOT NULL,
	Apellido VARCHAR(60) NOT NULL,
	FNacimiento DATE NOT NULL,
	Genero BIT NOT NULL,
	CONSTRAINT PkIdPaciente PRIMARY KEY (IdPaciente),
	CONSTRAINT UNumSS UNIQUE(NumSS)
)


USE Hospital
GO
SELECT * FROM Paciente;

DELETE FROM Paciente;
