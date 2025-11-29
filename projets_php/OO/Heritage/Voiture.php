<?php 

class Voiture extends Vehicule {
    
    public function __construct() {
        $this->roues = 4;
    }
    public function freiner(): string {
        return "Crrr ! La voiture  freine.";
    }

    public function ouvrirPortiere(): string {
        return "La portière de la voiture s'ouvre.";
    }
    
}