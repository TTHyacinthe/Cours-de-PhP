<?php

class Calculatrice
{
    public function __construct(
        private float $nbr1,
        private float $nbr2,
        private string $operateur)
    {
     // echo $this->calculer();

    }

    public function setNbr1(float $nbr1): void
    {
        $this->nbr1 = $nbr1;
    }

    public function setNbr2(float $nbr2): void
    {
        $this->nbr2 = $nbr2;
    }

    public function setOperateur(string $operateur): void
    {
        $this->operateur = $operateur;
    }




    public function calculer(): float|int|string{
        return match($this->operateur) {
            '+' => $this->addition(),
            '-' => $this->soustraction(),
            '*' => $this->multiplication(),
            '/' => $this->division(),
            default => "Erreur : Opérateur inconnu"
        };
    }

    private function addition(): float{
        return $this->nbr1 + $this->nbr2;
    }
    private function soustraction(): float{
        return $this->nbr1 - $this->nbr2;
    }
    private function multiplication(): float{
        return $this->nbr1 * $this->nbr2;
    }
    private function division(): float|string{
        if ($this->nbr2 == 0) {
            return throw new DivisionByZeroError("Erreur : Division par zéro");
        }
        return $this->nbr1 / $this->nbr2;
    }

    public function __destruct()
    {
         echo "Fin du calcul";
    }

}