<?php

// deleteShoppingCart();

use App\Model\ArticleModel;

$AllShoppingCartArticle = [];

// dump($_SESSION);

if (isset($_SESSION['shoppingCart'])) {

    $numberOfArticle = count($_SESSION['shoppingCart']['articleId']);


    $articleModel = new ArticleModel();

    for ($i = 0; $i < $numberOfArticle; $i++) {
        $articles['article_' . $i] = $articleModel->getOneImageArticleById($_SESSION['shoppingCart']['articleId'][$i]);
        $articles['article_' . $i]['article_id'] = $_SESSION['shoppingCart']['articleId'][$i];
        $articles['article_' . $i]['article_name'] = $_SESSION['shoppingCart']['articleName'][$i];
        $articles['article_' . $i]['quantity'] = $_SESSION['shoppingCart']['articleQuantity'][$i];
        $articles['article_' . $i]['price'] = $_SESSION['shoppingCart']['articlePrice'][$i];
    }
} else {
    createShoppingCart();
}
// dump($articles);

if (isset($_GET['id'])) {
    deleteArticleShoppingCart($_GET['id']);
    // header('Location: /panier');
}


// Affichage : inclusion du template
$template = 'shopping-cart';
$titlePage = 'Panier - L\'Antre des Saveurs';
include '../templates/base.phtml';
