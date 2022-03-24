USE math_match;

-- -----------------
-- stored procedures
-- -----------------

DELIMITER ##

/*guardar estudiante*/
CREATE PROCEDURE sp_guardar_estudiante(nombre varchar(30),
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
END;

/*borrar estudiante*/
CREATE PROCEDURE sp_borrar_estudiante(id int)
BEGIN
DELETE FROM estudiantes WHERE doc_id_estudiante = id;
END;

/*actualizar estudiante*/
CREATE PROCEDURE sp_actualizar_estudiante(id int,
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
END;

/*guardar docente*/
CREATE PROCEDURE sp_guardar_docente(nombre varchar(30),
apellidos varchar(30),
email varchar(80),
especialidades varchar(40),
sexo varchar(15),
telefono varchar(25),
clave varchar(30))
BEGIN
INSERT INTO docentes(nombre_docente,apellidos_docente,email_docente,especialidades,sexo_docente,telefono_docente,clave_docente) 
VALUES(nombre,apellidos,email,especialidades,sexo,telefono,clave);
END;

/*borrar docente*/
CREATE PROCEDURE sp_borrar_docente(id int)
BEGIN
DELETE FROM docentes WHERE doc_id_docente = id;
END;

/*actualizar docente*/
CREATE PROCEDURE sp_actualizar_docente(id int,
nombreU varchar(30),
apellidosU varchar(30),
emailU varchar(80),
especialidadesU varchar(40),
sexoU varchar(15),
telefonoU varchar(25),
claveU varchar(30))
BEGIN
UPDATE docentes SET nombre_docente = nombreU, apellidos_docente = apellidosU, email_docente = emailU, 
especialidades = especialidadesU, sexo_docente = sexoU, telefono_docente = telefonoU, clave_docente = claveU 
WHERE doc_id_docente= id;
END;