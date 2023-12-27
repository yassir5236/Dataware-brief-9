<?php
// public/signup.php

require_once '../config/config.php';
require_once '../models/database.php';
require_once '../models/UserModel.php';
require_once '../controllers/AuthController.php';



$userModel = new UserModel();


$authController = new AuthController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['signup'])) {
        $authController->signup($_POST['username'], $_POST['password']);
    }
}

// Inclure le formulaire de signup
include '../views/auth/signup.php';
?>
