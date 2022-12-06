<?php
include_once "config.php";
$spojenie = $GLOBALS['spojenie'];

if(isset($_POST['submit'])) {
    $update = $spojenie->aktualizujSpravu($_POST['id'], $_POST['meno'], $_POST['priezvisko'], $_POST['predmet'], $_POST['sprava']);

    if($update) {
        header("Location: vypisSprav.php");
    } else {
        echo "Chyba";
    }
} else {
    header("Location: vypisSprav.php");
}

?>