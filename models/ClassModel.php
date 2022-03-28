<?php 

class ClassModel extends Database {

    public function createClass($name, $culm, $desc, $teacher, $type){
        $sql = "INSERT INTO clases(nombre_clase, vigente_hasta, descripcion_clase, docente_rige, tipo_clase)
        VALUES ('$name','$culm','$desc','$teacher','$type')";
        $query = mysqli_query($this->conn, $sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function getTeacherClasses($id){
        $query = mysqli_query($this->conn, "SELECT id_clase, nombre_clase, fecha_creacion_clase, vigente_hasta, tipo_clase
        FROM clases WHERE docente_rige = $id");
        return $query;
    }

    public function searchClasses($request){
        $query = mysqli_query($this->conn, "SELECT nombre_clase, tipo_clase, descripcion_clase, nombre_docente, id_clase 
        FROM clases INNER JOIN docentes ON clases.docente_rige = docentes.doc_id_docente
        WHERE nombre_clase LIKE '%$request%'");
        return $query;
    }

    public function joinClass($studentId, $classId){
        $sql = "INSERT INTO estudiante_clase(clase, estudiante) VALUES ($classId, $studentId)";
        $query = mysqli_query($this->conn, $sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function verifyIfAlreadyInClass($classId, $studentId){
        $sql = "SELECT * FROM estudiante_clase WHERE clase = $classId AND estudiante = $studentId";
        $query = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($query) > 0) {
            return true;
        } else {
            return false;
        }
    }

}

?>