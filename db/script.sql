use jueg8s;
-- Usuarios
insert into grupo values (1,'Grupo 1',false),
(2,'Grupo 2',false),
(3,'Grupo 3',false),
(4,'Grupo 4',false),
(5,'Grupo 5',false),
(6,'Grupo 6',false);

-- Actividad
insert into Actividad values (1,'Lista ordenada');
insert into Actividad values (2,'Crucigrama');

-- Lista
delete from Lista where idLista > 0;
insert into Lista values (1,'Valor 1',3,1),
(2,'Valor 2',2,1),
(3,'Valor 3',6,1),
(4,'Valor 4',4,1),
(5,'Valor 5',5,1),
(6,'Valor 6',1,1);

-- GrupoActividad
delete from GrupoActividad where idGrupo != 5 and idActividad >0;
insert into GrupoActividad values (5,1,0,curtime(),0);
insert into GrupoActividad values (5,2,0,curtime(),0);
select * from GrupoActividad;

-- Crucigrama
desc Crucigrama;
select * from Crucigrama;
insert into CrucigramaPalabra value (1,'CHECKLIST',2),
(2,'ELIMINAR',2),
(3,'FLEXIBLE',2),
(4,'SECUENCIA',2),
(5,'VERSATIL',2);

-- SQL crate database
create table CrucigramaPalabra(
	idCrucigramaPalabra int primary key,
    palabra varchar(15),
    idActividad int not null,
    constraint idActividad_CrucigramaPalabra_fk foreign key(idActividad) references Actividad (idActividad)
);


