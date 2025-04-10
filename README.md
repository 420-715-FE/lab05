# Laboratoire 05-A

L'objectif de ce laboratoire est de vous faire créer vos premières classes en PHP. Vous allez implémenter les classes nécessaires à la génération d'un formulaire tout en objets.

Dans le fichier `index.php`, vous trouverez une variable contenant le numéro de l'étape du laboratoire sur lequel vous êtes en train de travailler. Selon ce numéro, un des fichiers du dossier `tests` sera inclus. Ouvrez le fichier `tests/etape1.php` et prenez connaissance de son contenu. Vous verrez qu'il instancie plusieurs objets de la classe `ChampTexte`.

Suivez les consignes ci-dessous pour implémenter les différentes classes dans les fichiers correspondants du dossier `classes`, en mettant à jour la variable `$etape` à chaque fois. **Vous ne devez en aucun cas modifier les fichiers du dossier `tests`.**

## Étape 1 - Classe `ChampTexte`

Cette classe permet de générer un champ texte.

La classe doit avoir les attributs suivants:

* `$nom`: indique le nom du champ qui apparaîtra dans l'attribut `name` de la balise HTML `input` lorsque celle-ci sera générée.
* `$libelle`: indique le texte qui sera affiché comme libellé du champ.
* `$estObligatoire`: booléen indiquant si le champ est obligatoire ou non.
* `$erreur`: contient un texte d'erreur si la valeur saisie dans le champ est invalide.

Le constructeur doit prendre 3 paramètres permettant d'initialiser les attributs `$nom`, `$libelle` et `$estObligatoire`. Il doit initialiser l'attribut `$erreur` à `null`.

Les méthodes suivantes doivent être implémentées:

* `getLibelle()`: retourne la valeur du libellé
* `estRecu()`: retourne un booléen indiquant si ce champ a été reçu ou non (via `$_POST`)
* `getValeur()`: si le champ a été reçu, retourne sa valeur, sinon retourne `null`. Les balises HTML doivent être désactivées dans la valeur retournée. Les espaces au début et à la fin de la valeur doivent aussi avoir été retirés (voir la fonction [trim](https://www.php.net/manual/fr/function.trim.php)).
* `valider()`: si le champ est obligatoire et n'a pas été reçu, insère un message d'erreur en conséquence dans `$erreur`. Si le champ est obligatoire et a été reçu, mais est vide (voir la fonction [empty](https://www.php.net/manual/fr/function.empty.php)), insère le même message d'erreur.
* `getErreur`: retourne la valeur de l'attribut `$erreur`.
* `html`: retourne le HTML permettant d'afficher le champ.

Voici le résultat que vous devriez obtenir avec la valeur `$etape = 1` dans `index.php`:

![](images-readme/etape1.gif)

## Étape 2 - Classe `ChampNombre`

