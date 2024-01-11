<?php

use App\Model\ArticleModel;

$articleModel = new ArticleModel();
$articles = $articleModel->getAllArticles();

// Flash messages
$flashMessage = fetchFlash();
$shoppingCart = createShoppingCart();

if (isset($_GET['delete'])) {
    $articleId = intval($_GET['id']);
    $articleModel->deleteArticle($articleId);
    header('Location: /admin-panel/articles');
    exit;
}

// dump(intval($_GET['spotlight']));
if (isset($_GET['spotlight'])) {
    $articleId = intval($_GET['id']);
    $articleModel->changeSpotlight(!intval($_GET['spotlight']), $articleId);
    header('Location: /admin-panel/articles');
    // exit;
}

if (isset($_GET['active'])) {
    $articleId = intval($_GET['id']);
    $articleModel->updateActiveArticle(!intval($_GET['active']), $articleId);
    header('Location: /admin-panel/articles');
}


// Affichage : inclusion du template
$template = 'admin-articles';
$titlePage = 'Articles - L\'Antre des saveurs';
include '../templates/base_admin.phtml';
