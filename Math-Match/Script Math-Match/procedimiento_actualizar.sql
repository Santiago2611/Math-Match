CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_estudiante`(id int,
nombre varchar(30),
apellidos varchar(30),
fecha_nac date,
grado int,
email varchar(80),
clave varchar(35),
sexo varchar(15))
BEGIN
UPDATE estudiantes SET nombre_estudiante = nombre,apellidos_estudiante = apellidos,
fecha_nac_estudiante = fecha_nac,grado_estudiante = grado,email_estudiante = email,
clave_estudiante = clave,sexo_estudiante = sexo WHERE doc_id_estudiante = id;

END