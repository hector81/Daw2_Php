USE Hospital;
go


CREATE  PROCEDURE leePaciente 
AS
BEGIN
	SELECT idPaciente, NumSS, Nombre, Apellido ,FNacimiento , 
	Genero = CASE  
				WHEN Genero = '1' THEN 'Masculino'
				WHEN Genero = '0' THEN 'Femenino'
			END
	
	FROM Paciente; 

END
GO

