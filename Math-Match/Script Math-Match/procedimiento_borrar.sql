CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_borrar_estudiante`(id int)
BEGIN
DELETE FROM estudiantes WHERE doc_id_estudiante = id;

END