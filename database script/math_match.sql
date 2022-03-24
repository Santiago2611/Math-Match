CREATE DATABASE IF NOT EXISTS math_match;
USE math_match;

CREATE TABLE clases(
  id_clase int AUTO_INCREMENT PRIMARY KEY,
  nombre_clase varchar(40) NOT NULL,
  fecha_creacion_clase timestamp,
  vigente_hasta date NOT NULL,
  descripcion_clase varchar(100),
  docente_rige int NOT NULL
);

CREATE TABLE docentes(
  doc_id_docente int AUTO_INCREMENT PRIMARY KEY,
  nombre_docente varchar(30) NOT NULL,
  apellidos_docente varchar(30) NOT NULL,
  email_docente varchar(80) NOT NULL,
  especialidades varchar(40) DEFAULT NULL,
  fecha_reg_docente timestamp,
  sexo_docente varchar(15),
  telefono_docente varchar(25) NOT NULL,
  clave_docente varchar(30) NOT NULL
); 

CREATE TABLE documentos_mochila(
  id_documento int AUTO_INCREMENT PRIMARY KEY,
  mochila int NOT NULL,
  fecha_subida_doc timestamp
);

CREATE TABLE estudiantes(
  doc_id_estudiante int AUTO_INCREMENT PRIMARY KEY,
  nombre_estudiante varchar(30) NOT NULL,
  apellidos_estudiante varchar(30) NOT NULL,
  fecha_nac_estudiante date NOT NULL,
  grado_estudiante int NOT NULL,
  email_estudiante varchar(80) NOT NULL,
  clave_estudiante varchar(35) NOT NULL,
  fecha_reg_estudiante timestamp,
  sexo_estudiante varchar(15)
);

CREATE TABLE estudiante_clase(
  id_estudiante_clase int AUTO_INCREMENT PRIMARY KEY,
  clase int NOT NULL,
  estudiante int NOT NULL,
  fecha_ingreso timestamp
);

CREATE TABLE estudiante_juego(
  id_estudiante_juego int AUTO_INCREMENT PRIMARY KEY,
  juego int NOT NULL,
  estudiante int NOT NULL,
  nivel_actual int NOT NULL
);

CREATE TABLE juegos(
  id_juego int AUTO_INCREMENT PRIMARY KEY,
  nombre_juego varchar(20) NOT NULL,
  descripcion_juego varchar(30),
  instrucciones varchar(80),
  tema_juego varchar(25)
);

CREATE TABLE mochilas(
  id_mochila int AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE videos(
  id_video int AUTO_INCREMENT PRIMARY KEY,
  titulo varchar(60) DEFAULT "Sin titulo",
  descripcion_video varchar(100) DEFAULT "No hay descripcion",
  miniatura blob,
  fecha_subida timestamp,
  clase int NOT NULL
);

CREATE TABLE administradores(
	id_admin int AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario varchar(30),
    email_admin varchar(80),
    clave_admin varchar(35)
);

-- --------------------------
-- creación de foráneas 
-- --------------------------
ALTER TABLE clases
ADD FOREIGN KEY (docente_rige) REFERENCES docentes(doc_id_docente);

ALTER TABLE documentos_mochila
ADD FOREIGN KEY (mochila) REFERENCES mochilas(id_mochila);

ALTER TABLE estudiante_clase
ADD FOREIGN KEY (clase) REFERENCES clases(id_clase),
ADD FOREIGN KEY (estudiante) REFERENCES estudiantes(doc_id_estudiante);

ALTER TABLE estudiante_juego
ADD FOREIGN KEY (juego) REFERENCES juegos(id_juego),
ADD FOREIGN KEY (estudiante) REFERENCES estudiantes(doc_id_estudiante);

ALTER TABLE videos
ADD FOREIGN KEY (clase) REFERENCES clases(id_clase);

-- -------------------
-- Creación de vistas
-- -------------------

CREATE VIEW datos_estudiante AS 
SELECT * FROM estudiantes;

CREATE VIEW datos_docente AS
SELECT * FROM docentes;

CREATE VIEW clase_docente AS
SELECT nombre_clase, doc_id_docente, nombre_docente FROM clases INNER JOIN docentes 
ON docentes.doc_id_docente = clases.docente_rige;

CREATE VIEW estudiantes_regi AS
SELECT COUNT(doc_id_estudiante) AS "Cantidad de estudiantes registrados" FROM estudiantes;

CREATE VIEW docs_mochila AS
SELECT id_mochila,COUNT(id_documento) AS "Numero de documentos" FROM mochilas INNER JOIN documentos_mochila 
ON id_mochila = documentos_mochila.mochila;