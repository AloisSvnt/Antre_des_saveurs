<?php

require 'recaptchaValid.php';
$error = null;

// Si le formulaire est soumis...
if (!empty($_POST)) {

    // Récupérer les données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];


    // Vérification des identifiants
    $user = checkCredentials($email, $password);
    // dump($_POST);

    // dump($user);
    // Si les identifiants sont incorrects
    if (!$user) {
        $error['login'] = 'Identifiants incorrects';
    }
    // Sinon (les identifiants sont corrects)
    else {
        // dump($_SESSION);
        // On enregistre les données de l'utilisateur dans la session
        registerUser($user['ID'], $user['email'], $user['firstname'], $user['lastname']);

        // Message flash
        addFlashMessage('Connexion réussie !');
        // Redirection
        header('Location: /');
        exit;
    }
}

// Affichage : inclusion du template
$template = 'login';
$titlePage = 'Se connecter - L\'Antre des Saveurs';
include '../templates/base.phtml';
