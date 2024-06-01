<?php
include_once('partials/header.php');
?>    
<main>
    <?php
    $headings = array('APPLE', 'APPLE','APPLE');
    $img_folder = '../assets/img/carus/';
    $slider = new Slider();
    $slider->set_headings($headings);
    $slider->set_img_folder($img_folder);
    echo $slider->generate_slides();
    ?>
</main>
<?php
include_once('partials/footer.php');
?> 
  