<?php

require_once('classes/ChampTexte.php');
require_once('classes/ChampNombre.php');
require_once('classes/ListeDeroulante.php');
require_once('classes/GroupeBoutonsRadio.php');

$champAge = new ChampNombre('age', 'Âge', false, true);
$champAge->setValeurMin(0);
$champAge->setValeurMax(120);

$champProvince = new ListeDeroulante('province', 'Province / Territoire', true);
$champProvince->ajouterOption('Alberta');
$champProvince->ajouterOption('Colombie-Britannique');
$champProvince->ajouterOption('Île-du-Prince-Édouard');
$champProvince->ajouterOption('Manitoba');
$champProvince->ajouterOption('Nouveau-Brunswick');
$champProvince->ajouterOption('Nouvelle-Écosse');
$champProvince->ajouterOption('Nunavut');
$champProvince->ajouterOption('Ontario');
$champProvince->ajouterOption('Québec');
$champProvince->ajouterOption('Saskatchewan');
$champProvince->ajouterOption('Terre-Neuve-et-Labrador');
$champProvince->ajouterOption('Territoires du Nord-Ouest');
$champProvince->ajouterOption('Yukon');

$champTypeInscription = new GroupeBoutonsRadio('typeInscription', 'Type d\'inscription', true);
$champTypeInscription->ajouterOption('Individuelle');
$champTypeInscription->ajouterOption('Familliale');


$champs = [
    new ChampTexte('prenom', 'Prénom', true),
    new ChampTexte('nom', 'Nom', true),
    new ChampTexte('courriel', 'Adresse courriel', true),
    new ChampTexte('telephone', 'Téléphone', false),
    $champAge,
    $champProvince,
    $champTypeInscription,
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
