<?php 

class CRUD {

    //Se declaran los atributos para la conexión con la base de datos, en el constructor se efectúa la conexión
    private $host = "localhost";
    private $username = "root";
    private $pass = "";
    private $db = "math_match";
    public $conn;

    public function __construct(){
        $this->conn = mysqli_connect($this->host,$this->username,$this->pass,$this->db); //Conexión con la base de datos
        if (!$this->conn){
            echo "Problemas al conectar con la base de datos ".mysqli_connect_error();
            exit();
        }
    }

    public function verifyEmail($email){
        $verify1 = "SELECT email_estudiante FROM estudiantes WHERE email_estudiante = '$email'";
        $verify2 = "SELECT email_docente FROM docentes WHERE email_docente = '$email'";
        $query1 = mysqli_query($this->conn,$verify1);
        $query2 = mysqli_query($this->conn,$verify2);
        if (mysqli_num_rows($query1) > 0 || mysqli_num_rows($query2) > 0){
            return false;
        } else {
            return true;
        }
    }

    //Métodos insertar (create)
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

    //Método actualizar (update)
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

    //Método borrar (delete)
    public function deleteStudent($id){
        $delete = "DELETE FROM estudiantes WHERE doc_id_estudiante = $id";
        $query = mysqli_query($this->conn,$delete);
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

    public function logIn($user,$password){
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

    public static function redirect($url){
        echo "<script>
            window.location = '$url';
        </script>";
    }
}

?>