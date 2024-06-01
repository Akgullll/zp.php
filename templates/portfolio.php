<?php
include('partials/header.php');
include('_inc/classes/Portfolio.php');

$portfolio = new Portfolio();

?>

<main>
    <section class="container">
        <?php echo $portfolio->render(); ?>
    </section>
</main>

<?php include_once('partials/footer.php'); ?>


