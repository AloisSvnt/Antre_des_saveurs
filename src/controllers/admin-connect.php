<?php

require 'recaptchaValid.php';
$error = null;

// dump($_SESSION);

// Si le formulaire est soumis...
if (!empty($_POST)) {


    // Récupérer les données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérification des identifiants
    $admin = checkAdminCredentials($email, $password);
    // dump($_POST);

    // dump($email, $password);
    // dump($user);
    // Si les identifiants sont incorrects
    if (!$admin) {
        $error['login'] = 'Identifiants incorrects';
    }
    // Sinon (les identifiants sont corrects)
    else {
        // dump($_SESSION);
        // On enregistre les données de l'utilisateur dans la session
        registerAdmin($admin['id'], $admin['email'], $admin['firstname'], $admin['lastname']);

        // Message flash
        addFlashMessage('Connexion réussie !');
        // Redirection

        header('Location: /admin-panel');
        exit;
    }
}

// Affichage : inclusion du template
$template = 'admin-connect';
$titlePage = 'Connexion administrateur';
include '../templates/base_admin.phtml';
