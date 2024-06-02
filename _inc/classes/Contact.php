<?php
/* Môžeme vytvoriť tabuľku pomocou vzorca
CREATE TABLE `contact` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `email` VARCHAR(120) NOT NULL,
  `message` TEXT NOT NULL,
  `acceptance` INT(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
*/
// Pripojenie k databáze a definícia triedy Contact
include_once('_inc/classes/Database.php');

class Contact extends Database
{
    private $db;

    public function __construct()
    {
        $this->db = $this->db_connection();
    }

    // Vytvorenie nového kontaktu
    public function create($name, $email, $message, $acceptance)
    {
        try {
            $query = "INSERT INTO contact (name, email, message, acceptance) VALUES (:name, :email, :message, :acceptance)";
            $stmt = $this->db->prepare($query);
            $stmt->execute(array(
                ':name' => $name,
                ':email' => $email,
                ':message' => $message,
                ':acceptance' => $acceptance
            ));
            return true; // Vracia true pri úspešnom vykonaní operácie
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false; // Vracia false v prípade chyby
        }
    }

    // Získanie všetkých kontaktov
    public function select()
    {
        try {
            $query = "SELECT * FROM contact";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Vracia pole so všetkými kontaktmi
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Aktualizácia kontaktu
    public function update($id, $name, $email, $message, $acceptance)
    {
        try {
            $query = "UPDATE contact SET name = :name, email = :email, message = :message, acceptance = :acceptance WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->execute(array(
                ':name' => $name,
                ':email' => $email,
                ':message' => $message,
                ':acceptance' => $acceptance,
                ':id' => $id
            ));
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Vymazanie kontaktu
    public function delete($id)
    {
        try {
            $query = "DELETE FROM contact WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->execute(array(':id' => $id));
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Získanie jedného kontaktu podľa ID
    public function select_single($id)
    {
        try {
            $query = "SELECT * FROM contact WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->execute(array(':id' => $id));
            return $stmt->fetch(PDO::FETCH_ASSOC); // Vracia údaje jedného kontaktu
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
?>


