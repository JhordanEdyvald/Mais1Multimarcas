create table informacoes(
id int not null auto_increment,
nomeVeiculo varchar(30) not null,
descricao text not null,
ano int not null,
preco int,
caminhoimg VARCHAR (100) NOT NULL,
nomeimg VARCHAR (100) NOT NULL,
linkfotos TEXT NOT NULL,
primary key(id)
);

ALTER TABLE informacoes
 ADD 
    caminhoimg VARCHAR (100) NOT NULL,
    nomeimg VARCHAR (100) NOT NULL; 