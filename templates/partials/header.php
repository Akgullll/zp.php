<?php
require('../_inc/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo 'Apple | ' . basename($_SERVER["SCRIPT_NAME"], '.php'); ?></title>
    <?php
    $page_name = basename($_SERVER["SCRIPT_NAME"], '.php');
    $page_object = new Page();
    $page_object->set_page_name($page_name);
    echo $page_object->add_stylesheet();
    ?>
</head>
<body>
<header class="container main-header" style="background-color: pink">
    <div>
        <a href="home.php">
            <img src="../assets/img/Apple-Logo.png" height="40">
        </a>
    </div>
    <nav class="main-nav text-center">
        <ul class="main-menu" id="main-menu">
            <?php
            $pages = array(
                'HOME' => 'home.php',
                'PORTFOLIO' => 'portfolio.php',
                'Q&A' => 'qna.php',
                'CONTACT' => 'kontakt.php',
                'APPLE' => 'product.php'
            );
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
                $pages['Odhlasiť'] = 'logout.php';
            }

            $menu_object = new Menu($pages);
            echo $menu_object->generate_menu();
            ?>
        </ul>
        <a class="hamburger" id="hamburger">
            <i class="fa fa-bars"></i>
        </a>
    </nav>
</header>


