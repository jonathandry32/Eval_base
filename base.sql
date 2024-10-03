create database laracroft;
use laracroft;

create table Users(
  idUser int primary key auto_increment,
  name varchar(50),
  email varchar(50),
  password varchar(255)
) ENGINE = InnoDB;

create table Services(
  idService int primary key auto_increment,
  nom varchar(50)
) ENGINE = InnoDB;