<?php 
class ClassModel extends Database {

    public function createClass($name, $culm, $desc, $teacher,$tipo,$codigo){
        $sql = "INSERT INTO clases(nombre_clase, vigente_hasta, descripcion_clase, docente_rige,codigo_clase,tipo_clase)
        VALUES ('$name','$culm','$desc','$teacher','$codigo','$tipo')";
        $query = mysqli_query($this->conn, $sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function verClass(){
        $id = $_SESSION["id"];
        $sql = mysqli_query($this->conn,("SELECT id_clase, nombre_clase, fecha_creacion_clase, vigente_hasta, codigo_clase, tipo_clase
        FROM clases WHERE docente_rige = $id"));
        return $sql;
    }

}

?>