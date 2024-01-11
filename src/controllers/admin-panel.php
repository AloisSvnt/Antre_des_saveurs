<?php

// dump($_SESSION);
// Flash messages
$flashMessage = fetchFlash();
$shoppingCart = createShoppingCart();

// Affichage : inclusion du template
$template = 'admin-panel';
$titlePage = 'Panneau de contrôle administrateur';
include '../templates/base_admin.phtml';
