<?php

class ChampNombre
{
    private $nom;
    private $libelle;
    private $estObligatoire;
    private $valeurMin;
    private $valeurMax;
    private $doitEtreEntier;
    private $erreur;

    public function __construct($nom, $libelle, $estObligatoire)
    {
        $this->nom = $nom;
        $this->libelle = $libelle;
        $this->estObligatoire = $estObligatoire;
        $this->erreur = null;
    }

    public function html() {
        $html = "<label for=\"{$this->nom}\">{$this->libelle}</label>";
        $html .= "<input type=\"text\" name=\"{$this->nom}\" id=\"{$this->nom}\"";
        if ($this->estObligatoire) {
            $html .= " required";
        }
        $html .= ">";
        return $html;
    }

    public function estRecu() {
        return isset($_POST[$this->nom]);
    }

    public function estValide() {
        if ($this->estRecu()) {
            $valeur = $_POST[$this->nom];
            if ($this->estObligatoire && empty($valeur)) {
                $this->erreur = "Le champ {$this->libelle} est obligatoire.";
                return false;
            } else {
                return true;
            }
        }
        return false;
    }

    public function getErreur() {
        return $this->erreur;
    }
}

?>