<?php

class Page {
    private $page_name; // Privátna premenná pre názov stránky

    // Metóda pre nastavenie názvu stránky
    public function set_page_name($page_name) {
        $this->page_name = $page_name;
    }

    // Metóda pre pridanie externých štýlových súborov
    public function add_stylesheet() {
        // Preddefinované štýly
        $result = '<link rel="stylesheet" href="../assets/css/style.css">
                   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';

        // Podľa názvu stránky sa pridajú ďalšie štýly
        switch($this->page_name) {
            case 'home':
            case 'kontakt':
            case 'register':
            case 'login':
            case 'portfolio':
            case 'portfolio-update':
            case 'qna':
            case 'thankyou':
            case 'product':
                $result .= '<link rel="stylesheet" href="../assets/css/style2.css">';
                break;
        }

        return $result; // Vrátenie reťazca obsahujúceho odkazy na štýlové súbory
    }

    // Metóda pre pridanie skriptov
    public function add_scripts() {
        return '<script src="../assets/js/app.js"></script>'; // Vrátenie reťazca obsahujúceho odkaz na JavaScript súbor
    }
    
    // Metóda na presmerovanie na domovskú stránku
    public function redirect_homepage() {
        header("Location: templates/home.php"); // Presmerovanie na domovskú stránku
        die("Nepodarilo sa nájsť Domovskú stránku"); // Zastavenie ďalšieho vykonávania skriptu a výpis chyby
    }
}

?>

