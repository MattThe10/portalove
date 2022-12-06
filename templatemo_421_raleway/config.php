<?php
    include_once "database.php";

    $spojenie = new database('localhost', 'blog','root', '');
    global $spojenie;

    session_start();
?>