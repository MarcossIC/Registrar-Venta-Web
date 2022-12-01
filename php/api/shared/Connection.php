<?php 
    define("DNS_PDO", "mysql:host=localhost:3306;dbname=ventas", false);
    define("USER", "root", false);
    define("PASS", "admin", false);

    class ConnectionPDO{
        private $connection;

        public function connect(){
            try{
                $this->connection = new PDO(DNS_PDO, USER, PASS,array(
                    PDO::ATTR_PERSISTENT => TRUE, 
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
                  ); 
             } catch(PDOException $e){
                exit("La conexión ha fallado: " . $e->getMessage());
             }
        }

        public function disconnect(){
            $this->connection = null;
        }

        public function getConnection(){
            return $this->connection;
        }
    }

?>