<?php
include('partials/header.php');
?>

<main>
    <section class="container">
        <div class="row">
            <div class="col-100 text-center">
                <?php
                // Odhlásenie používateľa z aktuálnej relácie
                unset($_SESSION['logged_in']);
                unset($_SESSION['is_admin']);
                ?>
                <p>You have been logged out.</p>
                <p><a href="login.php">🧸</a> <-Click here to login again.</p>
            </div>
        </div>
    </section> 
</main>

<?php
include('partials/footer.php');
?>


