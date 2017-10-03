USE Consultas;
GO
CREATE PROCEDURE BorrarPacientesFechasDuplicados
 (@Dni DATETIME,@IdPaciente int) AS	--PARAMETROS PASADOS
	if(@Dni in(select DniPaciente from Paciente)) 
		begin 
			delete from Paciente where IdPaciente=@IdPaciente; 
			delete from Citas where IdPaciente =@IdPaciente ;
		END
GO


