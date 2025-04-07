<?php

class ChampTexte
{
    private $nom;
    private $libelle;
    private $estObligatoire;
    private $erreur;

    public function __construct($nom, $libelle, $estObligatoire)
    {
        $this->nom = $nom;
        $this->libelle = $libelle;
        $this->estObligatoire = $estObligatoire;
        $this->erreur = null;
    }

    public function estRecu() {
        return isset($_POST[$this->nom]);
    }

    public function getValeur() {
        if ($this->estRecu()) {
            return htmlspecialchars(trim($_POST[$this->nom]));
        }
        return "";
    }

    public function valider() {
        if ($this->estRecu()) {
            $valeur = $this->getValeur();
            if ($this->estObligatoire && empty($valeur)) {
                $this->erreur = "Le champ {$this->libelle} est obligatoire.";
            }
        }
    }

    public function getErreur() {
        return $this->erreur;
    }

    public function html() {
        $html = "<label for=\"{$this->nom}\">{$this->libelle}</label>";
        $html .= "<input type=\"text\" name=\"{$this->nom}\" id=\"{$this->nom}\"";
        if ($this->estObligatoire) {
            $html .= " required";
        }
        $html .= " value=\"{$this->getValeur()}\"";
        $html .= ">";
        return $html;
    }
}

?>