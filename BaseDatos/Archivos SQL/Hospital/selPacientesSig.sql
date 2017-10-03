USE Hospital;
go
CREATE PROCEDURE selPacientesSig
AS
BEGIN
	SELECT idPaciente, NumSS, Nombre, Apellido ,FNacimiento ,
	sexo = CASE  Genero
				WHEN 'true' THEN 'Masculino'
				WHEN 'false' THEN 'Femenino'
			END

	FROM Paciente

END