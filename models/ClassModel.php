<?php 

class ClassModel extends Database {

    public function createClass($name, $culm, $desc, $teacher){
        $sql = "INSERT INTO clases(nombre_clase, vigente_hasta, descripcion_clase, docente_rige)
        VALUES ('$name','$culm','$desc','$teacher')";
        $query = mysqli_query($this->conn, $sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

}

?>