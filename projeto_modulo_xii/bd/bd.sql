create database projeto_moduloXII;

use projeto_moduloXII;

create table atleta(
id int not null auto_increment,
nome varchar(60) not null,
salario decimal(10,2) not null,
idade int not null,
peso decimal(4,1),
primary key(id));

create table treinador(
id int not null auto_increment,
nome varchar(60) not null,
salario decimal(10,2) not null,
qntVitoria int not null,
bonusSalario decimal(10,2) not null,
primary key(id)
);

create table time(
id int not null auto_increment,
nome varchar(60) not null,
cidade varchar(60) not null,
qntVitoria int not null,
anoFundacao int not null,
idTreinador int not null,
primary key(id),
foreign key(idTreinador) references treinador (id)
);

create table atletaTime(
idTime int not null ,
idAtleta int not null,
foreign key(idTime) references time (id),
foreign key(idAtleta) references atleta (id)
);


select * from atleta;
select * from treinador;
select * from time;
select * from atletaTime;