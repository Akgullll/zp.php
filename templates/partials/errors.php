<?php
// Definícia funkcie na zobrazenie chybových správ
function display_errors($errors) {
    // Kontrola, či pole chýb nie je prázdne
    if (!empty($errors)) {
        // Začiatok divu pre chybové správy
        echo '<div class="errors">';
        // Prechádzanie cez pole chýb a výpis jednotlivých chýb ako odstavcov
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
        // Koniec divu pre chybové správy
        echo '</div>';
    }
}
?>
