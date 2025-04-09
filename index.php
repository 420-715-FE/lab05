<?php

require_once('classes/ChampTexte.php');
require_once('classes/ChampNombre.php');
require_once('classes/ListeDeroulante.php');
require_once('classes/GroupeBoutonsRadio.php');
require_once('classes/Formulaire.php');

$formulaire = new Formulaire("Formulaire d'inscription");

$formulaire->ajouterChamp(new ChampTexte('prenom', 'Prénom', true));
$formulaire->ajouterChamp(new ChampTexte('nom', 'Nom', true));
$formulaire->ajouterChamp(new ChampTexte('courriel', 'Adresse courriel', true));
$formulaire->ajouterChamp(new ChampTexte('telephone', 'Téléphone', false));

$champAge = new ChampNombre('age', 'Âge', false, true);
$champAge->setValeurMin(0);
$champAge->setValeurMax(120);
$formulaire->ajouterChamp($champAge);

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
$formulaire->ajouterChamp($champProvince);

$champTypeInscription = new GroupeBoutonsRadio('typeInscription', 'Type d\'inscription', true);
$champTypeInscription->ajouterOption('Individuelle');
$champTypeInscription->ajouterOption('Familliale');
$formulaire->ajouterChamp($champTypeInscription);

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
    <?= $formulaire->html() ?>
</body>
</html>
