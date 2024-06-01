<?php

class Database {

    private $host = 'localhost';
    private $db_name = 'app';
    private $user_name = 'root';
    private $password = '';

    protected $connection;

    public function __destruct() {
        $this->connection = null;
    }

    protected function db_connection() {
        try {
            $this->connection = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8",
                $this->user_name,
                $this->password
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

            return $this->connection;
        } catch (PDOException $e) {
            echo "Chyba pri registrácii: " . $e->getMessage();
                return false;
            }
    }
}
?>
