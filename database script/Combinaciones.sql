USE MATH_MATCH;
SELECT NOMBRE_CLASE,FECHA_CREACION_CLASE
FROM CLASES AS CLAS
RIGHT JOIN DOCENTES AS E
ON CLAS.ID_CLASE = E.DOC_ID_DOCENTE;

SELECT NOMBRE_CLASE,FECHA_CREACION_CLASE
FROM CLASES AS CLAS
LEFT JOIN DOCENTES AS E
ON CLAS.ID_CLASE = E.DOC_ID_DOCENTE;

SELECT NOMBRE_CLASE, FECHA_CREACION_CLASE,DOC_ID_DOCENTE
FROM CLASES
CROSS JOIN DOCENTES;
