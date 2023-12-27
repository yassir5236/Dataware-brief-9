<?php
// views/auth/signin.php

// Formulaire de connexion
?>

<form action="signin.php" method="post">
    <label for="username">Nom d'utilisateur:</label>
    <input type="text" name="username" required>

    <label for="password">Mot de passe:</label>
    <input type="password" name="password" required>

    <input type="submit" value="Se connecter">
</form>
