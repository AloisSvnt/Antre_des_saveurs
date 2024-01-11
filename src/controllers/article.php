<?php

use App\Model\ArticleModel;

// Inclusion du captcha
require 'recaptchaValid.php';

// Initialisations :
$errors = [];


// Récupération et validation de l'id de l'url (chaine de requête)
// if (!array_key_exists('id', $_GET) || !ctype_digit($_GET['id'])) {
//     echo 'ID de la tâche incorrecte';
//     exit;
// }

// ICI je sais que j'ai bien mon paramètre ID dans l'url et que c'est un nombre
$articleId = $_GET['id'];

$articleModel = new ArticleModel();
$article = $articleModel->getOneArticleById($articleId);

if (!$article) {
    $errors['introuvable'] = 'Erreur, l\'article n\'existe pas ou est introuvable';
    // dump($errors);
}

// dump($article);
// dump($_POST);

// Panier client
createShoppingCart();

if (isset($_POST['articleQuantityToAdd'])) {
    $articleId = $article['article_id'];
    $articleName = $article['article_name'];
    $articleQuantity = intval($_POST['articleQuantityToAdd']);
    $articlePrice = floatval($article['article_price']);

    addArticleShoppingCart($articleId, $articleName, $articleQuantity, $articlePrice);
}


// Ajout d'article dans le panier
// dump($_SESSION);
// dump($_POST);

// dump($article);

$template = 'article';
$titlePage = 'Boutique - L\'Antre des Saveurs';
include '../templates/base.phtml';
