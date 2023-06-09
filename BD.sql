Create table programadores (

prog_id int not null primary key,
prog_grado varchar (50) not null,
prog_nombre varchar (50) not null,
prog_apellido varchar (50) not null
);

Create table asig_programador (

asig_id serial primary key,
asig_prog_id int not null,
asig_apli_id int not null,

);

Create table aplicaciones (

apli_id int not null primary key,
apli_nombre varchar (50) not null,
apli_fecha_ini date not null,
apli_estado int not null
);


Create table tareas (

tar_id int not null primary key,
tar_descripcion varchar (50) not null,
);
