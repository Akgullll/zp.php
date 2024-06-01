<?php
include('partials/header.php');
include('_inc/classes/User.php'); 

$user = new User();

if (isset($_POST['login_user'])) {
    
    $email = $_POST['email'];
    $password = $_POST['password'];

   
    $logged_in = $user->login($email, $password);
    if ($logged_in) {
        
        header('Location: admin.php');
        exit();
    } else {
        echo "Invalid email or password. Please try again.";
    }
}
?>
<main>
    <section class="container">
        <div class="row">
            <div class="col-100 text-center">
                <h2>Login</h2>
                <form method="post" action="login.php">
                    <label>Email</label>
                    <input type="email" name="email" required>
          
                    <label>Password</label>
                    <input type="password" name="password" required>
                  
                    <button type="submit" class="btn" name="login_user">Login</button>
                </form>
                <p>Not yet a member? <a href="register.php">Register</a></p>
            </div>
        </div>
    </section>
</main>
<?php 
include('partials/footer.php'); 
?>

