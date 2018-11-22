CREATE DATABASE liga;

ALTER DATABASE liga charset=utf8;

USE liga;



CREATE TABLE ciudad(
    nombre VARCHAR(255) PRIMARY KEY
);

CREATE TABLE equipo(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255),
	ciudad VARCHAR(255),
    pj INT DEFAULT 0,
    pg INT DEFAULT 0,
    pe INT DEFAULT 0,
    pp INT DEFAULT 0,
	gf INT DEFAULT 0,
	ge INT DEFAULT 0,
    puntos INT DEFAULT 0,
	FOREIGN KEY (ciudad) REFERENCES ciudad(nombre)
);

CREATE TABLE partido(
    elocal INT,
    evisitante INT,
    glocal INT,
    gvisitante INT,
    PRIMARY KEY (elocal, evisitante),
    FOREIGN KEY (elocal) REFERENCES equipo(id),
    FOREIGN KEY (evisitante) REFERENCES equipo(id)
);

CREATE TABLE usuario(
    nombre VARCHAR(255) PRIMARY KEY,
    clave VARCHAR(32),
    email VARCHAR(255)
);

INSERT INTO ciudad VALUES ('Sevilla');
INSERT INTO ciudad VALUES ('Almeria');
INSERT INTO ciudad VALUES ('Cordoba');
INSERT INTO ciudad VALUES ('Granada');
INSERT INTO ciudad VALUES ('Huelva');
INSERT INTO ciudad VALUES ('Cadiz');
INSERT INTO ciudad VALUES ('Jaen');
INSERT INTO ciudad VALUES ('Malaga');