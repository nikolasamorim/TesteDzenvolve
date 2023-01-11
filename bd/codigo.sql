Create database Cadastro_Usuarios;
Use Cadastro_Usuarios;


create table clientes(
id int auto_increment not null,
nome varchar(255) not null,
cpf varchar(255) not null,
sexo varchar(255) not null,
data_nasc date not null,
email varchar(255) not null,
celular varchar(16) not null,
profissao varchar(255) not null,
primary key(id)
)Engine=Innodb;

