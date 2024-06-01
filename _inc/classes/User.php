<?php

class User extends Database {

    private $db;

    public function __construct() {
        $this->db = $this->db_connection();
    }

    public function register($username, $email, $password) {
        try {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $data = array(
                'username' => $username,
                'email' => $email,
                'password' => $hashed_password
            );

            $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
            $query_run = $this->db->prepare($query);
            $query_run->execute($data);

            return true;
        } catch (PDOException $e) {
            throw new Exception("Registration error: " . $e->getMessage());
        }
    }

    public function login($email, $password) {
        try {
            $user = $this->getUserByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['logged_in'] = true;
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            throw new Exception("Login error: " . $e->getMessage());
        }
    }

    private function getUserByEmail($email) {
        $data = array(
            'email' => $email
        );

        $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $query_run = $this->db->prepare($query);
        $query_run->execute($data);

        return $query_run->fetch(PDO::FETCH_ASSOC);
    }
}

?>


