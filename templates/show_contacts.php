<?php
include_once('_inc/classes/Database.php');
include_once('_inc/classes/Contact.php');
include('partials/header.php');

// Vytvoríme objekt triedy Contact
$contact = new Contact();

// Získame všetky kontakty
$contacts = $contact->select();

// Skontrolujeme, či bola požiadavka na odstránenie kontaktu
if(isset($_POST['delete_contact'])){
    // Získame identifikátor kontaktu na odstránenie
    $contact_id = $_POST['delete_contact']; // Získame identifikátor kontaktu na odstránenie
    // Odstránime kontakt
    $contact->delete($contact_id);
    // Presmerujeme používateľa na stránku s kontaktmi
    header("Location: show_contacts.php");
    exit();
}

// Skontrolujeme, či bola požiadavka na úpravu kontaktu
if(isset($_POST['edit_contact'])){
    // Získame identifikátor kontaktu na úpravu
    $contact_id = $_POST['edit_contact'];
    // Presmerujeme používateľa na stránku úpravy s parametrom id kontaktu
    header("Location: edit_contact.php?id=$contact_id");
    exit();
}
?>
<main>
    <section class="container">
        <div class="row">
            <div class="col-100 text-center">
                <h1>List of contacts</h1>
                <table  border="1" style="margin: 0 auto;">
                    <tr>
                        <th>Meno</th>
                        <th>Email</th>
                        <th>Správa</th>
                        <th>Akcia</th>
                    </tr>
                    <?php foreach($contacts as $contact): ?>
                        <tr>
                            <td><?php echo $contact['name']; ?></td>
                            <td><?php echo $contact['email']; ?></td>
                            <td><?php echo $contact['message']; ?></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="delete_contact" value="<?php echo $contact['id']; ?>">
                                    <button type="submit">DELETE</button>
                                </form>
                                <form action="" method="post">
                                    <input type="hidden" name="edit_contact" value="<?php echo $contact['id']; ?>">
                                    <button type="submit">EDIT</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </section>
</main>
<?php include('partials/footer.php'); ?>
