<?php
/* Môžeme vytvoriť tabuľku pomocou vzorca
CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(120) NOT NULL,
  `message` text NOT NULL,
  `acceptance` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;*/


class Contact extends Database {

    private $db;

    public function __construct() {
        $this->db = $this->db_connection();
    }

    public function insert() {
        // Overenie, či existuje pripojenie k databáze
        if ($this->db) {
            // Spracovanie dát z formulára
            if (isset($_POST['contact_submitted'])) {
                $data = array(
                    'contact_name' => $_POST['name'],
                    'contact_email' => $_POST['email'],
                    'contact_message' => filter_var($_POST['message'], FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                    'contact_acceptance' => $_POST['acceptance'],
                );

                try {
                    // Pripravenie a vykonanie SQL dotazu pre vloženie kontaktu do databázy
                    $query = "INSERT INTO contact (name, email, message, acceptance) 
                              VALUES (:contact_name, :contact_email, :contact_message, :contact_acceptance)";
                    $query_run = $this->db->prepare($query);
                    $query_run->execute($data);
                } catch (PDOException $e) {
                    echo $e->getMessage(); // Výpis chybovej správy v prípade chyby
                }
            }
        } else {
            echo 'No connection'; // Výpis správy v prípade chyby pripojenia k databáze
        }
    }

    public function select() {
        try {
            // Vykonanie SQL dotazu na výber všetkých kontaktov z tabuľky contact
            $sql = "SELECT * FROM contact";
            $query = $this->db->query($sql);
            $contacts = $query->fetchAll(); // Získanie výsledkov dotazu
            return $contacts; // Vrátenie všetkých kontaktov
        } catch (PDOException $e) {
            echo $e->getMessage(); // Výpis chybovej správy v prípade chyby
        }
    }

    public function delete($contact_id) {
        try {
            // Pripravenie a vykonanie SQL dotazu na vymazanie kontaktu z databázy podľa zadaného ID
            $data = array(
                'contact_id' => $contact_id
            );
            $query = "DELETE FROM contact WHERE id = :contact_id";
            $query_run = $this->db->prepare($query);
            $query_run->execute($data);
        } catch (PDOException $e) {
            echo $e->getMessage(); // Výpis chybovej správy v prípade chyby
        }
    }
    

}
?>

