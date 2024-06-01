<?php
include('partials/header.php');
include('_inc/classes/User.php'); 

session_start();// Spustenie relácie

$user = new User();// Vytvorenie inštancie triedy User

$error_message = '';// Premenná pre chybovú správu

// Overenie, či bol odoslaný požiadavok metódou POST a či bol odoslaný formulár s prihlasovacími údajmi
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_user'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Overenie prihlasovacích údajov
    if ($user->login($email, $password)) {

        // Ak sú prihlasovacie údaje správne, nastavíme reláciu a presmerujeme na administračnú časť
        $_SESSION['logged_in'] = true;
        header('Location: admin.php');
        exit();
    } else {

        // Ak sú prihlasovacie údaje nesprávne, nastavíme chybovú správu
        $error_message = "Invalid email or password. Please try again.";
    }
}
?>

<main>
    <section class="container">
        <div class="row">
            <div class="col-100 text-center">
                <h2>Login</h2>
                <?php if (!empty($error_message)): ?>
                    <div class='error'><?php echo htmlspecialchars($error_message); ?></div>
                <?php endif; ?>
                <form method="POST" action="">
                    <div class="input-group">
                        <label>Email</label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="input-group">
                        <label>Password</label>
                        <input type="password" name="password" required>
                    </div>
                    <div class="input-group">
                        <button type="submit" class="btn" name="login_user">Login</button>
                    </div>
                    <p>
                        Not yet a member? <a href="register.php">🧸</a>
                    </p>
                </form>
            </div>
        </div>
    </section>
</main>

<?php 
include('partials/footer.php'); 
?>

