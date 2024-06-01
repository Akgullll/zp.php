<?php
include('partials/header.php');
include('_inc/classes/User.php'); 

session_start();

$user = new User();

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_user'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($user->login($email, $password)) {
        $_SESSION['logged_in'] = true;
        header('Location: admin.php');
        exit();
    } else {
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
                        Not yet a member? <a href="register.php">Register</a>
                    </p>
                </form>
            </div>
        </div>
    </section>
</main>

<?php 
include('partials/footer.php'); 
?>

