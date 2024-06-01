<?php

class Portfolio {

    private $products = [
        [
            "id" => 1,
            "name" => "📲",
            "description" => "iPhone is a line of smartphones designed and marketed by Apple.",
            "image" => "../assets/img/4.jpeg"
        ],
        [
            "id" => 2,
            "name" => "💻",
            "description" => "MacBook is a brand of notebook computers manufactured by Apple.",
            "image" => "../assets/img/5.jpeg"
        ],
        [
            "id" => 3,
            "name" => "🎧",
            "description" => "AirPods are wireless Bluetooth earbuds created by Apple.",
            "image" => "../assets/img/6.jpeg"
        ]
    ];

    // Metóda na renderovanie portfólia
    public function render() {
        $html = ''; // Inicializácia prázdneho reťazca

        // Prechádzanie cez každý produkt v portfóliu
        foreach ($this->products as $product) {
            // Vytvorenie HTML pre jednotlivý produkt
            $html .= '<div class="product">';
            $html .= '<a href="portfolio-update.php?id=' . $product["id"] . '"><img src="' . $product["image"] . '" alt="' . $product["name"] . '"></a>';
            $html .= '<h2><a href="portfolio-update.php?id=' . $product["id"] . '">' . $product["name"] . '</a></h2>';
            $html .= '<p>' . $product["description"] . '</p>';
            $html .= '</div>';
        }

        return $html; // Vrátenie HTML kódu pre portfólio
    }

    // Metóda na získanie produktu podľa ID
    public function getProductById($id) {
        // Prechádzanie cez každý produkt
        foreach ($this->products as $product) {
            // Ak sa nájde produkt s rovnakým ID ako je hľadané ID
            if ($product['id'] == $id) {
                return $product; // Vrátenie nájdeného produktu
            }
        }
        return null; // Ak sa produkt nenájde, vráti sa hodnota null
    }
}

?>


