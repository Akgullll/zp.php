<?php
include_once('partials/header.php');// Vloženie hlavičky
?>    
<main>
    <?php
    $headings = array('APPLE', 'APPLE','APPLE'); // Nastavenie nadpisov pre prezentáciu
    $img_folder = '../assets/img/carus/';  // Určenie adresára so zobrazeniami
    $slider = new Slider(); // Vytvorenie novej inštancie triedy Slider
    $slider->set_headings($headings);  // Nastavenie nadpisov pre zobrazenia
    $slider->set_img_folder($img_folder); // Nastavenie adresára so zobrazeniami pre prezentáciu
    echo $slider->generate_slides();// Generovanie HTML pre prezentáciu a výpis na stránku
    ?>
</main>
<?php
include_once('partials/footer.php');//Vloženie päty
?> 
