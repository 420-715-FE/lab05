<?php

require_once('classes/ChampTexte.php');
require_once('classes/ChampNombre.php');

$champAge = new ChampNombre('age', 'Âge', false, true);
$champAge->setValeurMin(0);
$champAge->setValeurMax(120);

$champs = [
    new ChampTexte('prenom', 'Prénom', true),
    new ChampTexte('nom', 'Nom', true),
    new ChampTexte('courriel', 'Adresse courriel', true),
    new ChampTexte('telephone', 'Téléphone', false),
    $champAge,
];

foreach ($champs as $champ) {
    if ($champ->estRecu()) {
        $champ->valider();
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratoire 05</title>
    <link rel="stylesheet" href="water.css">
</head>
<body>
    <h1>Formulaire d'inscription</h1>
    <form method="POST" action="">
        <?php

        foreach ($champs as $champ) {
            if ($champ->getErreur()) {
                echo "<p class=\"erreur\">{$champ->getErreur()}</p>";
            }
        }

        foreach ($champs as $champ) {
            echo $champ->html();
        }

        ?>

        <input type="submit" value="Envoyer">
    </form>
</body>
</html>
