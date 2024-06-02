<?php
include_once('_inc/classes/Database.php');
include_once('_inc/classes/Contact.php');

// Skontrolujeme, či bol odoslaný požiadavok na odstránenie kontaktu
if(isset($_POST['delete_contact'])){
    // Vytvoríme objekt triedy Kontakt
    $contact = new Contact();
    // Odstránime kontakt
    $contact->delete($_POST['delete_contact']);
    // Presmerujeme používateľa na stránku s kontaktmi
    header("Location: show_contacts.php");
    exit();
}
?>
