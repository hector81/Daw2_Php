USE Consultas;
GO
CREATE TABLE Paciente(
	IdPaciente int IDENTITY NOT NULL,
	NombrePaciente VARCHAR(100) NOT NULL,
	DireccionPaciente VARCHAR(100) NOT NULL,
	TelefonoPaciente VARCHAR(100) NOT NULL,
	DniPaciente VARCHAR(100) NOT NULL,
	CONSTRAINT PkIdPaciente PRIMARY KEY (IdPaciente)
)