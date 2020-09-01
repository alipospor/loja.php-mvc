create database lojaphp;

use lojaphp;
/* Tabelas */

create table usuario (
	id_usuario 			INT AUTO_INCREMENT NOT NULL,
    categoria_usuario_id 	INT,
    endereco_usuario_id 	INT,
    nome_usuario 			VARCHAR(50),
    senha 					VARCHAR(150),
    email					VARCHAR(150),
    url_foto      TEXT,
    primary key (id_usuario)
);

create table categoria_usuario (
	id_categoria_usuario 	INT AUTO_INCREMENT NOT NULL,
    ds_usuario 			  	VARCHAR(25),
    primary key (id_categoria_usuario)
);

create table endereco (
	id_endereco INT AUTO_INCREMENT,
    usuario_id INT,
    rua VARCHAR(100),
    numero VARCHAR(10),
    bairro VARCHAR(100),
    complemento VARCHAR(50),
    estado VARCHAR(50),
    cidade VARCHAR(50),
    cep VARCHAR(50),
    primary key (id_endereco)
);

/* Chaves estrangeiras */
alter table    usuario
add constraint categoria_usuario_id  
foreign key   (categoria_usuario_id) 
references 	   categoria_usuario (id_categoria_usuario);

alter table    endereco
add constraint usuario_id  
foreign key   (usuario_id) 
references 	   usuario (id_usuario);

/* Inserindo dados nas tabelas */
insert into categoria_usuario
(ds_usuario)
values ("Administrador"),
	   ("Usuário");

insert into usuarios
(categoria_usuarios_id, nome_usuario, senha, email, url_foto)
values (1, "Alisson",   "8$XRBQ0I.8N4o", "ali_pospor@hotmail.com","https://gravatar.com/avatar/8800139dba3a0db7ce28a213890fe68f?s=400&d=robohash&r=x");

delete from usuarios where id_usuarios = 1;
select * from endereco;
drop table usuarios;