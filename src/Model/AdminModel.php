<?php


// Définition du namespace
namespace App\Model;

// Import des classes
use App\Core\AbstractModel;

class AdminModel extends AbstractModel
{

    function getAdminByEmail(string $email): array
    {
        // Préparation de la requête
        $sql = 'SELECT * FROM admin WHERE email = ?';
        $pdoStatement = self::$pdo->prepare($sql);

        // Exécution de la requête
        $pdoStatement->execute([$email]);

        // Récupération du résultat 
        $admin = $pdoStatement->fetch();

        if (!$admin) {
            return [];
        }
        // dump($admin);
        return $admin;
    }
}
