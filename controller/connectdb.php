<?php
    class connectdb
    {
        private $localhost;
        private $username;
        private $password;
        private $database;
        public function __construct($localhost="localhost", $username="root", $password="", $database="DB")
        {
            $this->localhost = $localhost;
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;
        }
        public function getLocalhost()
        {
            return $this->localhost;
        }
        public function getUsername()
        {
            return $this->username;
        }
        public function getPassword()
        {
            return $this->password;
        }
        public function getDatabase()
        {
            return $this->database;
        }

        public function get_connection()
        {
            $conn = new  mysqli($this->localhost, $this->username, $this->password, $this->database);
            mysqli_set_charset($conn, 'utf-8');
            if ($conn->connect_error)
            {
                echo "Failed to connect to MySQL: ". var_dump($conn->connect_error);
                die();
            }
            else
            {
                return $conn;
            }
        }
        public function run_query($query)
        {
            $conn = $this->get_connection();
            $result = mysqli_query($conn, $query) or die("fail to run_query: $query");
            $conn->close();
            if($result){
                return $result;
            }
        }
    }
?>
