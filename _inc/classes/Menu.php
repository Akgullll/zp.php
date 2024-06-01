<?php

class Menu{

    private $pages; // Premenná pre uchovávanie zoznamu stránok a ich URL adries

    public function __construct($pages){
        $this->pages = $pages; // Inicializácia premenné $pages v konštruktore
    }

    // Metóda na generovanie navigačného menu
    function generate_menu(): string{
        $menu_items = ''; // Inicializácia premennej pre uloženie jednotlivých položiek menu
        
        // Prechádzanie cez zoznam stránok a ich URL adries
        foreach($this->pages as $page_name => $page_url){
            // Vytvorenie HTML kódu pre každú stránku ako odkaz s názvom a URL adresou
            $menu_items .= '<li><a href="' . $page_url . '">' . $page_name . '</a></li>';
        }
    
        return $menu_items; // Vrátenie reťazca obsahujúceho kompletné navigačné menu
    }
}

?>
