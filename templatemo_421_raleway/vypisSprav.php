<?php
include_once "config.php";
$spojenie = $GLOBALS['spojenie'];
$spravy = $spojenie->vypisSpravy();
?>
    <a href="index.php">Späť</a>
<ul>
    <?php
    foreach ($spravy as $sprava) {
        echo "<li>Meno: ".$sprava['meno'].", Priezvisko: ".$sprava['priezvisko'].", Predmet: ".$sprava['predmet'].", Správa: ".$sprava['sprava']."</li>";
        echo '<li><a href="deleteMessage.php?id='.$sprava['id'].'">Vymaž</a></li>';
        echo '<li><a href="updateMessageForm.php?id='.$sprava['id'].'">Aktualizuj</a></li>';
        echo "<br>";
    }
    ?>
</ul>


