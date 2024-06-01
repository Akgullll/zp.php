<?php
class Slider {
    private $headings = [];
    private $img_folder = '';

    // Metóda set_headings() nastavuje zoznam nadpisov pre slider
    public function set_headings(array $headings) {
        $this->headings = $headings;
    }

    // Metóda set_img_folder() nastavuje cestu k adresáru so zobrazenými obrázkami
    public function set_img_folder(string $img_folder) {
        $this->img_folder = $img_folder;
    }

    // Metóda generate_slides() generuje HTML pre zobrazenie slidera
    public function generate_slides() {
        $result = '<section class="slides-container">'; // Začiatok sekcie pre zobrazenie slidera
        $img_files = glob($this->img_folder . '*.png'); // Získanie všetkých PNG obrázkov z adresára
        $heading_count = count($this->headings); // Počet nadpisov

        // Iterácia cez všetky obrázky
        for ($i = 0; $i < count($img_files); $i++) {
            $result .= '<div class="slide fade">'; // Začiatok jedného slidera
            $result .= '<img src="' . $img_files[$i] . '">'; // Zobrazenie obrázka
            $result .= '<div class="slide-text">'; // Začiatok divu pre text slidera

            // Podmienka kontroluje, či je počet nadpisov rovnaký ako počet obrázkov
            if ($heading_count == count($img_files)) {
                $result .= $this->headings[$i]; // Zobrazenie nadpisu
            } else {
                // Ak nie, kontroluje sa, či existuje nadpis pre aktuálny obrázok
                if ($i < $heading_count) {
                    $result .= $this->headings[$i]; // Zobrazenie nadpisu
                }
            }
            $result .= '</div>'; // Koniec divu pre text slidera
            $result .= '</div>'; // Koniec jedného slidera
        }
        // Pridanie navigačných tlačidiel pre slider
        $result .= '<a id="prev" class="prev">❮</a>
                    <a id="next" class="next">❯</a>
                    </section>'; // Koniec sekcie pre zobrazenie slidera
        return $result; // Vrátenie vygenerovaného HTML kódu slidera
    }
}
?>

