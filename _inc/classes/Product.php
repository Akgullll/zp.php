<?php
class Product {
    public $name; // Premenná pre názov produktu
    public $description; // Premenná pre popis produktu
    public $price; // Premenná pre cenu produktu

    // Konštruktor triedy Product, ktorý inicializuje premenné na základe zadaných parametrov
    public function __construct($name, $description, $price) {
        $this->name = $name; // Priradenie hodnoty pre premennú name
        $this->description = $description; // Priradenie hodnoty pre premennú description
        $this->price = $price; // Priradenie hodnoty pre premennú price
    }

    // Metóda display() slúži na zobrazenie informácií o produkte v HTML tabuľkovom riadku
    public function display() {
        echo "<tr>"; // Začiatok riadku v HTML tabuľke
        echo "<td>{$this->name}</td>"; // Zobrazenie názvu produktu v tabuľkovom bunky
        echo "<td>{$this->description}</td>"; // Zobrazenie popisu produktu v tabuľkovom bunky
        echo "<td>{$this->price}</td>"; // Zobrazenie ceny produktu v tabuľkovom bunky
        echo "</tr>"; // Koniec riadku v HTML tabuľke
    }
}
?>
