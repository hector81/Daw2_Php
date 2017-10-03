USE Consultas;
GO
CREATE PROCEDURE BorrarPacientesFechasDuplicados
 (@FECHA DATETIME, @HORA VARCHAR(5),@IdPaciente int) AS	--PARAMETROS PASADOS
	if(@FECHA in(select FechaCita from Paciente) AND @HORA in(select HoraCita from Paciente)) 
		begin 
			delete from Paciente where IdPaciente=@IdPaciente; 
			delete from Citas where IdPaciente =@IdPaciente ;
		END
GO


