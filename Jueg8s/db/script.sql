use jueg8s;
-- Usuarios
update grupo
set
  activo = false
where
  idGrupo > 0;
select
  *
from grupo;
insert into grupo
values
  (1, 'Grupo 1', false),
  (2, 'Grupo 2', false),
  (3, 'Grupo 3', false),
  (4, 'Grupo 4', false),
  (5, 'Grupo 5', false),
  (6, 'Grupo 6', false);
-- Actividad
insert into Actividad
values
  (1, 'Lista ordenada');
insert into Actividad
values
  (2, 'Crucigrama');
-- Lista
delete from Lista
where
  idLista > 0;
insert into Lista
values
  (
    1,
    'Completar al lista con los casos de prueba a evaluar',
    3,
    1
  ),
  (
    2,
    'Marcar el resultado de la prueba despues de ejecutarla',
    4,
    1
  ),
  (3, 'Completar los datos de creador de lista', 1, 1),
  (4, 'Completar apartado de resultados', 6, 1),
  (5, 'Pasar la lista al personal de testeo', 2, 1),
  (6, 'Devolver la lista al creado', 5, 1);
-- GrupoActividad
delete from GrupoActividad
where
  idGrupo != 5
  and idActividad > 0;
-- insert into GrupoActividad values (5,1,0,curtime(),0);
  -- insert into GrupoActividad values (5,2,0,curtime(),0);
select
  *
from GrupoActividad;
select
  *
from GrupoActividad;
-- Crucigrama
  desc Crucigrama;
update Crucigrama
set
  `6` = 4
where
  idCrucigrama = 5;
select
  *
from Crucigrama;
insert into CrucigramaPalabra value (1, 'CHECKLIST', 2),
  (2, 'ELIMINAR', 2),
  (3, 'FLEXIBLE', 2),
  (4, 'SECUENCIA', 2),
  (5, 'VERSATIL', 2);
-- Calificar
update jugar
set
  jugar = true
where
  jugar = false;
insert into jugar
values
  (false);
-- SQL crate database
  CREATE SCHEMA IF NOT EXISTS jueg8s DEFAULT CHARACTER SET utf8;
USE jueg8s;

drop table Lista;
drop table Crucigrama;
drop table CrucigramaPalabra;
drop table Preguntas;
drop table GrupoActividad;
drop table Grupo;
drop table Actividad;

CREATE TABLE IF NOT EXISTS Grupo (
    idGrupo INT NOT NULL,
    contra VARCHAR(45) NULL,
    activo TINYINT(1) NULL,
    PRIMARY KEY (idGrupo)
  );
CREATE TABLE IF NOT EXISTS Actividad (
    idActividad INT NOT NULL,
    Nombre VARCHAR(45) NULL,
    PRIMARY KEY (idActividad)
  );
CREATE TABLE IF NOT EXISTS GrupoActividad (
    idGrupo INT NOT NULL,
    idActividad INT NOT NULL,
    posicion INT NULL,
    fin TIME NULL,
    porcentajeObtenido INT NULL,
    PRIMARY KEY (idGrupo, idActividad),
    CONSTRAINT fk_Grupo_Actividad_Grupo FOREIGN KEY (idGrupo) REFERENCES Grupo (idGrupo) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT fk_Grupo_Actividad_Actividad1 FOREIGN KEY (idActividad) REFERENCES Actividad (idActividad) ON DELETE NO ACTION ON UPDATE NO ACTION
  );
CREATE TABLE IF NOT EXISTS Preguntas (
    idPregunta INT NOT NULL,
    pregunta VARCHAR(200) NULL,
    aRes VARCHAR(100) NULL,
    bRes VARCHAR(100) NULL,
    cRes VARCHAR(100) NULL,
    aValor TINYINT(1) NULL,
    bValor TINYINT(1) NULL,
    cValor TINYINT(1) NULL,
    idActividad INT NOT NULL,
    PRIMARY KEY (idPregunta),
    CONSTRAINT fk_Preguntas_Actividad1 FOREIGN KEY (idActividad) REFERENCES Actividad (idActividad) ON DELETE NO ACTION ON UPDATE NO ACTION
  );
CREATE TABLE IF NOT EXISTS Lista (
    idLista INT NOT NULL,
    valor VARCHAR(100) NULL,
    valorPos INT NULL,
    idActividad INT NOT NULL,
    PRIMARY KEY (idLista),
    CONSTRAINT fk_Lista_Actividad1 FOREIGN KEY (idActividad) REFERENCES Actividad (idActividad) ON DELETE NO ACTION ON UPDATE NO ACTION
  );
CREATE TABLE IF NOT EXISTS Crucigrama (
    idCrucigrama INT NOT NULL,
    `1` VARCHAR(45) NULL,
    `2` VARCHAR(45) NULL,
    `3` VARCHAR(45) NULL,
    `4` VARCHAR(45) NULL,
    `5` VARCHAR(45) NULL,
    `6` VARCHAR(45) NULL,
    `7` VARCHAR(45) NULL,
    `8` VARCHAR(45) NULL,
    `9` VARCHAR(45) NULL,
    `10` VARCHAR(45) NULL,
    `11` VARCHAR(45) NULL,
    `12` VARCHAR(45) NULL,
    `13` VARCHAR(45) NULL,
    idActividad INT NOT NULL,
    PRIMARY KEY (idCrucigrama),
    CONSTRAINT fk_Crucigrama_Actividad1 FOREIGN KEY (idActividad) REFERENCES Actividad (idActividad) ON DELETE NO ACTION ON UPDATE NO ACTION
  );
create table CrucigramaPalabra(
    idCrucigramaPalabra int primary key,
    palabra varchar(15),
    idActividad int not null,
    constraint idActividad_CrucigramaPalabra_fk foreign key(idActividad) references Actividad (idActividad)
  );
create table jugar(jugar boolean primary key);