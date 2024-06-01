<?php
include('partials/header.php');
?> 
<main>
    <section class="container">
        <div class="row">
            <div class="col-100 text-center">
                <h2>Ďakujeme!(⌒‿⌒)</h2>
                <?php

                // Vytvorenie inštancie triedy Contact a vloženie údajov
                $contact_object = new Contact();
                $contact_object->insert();
                ?>
            </div>
        </div>
    </section>
</main>
<?php
include_once('partials/footer.php');
?>
