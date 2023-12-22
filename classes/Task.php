<?php

class Tache {
    private $id;
    private $nom;
    private $statut;
    private $deadline;
    // ... autres attributs

    public function __construct($id, $nom, $statut, $deadline) {
        $this->id = $id;
        $this->nom = $nom;
        $this->statut = $statut;
        $this->deadline = $deadline;
        // ... initialisation des autres attributs
    }

    // ... autres méthodes
}

?>
