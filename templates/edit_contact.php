<?php
// Hlavičky
include('partials/header.php'); 

// Potrebné triedy
include_once('_inc/classes/Database.php');
include_once('_inc/classes/Contact.php');

// Vytvorenie objektu triedy Contact
$contact = new Contact();

// Kontrola, či bol odoslaný požiadavok na odstránenie kontaktu
if(isset($_POST['delete_contact'])){
    // Získanie identifikátora kontaktu na odstránenie
    $contact_id = $_POST['delete_contact'];
    // Odovzdanie identifikátora kontaktu metóde delete()
    $contact->delete($contact_id); 
}

// Kontrola, či bol odoslaný požiadavok na úpravu kontaktu
if(isset($_POST['edit_contact'])){
    // Získanie identifikátora kontaktu na úpravu
    $contact_id = $_POST['edit_contact'];
    // Presmerovanie používateľa na stránku úpravy s parametrom id kontaktu
    header("Location: edit_contact.php?id=$contact_id");
    exit();
}

// Kontrola, či bol požiadavok na uloženie upraveného kontaktu
if(isset($_POST['submit_edit'])){
    // Získanie údajov z formulára
    $contact_id = $_POST['contact_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $acceptance = isset($_POST['acceptance']) ? 1 : 0;

    // Volanie metódy update na úpravu kontaktu
    $contact->update($contact_id, $name, $email, $message, $acceptance);

    // Presmerovanie používateľa na stránku s kontaktmi
    header("Location: show_contacts.php");
    exit();
}

// Ak bol požiadavok na úpravu a je prítomný parameter id v URL, zobrazíme formulár na úpravu kontaktu
if(isset($_GET['id'])){
    $contact_id = $_GET['id'];
    // Získanie údajov kontaktu na úpravu
    $contact_data = $contact->select_single($contact_id);
?>
<main>
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-100 text-center">
                <h1>EDIT</h1>
                <form action="" method="post">
                    <input type="hidden" name="contact_id" value="<?php echo $contact_data['id']; ?>">
                    <input type="text" name="name" placeholder="Meno" value="<?php echo $contact_data['name']; ?>"><br>
                    <input type="email" name="email" placeholder="Email" value="<?php echo $contact_data['email']; ?>"><br>
                    <textarea name="message" placeholder="Správa"><?php echo $contact_data['message']; ?></textarea><br>
                    <input type="checkbox" name="acceptance" value="1" <?php if($contact_data['acceptance'] == 1) echo "checked"; ?>>
                    <label> I consent to the processing of my personal data.</label><br>
                    <input type="submit" name="submit_edit" value="🧸">
                </form>
            </div>
        </div>
    </section>
</main>
<?php
}

// Päty
include('partials/footer.php'); 
?>
