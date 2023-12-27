<?php
require_once '../classes/User.php';
require_once 'config/database.php';

class AuthentificationManager {
    private $bdd;

    public function __construct() {
        $this->bdd = Database::getInstance();
    }

    public function inscrire(Utilisateur $utilisateur) {
        try {
            $query = "INSERT INTO users (user_name, email, motDePasse) VALUES (?, ?, ?)";
            $stmt = $this->bdd->prepare($query);
            $stmt->execute([$utilisateur->getUsername(), $utilisateur->getEmail(), $utilisateur->getMotDePasse()]);
            return true;
        } catch (PDOException $e) {
            // Gérer l'erreur d'inscription
            die("Erreur d'inscription: " . $e->getMessage());
        }
    }
}
