<?php 

class StudentModel extends Database {

    public function insertStudent($name,$lastName,$email,$password,$gender,$grade,$birthDate){
        $insert = "INSERT INTO estudiantes(nombre_estudiante,apellidos_estudiante,email_estudiante,clave_estudiante,fecha_nac_estudiante,
        grado_estudiante,sexo_estudiante) VALUES ('$name','$lastName','$email','$password','$birthDate',$grade,'$gender')";
        $query = mysqli_query($this->conn,$insert);
        if ($query){
            return true;
        } else {
            return false;
        }
    }

    public function updateStudent($id,$name,$lastName,$email,$password){
        $update = "UPDATE * FROM estudiantes SET nombre_estudiante = $name, apellidos_estudiante = $lastName, email_estudiante = $email,
        clave_estudiante = $password WHERE doc_id_estudiante = $id";
        $query = mysqli_query($this->conn,$update);
        if ($query){
            return true;
        } else {
            return false;
        }
    }

    public function deleteStudent($id){
        $delete = "DELETE FROM estudiantes WHERE doc_id_estudiante = $id";
        $query = mysqli_query($this->conn,$delete);
        if ($query){
            return true;
        } else {
            return false;
        }
    }

}

?>