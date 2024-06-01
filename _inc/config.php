<?php


define('DATABASE', [
    'HOST' => 'localhost',
    'DBNAME' => 'app',
    'USER_NAME' => 'root',
    'PASSWORD' => ''
]);

session_start();

require_once('classes/Product.php');
require_once('classes/Slider.php');
require_once('classes/Menu.php');
require_once('classes/Page.php');
require_once('classes/Database.php');
require_once('classes/Contact.php');
require_once('classes/Qna.php');
require_once('classes/Portfolio.php');
require_once('classes/User.php');



?>