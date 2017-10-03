create database Ayuntamiento;
USE Ayuntamiento;
go

CREATE TABLE Autoridad
(  id    INT NOT NULL IDENTITY,
   nombre NVARCHAR(100) NOT NULL,
   cargo  NVARCHAR(100) NOT NULL,
   Partido NVARCHAR(100) NOT NULL,
   CONSTRAINT PkAutoridad
     PRIMARY KEY (id)
);

CREATE TABLE Concejalia
(  id       INT NOT NULL IDENTITY,
   nombre   NVARCHAR(100) NOT NULL,
   descripcion NVARCHAR(500) NOT NULL,
   idAutoridad INT NOT NULL,
   CONSTRAINT PkConcejalia
      PRIMARY KEY (id),
   CONSTRAINT FkAuridadNConcejalia
      FOREIGN KEY (idAutoridad)
      REFERENCES Autoridad (id)
);

CREATE TABLE Actividad
(  id       INT NOT NULL IDENTITY,
   nombre   NVARCHAR(100) NOT NULL,
   descripcion NVARCHAR(500) NOT NULL,
   fInicio     DATE NOT NULL,
   fFin        DATE NOT NULL,
   CONSTRAINT PkActividad
      PRIMARY KEY (id)
);

CREATE TABLE Patrocinador
(  id       INT NOT NULL IDENTITY,
   nombre   NVARCHAR(100) NOT NULL,
   cantidad MONEY NOT NULL,
   CONSTRAINT PkPatrocinador
      PRIMARY KEY (id)
);

CREATE TABLE Evento
(  id       INT NOT NULL IDENTITY,
   nombre   NVARCHAR(100) NOT NULL,
   descripcion NVARCHAR(500) NOT NULL,
   fyh         DATETIME2(7) NOT NULL,
   lugar    NVARCHAR(100),
   idActividad       INT NOT NULL,
   idConceOrganiza   INT NOT NULL,
   idPatrocina       INT NOT NULL,
   CONSTRAINT PkEvento
      PRIMARY KEY (id),
   FOREIGN KEY (idActividad)
      REFERENCES Actividad (id),
   FOREIGN KEY (idConceOrganiza)
      REFERENCES Concejalia (id),
   FOREIGN KEY (idPatrocina)
      REFERENCES Patrocinador (id)
);


CREATE TABLE Participante
(  id       INT NOT NULL IDENTITY,
   nombre   NVARCHAR(100) NOT NULL,
   CONSTRAINT PkParticipante
      PRIMARY KEY (id)
);

CREATE TABLE Participa
(  idEvento    INT NOT NULL,
   idParticipante INT NOT NULL,
   CONSTRAINT PkParticipa
      PRIMARY KEY (idEvento, idParticipante),
   CONSTRAINT FkEventoNParticipa
      FOREIGN KEY (idEvento)
      REFERENCES Evento (id),
   CONSTRAINT FkParticipanteNParticipa
      FOREIGN KEY (idParticipante)
      REFERENCES Participante (id)
)


















USE Ayuntamiento;
INSERT INTO Actividad(nombre,descripcion,fInicio,fFin)
VALUES('San Mateo 33','fiestas','2017-07-15','2017-08-11');

INSERT INTO Autoridad(nombre,cargo,Partido)
VALUES('Julian','Concejal','PP');

INSERT INTO Concejalia(nombre,DESCRIPCION,idAutoridad)
VALUES('Julian','Deportes',7);

INSERT INTO Evento(nombre,descripcion,fyh,lugar,idActividad,idConceOrganiza,idPatrocina)
VALUES('San Bernabe','Fiestas','2018-05-09 00:00:00:00','Logroño',1,1,1);

INSERT INTO Participa(idEvento,idParticipante)
VALUES(1,7);

INSERT INTO Participante(nombre)
VALUES('Carlos Velasco');

INSERT INTO Patrocinador(nombre,cantidad)
VALUES('Raul',1955);