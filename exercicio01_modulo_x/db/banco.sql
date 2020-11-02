create database exercicio01_moduloX;

use  exercicio01_moduloX;

create table estado(
	id int not null auto_increment,
    nome varchar(50) not null,
    sigla char(2) not null,
    primary key(id)
);

create table cidade(
	id int not null auto_increment,
    nome varchar(150) not null,
    idEstado int not null,
    primary key(id),
    foreign key(idEstado) references estado (id)
);

create table cliente(
	id int not null auto_increment,
    nome varchar(100) not null,
    idade int not null,
    idCidade int not null,
    primary key(id),
    foreign key(idCidade) references cidade (id)
);

select * from estado;
select * from cidade;
select * from cliente;
