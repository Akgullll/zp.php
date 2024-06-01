<?php
include('partials/header.php');
include_once('_inc/classes/Qna.php');

?>

<main>
    <section class="container">
    <?php
    $qna_object = new Qna();
    echo $qna_object->getQnaHTML();
    ?>
    
    </section>
</main>

<?php
include_once('partials/footer.php');
?>

