<?php
include_once "config.php";

if(isset($_GET['id'])) {
    $spojenie = $GLOBALS['spojenie'];
    $delete = $spojenie->vymazSpravu($_GET['id']);

    if($delete) {
        header("Location: vypisSprav.php");
    } else {
        echo "Chyba";
    }
} else {
    header("Location: vypisSprav.php");
}

?>