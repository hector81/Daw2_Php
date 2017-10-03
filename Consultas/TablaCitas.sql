USE Consultas;
GO
CREATE TABLE Citas(
	IdCita int IDENTITY NOT NULL,
	IdPaciente int NOT NULL,
	IdMedico int NOT NULL,
	NombrePaciente VARCHAR(100) NOT NULL,
	DireccionPaciente VARCHAR(100) NOT NULL,
	TelefonoPaciente VARCHAR(100) NOT NULL,
	DniPaciente VARCHAR(100) NOT NULL,
	FechaCita  DATE NOT NULL,
	HoraCita VARCHAR(5) NOT NULL,
	MedicoCita VARCHAR(100) NOT NULL,
	EspecialidadCita VARCHAR(100) NOT NULL,
	Comentarios VARCHAR(1000) NOT NULL,
	CONSTRAINT PkIdCita PRIMARY KEY (IdCita),
	CONSTRAINT Fk_IdPaciente FOREIGN KEY (IdPaciente) REFERENCES Paciente(IdPaciente),
	CONSTRAINT Fk_IdMedico FOREIGN KEY (IdMedico) REFERENCES Medicos(IdMedico)
)

