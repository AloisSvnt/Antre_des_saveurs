<?php

// dump($_SESSION);
// dump($_POST);
require 'recaptchaValid.php';
// Initialisations
$errors = []; // Tableau qui contiendra les erreurs

$surname = '';
$nickname = '';
$email = '';
$userMessage = '';


// Si le formulaire est soumis :
if (!empty($_POST)) {
    $surname = trim(htmlspecialchars($_POST['surname']));
    $nickname = trim(htmlspecialchars($_POST['nickname']));
    $email = trim($_POST['email']);
    $userMessage = trim(htmlspecialchars($_POST['userMessage']));

    if (!$surname) {
        $errors['surname'] = 'Le champ "Nom" est obligatoire';
    }

    if (!$nickname) {
        $errors['nickname'] = 'Le champ "Prénom" est obligatoire';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Le champ "email" n\'est pas valide';
    }

    if (!$userMessage) {
        $erros['userMessage'] = 'Le champ "Message" est obligatoire';
    }

    // Vérification que le recaptcha est valide, grâce à notre fonction importée
    if (!recaptchaValid($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR'])) {
        $errors['recaptcha'] = 'Captcha invalide !';
    }

    // Si le tableau d'erreurs est vide && que la variable POST est rempli : On envoie l'email
    if (empty($errors) && !empty($_POST)) {

        // Création de l'email qui sera envoyé avec les différentes informations joint
        // Destinataire du mail
        $to = 'contact@antredessaveurs.fr';
        // expediteur du mail : 
        $from = 'noreply@antredessaveurs.fr';
        // Nom d'affichage de l'expéditeur : (dans le cas présent la personne qui nous écris depuis la page contact)
        $fromName = $surname . ' ' . $nickname;
        // Adresse email de retour : (dans le cas présent la personne qui nous écris depuis la page contact)
        $replyTo = $email;
        // Nom d'affichage du mail de retour
        $replyToName    = 'Antredessaveurs.fr';
        // Object du mail : 
        $subject = 'Nouveau message de ' . $surname . ' ' . $nickname . '.';
        // Contenu en texte du mail :
        $message_txt = $userMessage;
        // Contenu en version HTML du mail :
        $message_html = '
                        <!DOCTYPE html>
                        <html>
                            <head>
                                <meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
                            </head>
                            <body>
                                <h1> ' . $subject . '</h1>
                                <p> ' . $message_txt . '</p>

                                <p> Email de l\'expediteur : ' . $email . '</p>
                            </body>
                        </html>
                        ';

        // Constructeur de mail :
        $crlf        = "\r\n";
        $boundary    = "-----=" . md5(rand());
        $headers    = "From: \"" . $fromName . "\"<" . $from . ">" . $crlf;
        $headers    .= "Reply-to: \"" . $replyToName . "\"<" . $replyTo . ">" . $crlf;
        $headers    .= "MIME-Version: 1.0" . $crlf;
        $headers    .= "Content-Type: multipart/alternative;" . $crlf . " boundary=\"" . $boundary . "\"" . $crlf;
        $message    = $crlf . "--" . $boundary . $crlf;
        $message    .= "Content-Type: text/plain; charset=\"UTF-8\"" . $crlf;
        $message    .= "Content-Transfer-Encoding: 8bit" . $crlf;
        $message    .= $crlf . $message_txt . $crlf;
        $message    .= $crlf . "--" . $boundary . $crlf;
        $message    .= "Content-Type: text/html; charset=\"UTF-8\"" . $crlf;
        $message    .= "Content-Transfer-Encoding: 8bit" . $crlf;
        $message    .= $crlf . $message_html . $crlf;
        $message    .= $crlf . "--" . $boundary . "--" . $crlf;
        $message    .= $crlf . "--" . $boundary . "--" . $crlf;


        // dump($subject);

        // Envoie de l'email :
        mail($to, $subject, $message, $headers);
        addFlashMessage('Votre message à bien été envoyé');

        // unset($_POST);
        header('Location: /contact');
        exit;
    }
}


// // addFlash('Votre message à bien été envoyé');
$flashMessage = fetchFlash();
// Affichage : inclusion du template
$template = 'contact';
$titlePage = 'Contact - L\'Antre des Saveurs';
include '../templates/base.phtml';
