USE Hospital;
go
CREATE PROCEDURE insPaciente (@numSS NCHAR(10), @nombre NVARCHAR(40), @apellido NVARCHAR(40),
				 @fNacimiento DATE, @masculino BIT, @idPaciente INT OUT)
AS
BEGIN
	INSERT INTO Paciente (NumSS, Nombre, Apellido ,FNacimiento ,Genero)
	VALUES (@numSS, @nombre ,@apellido, @fNacimiento, @masculino);
	SELECT @idpaciente= SCOPE_IDENTITY();

END
GO;