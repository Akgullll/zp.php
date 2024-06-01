<?php
include('partials/header.php');
// Spustenie relácie na sledovanie stavu prihlásenia používateľa 

session_start();

// Kontrola, či je používateľ prihlásený na prístup do administrátorskej časti
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Ak používateľ nie je prihlásený, presmerujeme ho na prihlasovaciu stránku
    header('Location: login.php');
    exit;
}
?>

<main>
    <section class="container">
        <div class="row">
            <div class="col-100 text-center">
                <h1>Administration Panel</h1>
                <p>Welcome, administrator!</p>
                <a href="logout.php">🧸</a>
            </div>
        </div>
    </section>
</main>

<?php
include('partials/footer.php');
?>



