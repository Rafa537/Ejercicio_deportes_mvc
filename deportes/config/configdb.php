<?php
class configdb {
    private $conn;
    public function connect() {
        $this->conn = new mysqli("localhost", "root", "", "deportes");
        if ($this->conn->connect_error) {
            die("Error: " . $this->conn->connect_error);
        }
        return $this->conn;
    }
}
?>