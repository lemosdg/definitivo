DROP DATABASE IF EXISTS gamelist;
CREATE DATABASE gamelist;
USE gamelist;

DROP TABLE IF EXISTS juego;
CREATE TABLE juego (
  idJuego int NOT NULL AUTO_INCREMENT,
  Nombre varchar(45) NOT NULL UNIQUE,
  FechaLanzamiento date NOT NULL,
  Desarrolladora varchar(45) NOT NULL,
  Descripcion varchar(45) DEFAULT NULL,
  Saga varchar(45) DEFAULT NULL,
  ImgJuego varchar(500) DEFAULT NULL,
  PRIMARY KEY (idJuego)
);

DROP TABLE IF EXISTS rol_usuario;
CREATE TABLE rol_usuario (
  idRol int NOT NULL AUTO_INCREMENT,
  Nombre varchar(45) NOT NULL,
  PRIMARY KEY (idRol)
);

DROP TABLE IF EXISTS usuario;
CREATE TABLE usuario (
  idUsuario int NOT NULL AUTO_INCREMENT,
  Nombre varchar(45) NOT NULL UNIQUE,
  Correo varchar(256) NOT NULL UNIQUE,
  Clave varchar(45) NOT NULL,
  ImgUsuario varchar(500) DEFAULT NULL,
  Rol_Usuario_idRol int NOT NULL,
  PRIMARY KEY (idUsuario,Rol_Usuario_idRol),
  KEY fk_Usuario_Rol_Usuario1_idx (Rol_Usuario_idRol),
  CONSTRAINT fk_Usuario_Rol_Usuario1 FOREIGN KEY (Rol_Usuario_idRol) REFERENCES rol_usuario (idRol)
);

DROP TABLE IF EXISTS juego_has_usuario;
CREATE TABLE juego_has_usuario (
  Juego_idJuego int NOT NULL,
  Usuario_idUsuario int NOT NULL,
  Nota double DEFAULT NULL,
  Estado varchar(45) DEFAULT NULL,
  PRIMARY KEY (Juego_idJuego,Usuario_idUsuario),
  KEY fk_Juego_has_Usuario_Usuario1_idx (Usuario_idUsuario),
  KEY fk_Juego_has_Usuario_Juego_idx (Juego_idJuego),
  CONSTRAINT fk_Juego_has_Usuario_Juego FOREIGN KEY (Juego_idJuego) REFERENCES juego (idJuego),
  CONSTRAINT fk_Juego_has_Usuario_Usuario1 FOREIGN KEY (Usuario_idUsuario) REFERENCES usuario (idUsuario)
);

INSERT INTO rol_usuario VALUES (1,'admin'),(2,'mod'),(3,'pleb');
