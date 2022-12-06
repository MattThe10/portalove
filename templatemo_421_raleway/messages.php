<?php
include_once "config.php";

if(isset($_POST['meno'])) {
    $spojenie = $GLOBALS['spojenie'];
    $insert = $spojenie->vlozSpravu($_POST['meno'], $_POST['priezvisko'], $_POST['predmet'], $_POST['sprava']);
    if($insert) {
        header("Location: vypisSprav.php");
    } else {
        echo "Chyba";
    }
} else {
    header("Location: vypisSprav.php");

}

?>