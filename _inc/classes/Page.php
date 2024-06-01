<?php

class Page {
    private $page_name;

    public function set_page_name($page_name) {
        $this->page_name = $page_name;
    }

    public function add_stylesheet() {
        $result = '<link rel="stylesheet" href="../assets/css/style.css">
                   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';

        
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

        return $result;
    }

    public function add_scripts() {
       
        return '<script src="../assets/js/app.js"></script>';
    }
    
    public function redirect_homepage() {
        header("Location: templates/home.php");
        die("Nepodarilo sa nájsť Domovskú stránku");
    }
}
?>

