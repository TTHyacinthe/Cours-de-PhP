<?php 

//  abstract class Vehicule {
//      public $marque;
//      public $couleur = null;
//      public $roues = 0;

//       public function demarrer(): string{
//          return "Vroom Vroom !  Le véhicule démarre. ";
//      }
//      public function rouler(): string{
//          return "Le véhicule roule.";
//      }
//       public function freiner(): string{
//          return "Le véhicule freine.";   
//      }
//  }

interface VehiculeInterface {
    public function demarrer(): string;

    public function rouler(): string;

    public function freiner(): string;
   
}