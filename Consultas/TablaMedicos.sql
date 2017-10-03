USE Consultas;
GO
CREATE TABLE Medicos(
	IdMedico int IDENTITY NOT NULL,
	NombreMedico VARCHAR(100) NOT NULL,
	Centro VARCHAR(100) NOT NULL,
	TelefonoMedico VARCHAR(100) NOT NULL,
	DniMedico VARCHAR(100) NOT NULL,
	EspecialidadMedico VARCHAR(100) NOT NULL,
	CONSTRAINT PkIdMedico PRIMARY KEY (IdMedico),
	CONSTRAINT UNDniMedico UNIQUE(DniMedico)
)