<?php

include('partials/header.php');


if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true){
    header('Location: login.php');
    exit; 
}
?>

<main>
    <section class="container">
        <div class="row">
            <div class="col-100 text-center">
                <h1>Administration panel</h1>
                <p>Welcome, administrator!</p>
                <a href="logout.php">🧸</a>
            </div>
        </div>
    </section> 
</main>

<?php

include('partials/footer.php');
?>


