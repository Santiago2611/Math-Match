CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_guardar_estudiante`(nombre varchar(30),
apellidos varchar(30),
fecha_nac date,
grado int,
email varchar(80),
clave varchar(35),
sexo varchar(15))
BEGIN
INSERT INTO estudiantes(nombre_estudiante,apellidos_estudiante,fecha_nac_estudiante,grado_estudiante,
email_estudiante,clave_estudiante,sexo_estudiante) VALUES(nombre,apellidos,fecha_nac,
grado,email,clave,sexo);

END