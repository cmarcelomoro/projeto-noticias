
drop database dbnoticias;
create database dbnoticias;
use dbnoticias;

create table pessoa(
	id integer primary key auto_increment,
	nome varchar(50),
    senha varchar(100),
    adm bit
    );
    
    
create table noticia(
	id integer primary key auto_increment,
    titulo varchar(50),
    imagem BLOB,
    conteudo text,
    datapublicacao datetime default current_timestamp,
    fk_autor integer,
	
    foreign key (fk_autor) references pessoa(id)
    );
    
    
    select * from pessoa;
    select * from noticia;
    SELECT titulo,conteudo,imagem,nome as autor,CONCAT(DAY(datapublicacao), '-',
    MONTH(datapublicacao), '-',
    YEAR(datapublicacao)) AS publicado 
    FROM noticia
    inner join pessoa on noticia.fk_autor=pessoa.id
    where titulo like '%AAA%';
    