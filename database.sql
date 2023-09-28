create user 'contactojoven14092023'@localhost IDENTIFIED by 'xXBp{]35NM9S';


create database CONTACTO_JOVEN;
use CONTACTO_JOVEN;

create table USUARIOS (
  `ID_USUARIO` INT auto_increment not null primary key,
  `EMAIL` VARCHAR(100) not null,
  `PASSWORD` VARCHAR(255) not null,
  `ACTIVO` TINYINT(1) not null DEFAULT 1
) CHARACTER SET utf8;

create table CONTABILIDAD_DE_CASOS (
`ID_CASOS` INT auto_increment not null primary key,
`SECTOR_DE_LA_POBLACION` VARCHAR (255) not null,
`NUMERO_DE_CASOS` VARCHAR (50) not null, 
`ANIO` VARCHAR (50) not null,
`IMAGEN_CASOS` VARCHAR (50) not null,
`ACTIVO` TINYINT(1) not null DEFAULT 1
) CHARACTER SET utf8;

create table HORARIOS_DE_ATENCION (
`ID_HORARIO` INT auto_increment not null primary key,
`HORARIO_DE_ATENCION` TEXT not null
) CHARACTER SET utf8;

create table INFORMACION_DE_CONTACTO (
`ID_CONTACTO` INT auto_increment not null primary key,
`LINK` VARCHAR (255) not null,
`TELEFONO` VARCHAR (20) not null,
`CONTACTO` TEXT not null
) CHARACTER SET utf8;

create table QR_CODE (
  `ID_QR` INT auto_increment not null primary key,
  `CODIGO_QR` VARCHAR (255) not null
) CHARACTER SET utf8;

create table TOLLKIT (
`ID_TOLLKIT` INT auto_increment not null primary key,
`TITULO_MANUAL` VARCHAR (255) not null,
`DESCRIPCION_MANUAL` TEXT not null,
`MANUAL_PDF` VARCHAR (255) not null,
`PORTADA_MANUAL` VARCHAR (255) not null,
`ACTIVO` TINYINT(1) not null DEFAULT 1
)CHARACTER SET utf8;

grant select, insert, update, delete on contacto_joven.* to 'contactojoven14092023'@localhost;

INSERT INTO `usuarios`(`EMAIL`, `PASSWORD`) VALUES ('pruebas@imjuventud.gob.mx','$2y$10$fKZ76lJf3EYeSWXm/RKhAOKmHXObCy0zFsLJv1CSsCZxwN7UU4zNq');

INSERT INTO `informacion_de_contacto`(`LINK`, `TELEFONO`, `CONTACTO`) VALUES ('https://www.google.com.mx/','55 7900 9669','Envía la palabra “CONTACTO” por WhatsApp al');

INSERT INTO `horarios_de_atencion`(`HORARIO_DE_ATENCION`) VALUES ('Lunes a viernes de 10:00 a 14:00 hrs
y de 16:00 a 20:00 hrs.');

INSERT INTO `qr_code`(`CODIGO_QR`) VALUES ('../public/qr.png');

INSERT INTO `contabilidad_de_casos`(`SECTOR_DE_LA_POBLACION`, `NUMERO_DE_CASOS`, `ANIO`, `IMAGEN_CASOS`) 
VALUES ('Casos acumulados','76,868','2021 - 2023','../public/recurso19.png'),
('Casos del año en curso','5,515','2023','../public/recurso35.png'),
('Casos de mujeres','3,315','2023','../public/recurso19.png'),
('Casos de hombres','2,200','2023','../public/recurso18.png');