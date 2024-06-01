<?php
include('partials/header.php');
include('_inc/classes/User.php'); 
include('partials/errors.php'); 

$user = new User();
$errors = array(); 

if (isset($_POST['reg_user'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

  
    if ($password_1 == $password_2) {
  
        $registered = $user->register($username, $email, $password_1);
        if ($registered) {
          
            header('Location: thankyou.php');
            exit();
        } else {
            $errors[] = "Registration failed. Please try again.";
        }
    } else {
        $errors[] = "Passwords do not match. Please try again.";
    }
}
?>

<main>
    <section class="container">
        <div class="row">
            <div class="col-100 text-center">
                <div class="header text-center">
                    <h2>Register</h2>
                </div>

                <form method="post" action="register.php">
                    <?php display_errors($errors); ?>
                    <div class="input-group">
                        <label>Username♡</label>
                        <input type="text" name="username" value="<?php echo $username ?? ''; ?>">
                    </div>
                    <div class="input-group">
                        <label>Email♡</label>
                        <input type="email" name="email" value="<?php echo $email ?? ''; ?>">
                    </div>
                    <div class="input-group">
                        <label>Password♡</label>
                        <input type="password" name="password_1">
                    </div>
                    <div class="input-group">
                        <label>Confirm password♡</label>
                        <input type="password" name="password_2">
                    </div>
                    <div class="input-group">
                        <button type="submit" class="btn" name="reg_user">Register</button>
                    </div>
                    <p>
                        don't forget to fill in all the blanks -> <a href="login.php">🧸</a>
                    </p>
                </form>
            </div>
        </div>
    </section>
</main>

<?php include('partials/footer.php'); ?>


