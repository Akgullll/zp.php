<?php
class Product {
    public $name;
    public $description;
    public $price;

    public function __construct($name, $description, $price) {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public function display() {
        echo "<tr>";
        echo "<td>{$this->name}</td>";
        echo "<td>{$this->description}</td>";
        echo "<td>{$this->price}</td>";
        echo "</tr>";
    }
}
?>
