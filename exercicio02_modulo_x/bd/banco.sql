create database exercicio02_moduloX;

use  exercicio02_moduloX;

create table atleta(
	id int not null auto_increment,
	nome varchar(90) not null,
    idade int not null,
    altura double not null, 
    peso double not null,
    primary key (id)
);

insert into atleta (nome, idade, altura, peso) values ('Ciclano', 25, 1.98, 89.6);
insert into atleta (nome, idade, altura, peso) values ('Fulana', 22, 1.70, 78.6);
select * from atleta;

select * from atleta where nome like  '%Ful%';