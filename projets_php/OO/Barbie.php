<?php

class Barbie {
    // attributs - encapsulation "public", "protected", "private" (permet de définir la visibilité)
    // public : accessible de partout
    // protected : accessible dans la classe et les classes héritées
    // private : accessible uniquement dans la classe
    // l'encapsulation permet de protéger les données sensibles et de contrôler l'accès aux attributs et méthodes d'une classe
    //public $sexe = null;

    protected $membres = [];

    //private $nom = null;
    private $age = null;
    private $adresse = null;
    private $telephone = null;

    
// constructeur 
    public function __construct(
        private $nom = 'Hyacinthe', 
        public $sexe = 'Masculin') {}
    // getter pour accéder au nom
    public function getNom() {
        return strtoupper($this->nom);
    }
    // setter pour modifier le nom
    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function definition(): string {
        return "Je suis une poupée Barbie nommée " . $this->getNom() . " de sexe " . $this->sexe . ".";
    }
























}

