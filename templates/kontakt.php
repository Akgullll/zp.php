<?php include('partials/header.php'); ?>
<main>
    <section class="container">
        <div class="row">
            <div class="col-100 text-center">
                <h2>CONTACT US</h2>
                <form id="contact" action="thankyou.php" method="POST" style="text-align: center;">
                    <input type="text" placeholder="YOUR NAME" name="name" required><br>
                    <input type="email" placeholder="YOUR EMAIL" name="email" required><br>
                    <textarea placeholder="DO YOU HAVE A PROBLEM ABOUT OUR PRODUCTS?" name="message"></textarea><br>
                    <input type="checkbox" name="acceptance" value="1" required>
                    <label> I consent to the processing of my personal data.</label><br>
                    <input type="submit" style='background-color:  #f9f9f9;'name="contact_submitted" value="🧸">
                </form>
            </div>
        </div>
    </section>
</main>
<?php include_once('partials/footer.php'); ?>

