<?php

function display_errors($errors) {
    if (!empty($errors)) {
        echo '<div class="errors">';
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
        echo '</div>';
    }
}

?>
