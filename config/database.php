<?php 

    class Database {
        private $hostname = 'localhost';
        private $database = 'tienda_online';

        private $username = 'root'; 
        private $password = ''; 
        private $charset = 'utf8'; 
 

        function conectar () {

            try {

            $conexion = "mysql:host=" . $this->hostname .
                         "; dbname="  . $this->database .
                         "; charset=" . $this->charset;
        
        /*Esto es una configuracion para evitar, que las preparaciones que hagamos para las consultas no sean emuladas, osea que sean reales y esten seguras digamos*/ 
        
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false 

        ]; 

        /*Vamos a crear una variable, para llamar a nuestra funcion "PDO", y le vamos a pasar como dato la cadena de conexion que habiamos declarado anteriormente "$conexion"*/

        $pdo = new PDO($conexion, $this->username, $this->password, $options); 

        return $pdo; 

                } catch (PDOException $e) {
                    echo 'Error de conexion:' . $e->getMessage(); 
                    exit; 
                }

        }
    }


?>