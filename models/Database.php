<?php //***** CLASE PADRE DE LA BASE DE DATOS ***** */

class Database {

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

    public static function redirect($url){
        echo "<script>
            window.location = '$url';
        </script>";
    }
}

?>