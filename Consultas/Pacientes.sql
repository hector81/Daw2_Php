USE Consultas;
GO
CREATE TABLE Paciente(
	IdPaciente int IDENTITY NOT NULL,
	NombrePaciente VARCHAR(100) NOT NULL,
	DireccionPaciente VARCHAR(100) NOT NULL,
	TelefonoPaciente VARCHAR(100) NOT NULL,
	DniPaciente VARCHAR(100) NOT NULL,
	FechaCita  DATE NOT NULL,
	HoraCita VARCHAR(5) NOT NULL,
	MedicoCita VARCHAR(100) NOT NULL,
	EspecialidadCita VARCHAR(100) NOT NULL,
	Comentarios VARCHAR(1000) NOT NULL,
	CONSTRAINT PkIdPaciente PRIMARY KEY (IdPaciente),
	CONSTRAINT UNDniPaciente UNIQUE(DniPaciente)
)