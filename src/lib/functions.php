<?php

/**
 * Démarre la session si la session n'est pas déjà démarrée
 */
function initSession()
{
    // Si aucune session n'est démarrée pour le moment...
    if (session_status() == PHP_SESSION_NONE) {

        // ... on démarre la session
        session_start();
    }
}


/**
 * Ajoute un message en session
 * @param string $message Le message à ajouter en session
 */
function addFlashMessage(string $message)
{
    initSession();

    $_SESSION['flashbag'] = $message;
}

/**
 * Détermine si il y a un message flash en session ou non
 * @return bool true s'il y a un message, false sinon
 */
function hasFlash(): bool
{
    initSession();

    return isset($_SESSION['flashbag']);
}

/**
 * Récupère le message flash de la session
 * @return null|string Le message flash ou null
 */
function fetchFlash(): ?string
{
    initSession();

    // Initialisation de la variable $flashMessage
    $flashMessage = null;

    // Récupération du message flash s'il existe
    if (hasFlash()) {

        // On récupère le message flash dans une variable
        $flashMessage = $_SESSION['flashbag'];

        // On efface le message de la session
        $_SESSION['flashbag'] = null;
    }

    return $flashMessage;
}



/**
 * Vérifie les identifiants de connexion et retourne les données 
 * de l'utilisateur si les identifiants sont corrects, 
 * un tableau vide sinon
 */
function checkCredentials($email, $password): array
{
    // 1°) Récupérer un utilisateur à partir de l'email
    $userModel = new App\Model\UserModel();
    $user = $userModel->getUserByEmail($email);

    // Si résultat vide => tableau vide
    if (!$user) {
        // dump($userModel);
        return [];
    }

    // 2°) Si l'email existe bien, on vérifie le mot de passe
    if (!password_verify($password, $user['password'])) {
        return [];
    }

    // dump($_SESSION);
    // Si on arrive ici, tout est OK
    return $user;
}

function checkAdminCredentials($email, $password): array
{
    // 1°) Récupérer un utilisateur à partir de l'email
    $adminModel = new App\Model\AdminModel();
    $admin = $adminModel->getAdminByEmail($email);

    // Si résultat vide => tableau vide
    if (!$admin) {
        return [];
    }

    // 2°) Si l'email existe bien, on vérifie le mot de passe
    if ($password !== $admin['password']) {
        return [];
    }
    // dump($admin);

    // dump($_SESSION);
    // Si on arrive ici, tout est OK
    return $admin;
}

/**
 * Enregistre en session les données de l'utilisateur
 */
function registerUser(int $userId, string $email, string $firstname, string $lastname)
{
    // On s'assure que la session est bien démarrée
    initSession();

    $_SESSION['user'] = [
        'ID' => $userId,
        'email' => $email,
        'firstname' => $firstname,
        'lastname' => $lastname
    ];
    // dump($_SESSION);
}


function registerAdmin(int $userId, string $email, string $firstname, string $lastname)
{
    // On s'assure que la session est bien démarrée
    initSession();

    $_SESSION['admin'] = [
        'ID' => $userId,
        'email' => $email,
        'firstname' => $firstname,
        'lastname' => $lastname
    ];
    // dump($_SESSION);
}


/**
 * Vérifie si l'utilisateur est connexté ou non
 */
function isConnected(): bool
{
    initSession();

    return array_key_exists('user', $_SESSION) && isset($_SESSION['user']);
}

/**
 * Condition pour connaitre la date du jour afin d'ajouter une class HTML
 */
function compareDays()
{
    // Création de la variable date
    $date = new DateTime();
    // Formatage de la date pour obtenir le ACTUEL jour de la semaine
    $today = $date->format('l');
}





///////////////////////////////////////////////////////////////////////////////////////
// FONCTION PANIER CLIENT

/**
 * function de CRÉATION du panier client en SESSION
 */
function createShoppingCart()
{
    initSession();

    if (!isset($_SESSION['shoppingCart'])) {
        $_SESSION['shoppingCart'] = [];
        $_SESSION['shoppingCart']['articleId'] = [];
        $_SESSION['shoppingCart']['articleName'] = [];
        $_SESSION['shoppingCart']['articleQuantity'] = [];
        $_SESSION['shoppingCart']['articlePrice'] = [];
    }
}

/**
 * function de SUPPRESSION du panier
 */
function deleteShoppingCart()
{
    unset($_SESSION['shoppingCart']);
}


/**
 * function d'AJOUT d'article dans le panier
 */
function addArticleShoppingCart($articleId,  $articleName, $articleQuantity, $articlePrice)
{
    // On vérifie que le panier existe
    if (isset($_SESSION['shoppingCart'])) {
        // On vérifie si l'article est dans le panier
        $articlePosition = array_search($articleName, $_SESSION['shoppingCart']['articleName']);

        if ($articlePosition !== false) {

            // Si le produit existe déjà dans le panier on ajoute seulement la quantité
            $_SESSION['shoppingCart']['articleQuantity'][$articlePosition] += $articleQuantity;
        } else {

            // Sinon on ajoute le produit            
            array_push($_SESSION['shoppingCart']['articleId'], $articleId);
            array_push($_SESSION['shoppingCart']['articleName'], $articleName);
            array_push($_SESSION['shoppingCart']['articleQuantity'], $articleQuantity);
            array_push($_SESSION['shoppingCart']['articlePrice'], $articlePrice);
        }
    } else {
        echo "Une erreur est survenu";
    }
}

/**
 * function de SUPPRESSION d'article dans le panier
 */
function deleteArticleShoppingCart($articleId)
{
    // On vérifie que le panier existe
    if (isset($_SESSION['shoppingCart'])) {

        // Création d'un panier temporaire
        $tmp = [];
        $tmp['articleId'] = [];
        $tmp['articleName'] = [];
        $tmp['articleQuantity'] = [];
        $tmp['articlePrice'] = [];

        for ($i = 0; $i < count($_SESSION['shoppingCart']['articleId']); $i++) {
            if ($_SESSION['shoppingCart']['articleName'][$i] !== $articleId) {
                array_push($tmp['articleId'], $_SESSION['shoppingCart']['articleId'][$i]);
                array_push($tmp['articleName'], $_SESSION['shoppingCart']['articleName'][$i]);
                array_push($tmp['articleQuantity'], $_SESSION['shoppingCart']['articleQuantity'][$i]);
                array_push($tmp['articlePrice'], $_SESSION['shoppingCart']['articlePrice'][$i]);
            }
        }

        // dump($tmp);
        // Remplacement du panier en session par le panier temporaire à jour
        $_SESSION['shoppingCart'] = $tmp;
        // Supression du panier temporaire
        unset($tmp);
    } else {
        echo "Une erreur est survenu";
    }
}

/**
 * function de MODIFICATION (la quantité) d'article dans le panier
 */
function changeQuantityArticle($articleId, $articleQuantity)
{
    // On vérifie que le panier existe
    if (isset($_SESSION['shoppingCart'])) {

        // Si la quantité est positive on modifie, sinon on supprime l'article
        if ($articleQuantity > 0) {

            // On recherche l'article dans le tableau de session
            $articlePosition = array_search($articleId, $_SESSION['shoppingCart']['articleName']);

            if ($articlePosition !== false) {
                $_SESSION['shoppingCart']['articleQuantity'][$articlePosition] = $articleQuantity;
            }
        } else {
            // On supprime l'article car < 0
            deleteArticleShoppingCart($articleId);
        }
    } else {
        echo "Une erreur est survenu";
    }
}

/**
 * function pour COMPTER le nombre d'article en panier
 */
function countArticleInShoppingCart()
{
    // On vérifie que le panier existe
    if (isset($_SESSION['shoppingCart'])) {
        // Renvoie le nombre d'article en fonction du nom des article(pas de la quantité de chaque article)
        return count($_SESSION['shoppingCart']['articleName']);
    } else {
        // Retourne 0 car pas de panier
        return 0;
    }
}

/**
 * function de CALCUL du total du panier
 */
function shoppingCartAmount()
{
    $total = 0;
    for ($i = 0; $i < count($_SESSION['shoppingCart']['articleId']); $i++) {
        $total += $_SESSION['shoppingCart']['articleQuantity'][$i] * $_SESSION['shoppingCart']['articlePrice'][$i];
    }
    return $total;
}
