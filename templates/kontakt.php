<?php
include('partials/header.php'); 

// Zahrňte potrebné súbory a triedy
include_once('_inc/classes/Database.php');
include_once('_inc/classes/Contact.php');

// Vytvorenie objektu triedy Contact
$contact = new Contact();

// Ak bol formulár odoslaný
if (isset($_POST['contact_submitted'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $acceptance = isset($_POST['acceptance']) ? 1 : 0;

    // Vytvorenie nového kontaktu
    if ($contact->create($name, $email, $message, $acceptance)) {
        header("Location: thankyou.php");
        exit();
    } else {
        echo "Failed to make contact.";
    }
}
?>

<main>
    <section class="container">
        <div class="row">
            <div class="col-100 text-center">
                <h2>KONTAKTUJTE NÁS</h2>
                <form id="contact" action="" method="POST" style="text-align: center;">
                    <input type="text" placeholder="VAŠE MENO" name="name" required><br>
                    <input type="email" placeholder="VAŠ EMAIL" name="email" required><br>
                    <textarea placeholder="MÁTE PROBLÉM S NAŠIMI PRODUKTAMI?" name="message"></textarea><br>
                    <input type="checkbox" name="acceptance" value="1" required>
                    <label> Súhlasím so spracovaním mojich osobných údajov.</label><br>
                    <input type="submit" style='background-color: #f9f9f9;' name="contact_submitted" value="🧸">
                </form>
            </div>
        </div>
    </section>
</main>

<?php include_once('partials/footer.php'); ?>

