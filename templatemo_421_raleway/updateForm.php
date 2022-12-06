<?php
include_once "config.php";
$spojenie = $GLOBALS['spojenie'];

$sprava = $spojenie->spravyInfo($_GET['id']);
?>

<form action="updateMessage.php" method="post">
    <label for="meno"></label>
    <input type="text" name="meno" id="meno" value="<?php echo $sprava[0]['meno']; ?>"/>
    <label for="priezvisko"></label>
    <input type="text" name="priezvisko" id="priezvisko" value="<?php echo $sprava[0]['priezvisko']; ?>"/>
    <label for="predmet"></label>
    <input type="text" name="predmet" id="predmet" value="<?php echo $sprava[0]['predmet']; ?>"/>
    <label for="sprava"></label>
    <textarea name="sprava" id="sprava"><?php echo $sprava[0]['sprava']; ?></textarea>
    <input type="hidden" name="id" value="<?php echo $sprava[0]['id']; ?>">
    <input type="submit" name="submit" value="Aktualizuj">
</form>

