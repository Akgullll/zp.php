<footer class="container " style="background-color: pink">
    <div class="row">
      <div class="col-25">
        <h2>we</h2>
        <p>Apple je neuveriteľným príkladom inovácie v oblasti technológií.</p>
        <p>Vytvárame zariadenia, ktoré sú nielen funkčné, ale aj dizajnovo atraktívne.</p>
      </div>
      <div class="col-25">
        <h2>any questions?</h2>
        <p><i class="fa fa-envelope" aria-hidden="true"><a href="mailto:Apple@gmail.com"> Apple@gmail.com</a></i></p>
        <p><i class="fa fa-phone" aria-hidden="true"><a href="tel:0342345656"> 0342345656</a></i></p>
      </div>
      <div class="col-25">
        <h2>address</h2>
        <a href="https://maps.app.goo.gl/BKn9n9GWD16pK7xw7" class="button">APPLE</a>
       </div>
    </div>
    <div class="row">
    🧸Akgul Belkozhayeva🧸
    </div>
  </footer>
    <?php
    $page_name = basename($_SERVER["SCRIPT_NAME"], '.php');
    $page_object = new Page();
    $page_object->set_page_name($page_name);
    echo($page_object->add_scripts());
    ?>
</body>
</html>
