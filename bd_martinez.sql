create table programadores (
    prog_id serial NOT NULL PRIMARY KEY,
    prog_correo varchar(50),
    prog_grado int, 
    prog_nombreS varchar(50),
    prog_apellidoS varchar(50),
    prog_sit varchar(10),
    FOREIGN KEY (prog_grado) REFERENCES grados(gra_id)
);

create table grados (
    gra_id serial not null,
    gra_nombre varchar(30),
    gra_sit varchar(10),
    primary key (gra_id)
);

Create table asig_programador (
asig_id serial primary key,
asig_programador int not null,
asig_app int not null,
asig_sit int,
foreign key (asig_programador) REFERENCES programadores (prog_id),
foreign key (asig_app) REFERENCES aplicaciones (app_id)
);

Create table aplicaciones (
app_id serial not null primary key,
app_nombre varchar (50) not null,
app_estado int
);

Create table tareas (
tar_id serial not null primary key,
tar_app int,
tar_descripcion varchar (50) not null,
tar_fecha date,
tar_estado int,
foreign key (tar_app) REFERENCES aplicaciones(app_id)
);
