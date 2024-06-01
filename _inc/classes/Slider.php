<?php
class Slider {
    private $headings = [];
    private $img_folder = '';

    public function set_headings(array $headings) {
        $this->headings = $headings;
    }

    public function set_img_folder(string $img_folder) {
        $this->img_folder = $img_folder;
    }

    public function generate_slides() {
        $result = '<section class="slides-container">';
        $img_files = glob($this->img_folder . '*.png');
        $heading_count = count($this->headings);
        for ($i = 0; $i < count($img_files); $i++) {
            $result .= '<div class="slide fade">
                        <img src="' . $img_files[$i] . '">
                        <div class="slide-text">';
            if ($heading_count == count($img_files)) {
                $result .= $this->headings[$i];
            } else {
                if ($i < $heading_count) {
                    $result .= $this->headings[$i];
                }
            }
            $result .= '</div> 
                        </div>';
        }
        $result .= '<a id="prev" class="prev">❮</a>
        <a id="next" class="next">❯</a>
        </section>';
        return $result;
    }
}
?>

