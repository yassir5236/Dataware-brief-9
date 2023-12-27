<?php
require_once '../managers/AuthentificationManager.php';

// controllers/AuthController.php

class AuthController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function signup($username, $password) {
        // Validation des données (vous pouvez ajouter plus de validations ici)

        // Création de l'utilisateur
        if ($this->userModel->createUser($username, $password)) {
            // Redirection vers la page de connexion après l'inscription
            header('Location: ../views/authentification/signin.php');
            exit();
        } else {
            // Gestion des erreurs
            echo 'Erreur lors de l\'inscription.';
        }
    }

//     public function signin($username, $password) {
//         // Validation des données (vous pouvez ajouter plus de validations ici)

//         // Vérification de l'utilisateur
//         if ($this->userModel->verifyUser($username, $password)) {
//             // Authentification réussie, vous pouvez définir des sessions ici
//             echo 'Connexion réussie.';
//         } else {
//             // Authentification échouée
//             echo 'Identifiants incorrects.';
//         }
//     }
}


// controllers/SignupController.php

<?php
include_once 'models/UserModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validation supplémentaire peut être ajoutée ici

    $userModel = new UserModel();
    $success = $userModel->createUser($username, $password);

    if ($success) {
        echo "Inscription réussie !";
    } else {
        echo "Échec de l'inscription.";
    }
}
?>
