<?php
/* Môžeme vytvoriť tabuľku pomocou vzorca
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;*/


class User extends Database {

    private $db;

    // Konštruktor inicializuje pripojenie k databáze
    public function __construct() {
        $this->db = $this->db_connection();
    }

    // Metóda register() registruje nového používateľa
    public function register($username, $email, $password) {
        try {
            // Hashovanie hesla
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $data = array(
                'username' => $username,
                'email' => $email,
                'password' => $hashed_password
            );

            // Pripravenie a vykonanie SQL dotazu na vloženie nového používateľa
            $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
            $query_run = $this->db->prepare($query);
            $query_run->execute($data);

            return true; // Úspešné zaregistrovanie
        } catch (PDOException $e) {
            throw new Exception("Registration error: " . $e->getMessage()); // Chyba pri registrácii
        }
    }

    // Metóda login() prihlasuje používateľa
    public function login($email, $password) {
        try {
            // Získanie používateľa podľa emailu
            $user = $this->getUserByEmail($email);

            // Overenie hesla
            if ($user && password_verify($password, $user['password'])) {
                // Nastavenie session premenných pri úspešnom prihlásení
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['logged_in'] = true;
                return true; // Úspešné prihlásenie
            } else {
                return false; // Nesprávne prihlasovacie údaje
            }
        } catch (PDOException $e) {
            throw new Exception("Login error: " . $e->getMessage()); // Chyba pri prihlasovaní
        }
    }

    // Privátna metóda getUserByEmail() získava používateľa podľa emailu
    private function getUserByEmail($email) {
        $data = array(
            'email' => $email
        );

        // Pripravenie a vykonanie SQL dotazu na získanie používateľa podľa emailu
        $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $query_run = $this->db->prepare($query);
        $query_run->execute($data);

        return $query_run->fetch(PDO::FETCH_ASSOC); // Vrátenie výsledkov dotazu
    }
}

?>


