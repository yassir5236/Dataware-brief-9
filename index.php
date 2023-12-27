<?php
require_once "controllers/AuthController.php";
$action = isset($_GET['action']) ? $_GET['action'] : 'signup';

switch ($action) {
    case 'signup':
        $authController = new AuthentificationController();
        $authController->inscription();
        break;
    case 'Auth':
        $authController = new AuthentificationController();
        $authController->traiterInscription();
        break;
    // Ajoutez d'autres cas pour d'autres fonctionnalités
    default:
    index.php?action=
        // Affichez une page d'erreur ou redirigez vers la page d'accueil
}
