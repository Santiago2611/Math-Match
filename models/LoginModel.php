<?php 

class LoginModel extends Database{
    
    public function studentLogIn($user,$password){
        $search = "SELECT * FROM estudiantes WHERE email_estudiante = '$user' AND clave_estudiante = '$password'";
        $query = mysqli_query($this->conn,$search);
        if (mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_array($query);
            session_start();
            $_SESSION['id'] = $row[0];
            $_SESSION['name'] = $row[1];
            return true;
        } else {
            return false;
        }
    }

    public function teacherLogIn($user,$password){
        $search = "SELECT * FROM docentes WHERE email_docente = '$user' AND clave_docente = '$password'";
        $query = mysqli_query($this->conn,$search);
        if (mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_array($query);
            session_start();
            $_SESSION['id'] = $row[0];
            $_SESSION['name'] = $row[1];
            return true;
        } else {
            return false;
        }
    }
    public function adminLogIn($user,$password){
        $search = "SELECT * FROM administradores WHERE email_admin = '$user' AND clave_admin = '$password'";
        $query = mysqli_query($this->conn,$search);
        if (mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_array($query);
            session_start();
            $_SESSION['id'] = $row[0];
            $_SESSION['name'] = $row[1];
            return true;
        } else {
            return false;
        }
    }

}

?>