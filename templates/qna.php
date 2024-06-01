<?php
include('partials/header.php');
include_once('_inc/classes/Qna.php');

?>

<main>
    <section class="container">
    <?php
    $qna_object = new Qna();// Vytvorenie inštancie triedy Qna
    echo $qna_object->getQnaHTML();// Získanie HTML pre Q&A a jeho zobrazenie
    ?>
    
    </section>
</main>

<?php
include_once('partials/footer.php');
?>


