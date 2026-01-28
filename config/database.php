<?php
class Database {
    private $host = "mysql";   // NOME DO SERVIÇO (não localhost)
    private $db_name = "api_db";
    private $username = "root";
    private $password = "root";
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name};charset=utf8",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro na ligação PDO: " . $e->getMessage());
        }

        return $this->conn;
    }
}
?>