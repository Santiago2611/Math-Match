<?php 

class TeacherModel extends Database {

    public function insertTeacher($name,$lastName,$email,$specialties,$gender,$tel,$password){
        $insert = "INSERT INTO docentes(nombre_docente,apellidos_docente,email_docente,especialidades,sexo_docente,telefono_docente,clave_docente) 
        VALUES ('$name','$lastName','$email','$specialties','$gender','$tel','$password')";
        $query = mysqli_query($this->conn,$insert);
        if ($query){
            return true;
        } else {
            return false;
        }
    }

    public function updateTeacher($id,$name,$lastName,$email,$password){
        $update = "UPDATE * FROM docentes SET nombre_docente = $name, apellidos_docente = $lastName, email_docente = $email,
        clave_docente = $password WHERE doc_id_docente = $id";
        $query = mysqli_query($this->conn,$update);
        if ($query){
            return true;
        } else {
            return false;
        }
    }

    public function deleteTeacher($id){
        $delete = "DELETE FROM docentes WHERE doc_id_docente = $id";
        $query = mysqli_query($this->conn,$delete);
        if ($query){
            return true;
        } else {
            return false;
        }
    }

}

?>