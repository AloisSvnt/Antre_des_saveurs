<?php

// Définition du namespace
namespace App\Model;

// Import des classes
use App\Core\AbstractModel;
use App\Entity\Article;
use App\Entity\Category;
use App\Entity\NativeCountry;

class ArticleModel extends AbstractModel
{
    // Ajout de la fonction pour récupérer les TOUT les articles
    function getAllArticles(): array
    {
        // Préparation de la requête
        $sql = 'SELECT 
        a.id AS article_id,
        a.name AS article_name,
        a.description AS article_description,
        a.quantity AS article_quantity,
        a.price AS article_price,
        a.arrival_date AS article_arrival_date,
        c.id AS category_id,
        c.name AS category_name,
        nc.id AS native_country_id,
        nc.name AS native_country_name,
        a.image AS article_image,
        a.spotlight AS article_spotlight,
        a.isActive AS article_isActive
        FROM article AS a
        INNER JOIN category AS c ON a.category_id = c.id
        INNER JOIN native_country AS nc ON a.native_country_id = nc.id
        ORDER BY a.id ASC;';

        // Préparation de la reqûete SQL
        $pdoStatement = self::$pdo->prepare($sql);

        // Éxecution de la requête
        $pdoStatement->execute();

        // Récupération du résultat
        $results = $pdoStatement->fetchAll();

        // Si pas de résultat, retourne un tableau vide
        if (!$results) {
            return [];
        }

        $articles = [];

        foreach ($results as $result) {

            $category = new Category(
                $result['category_id'],
                $result['category_name']
            );

            $nativeCountry = new NativeCountry(
                $result['native_country_id'],
                $result['native_country_name']
            );

            $article = new Article(
                $result['article_id'],
                $result['article_name'],
                $result['article_description'],
                $result['article_quantity'],
                $result['article_price'],
                $result['article_arrival_date'],
                $category,
                $nativeCountry,
                $result['article_image'],
                $result['article_spotlight'],
                $result['article_isActive']
            );

            $articles[] = $article;
        }

        return $articles;
    }

    // Ajout d'une fonction pour récupérer les articles 'SPOTLIGHT'

    function getSpotlightedArticles(): array
    {
        $sql = 'SELECT * FROM article WHERE spotlight = 1';
        $pdoStatement = self::$pdo->prepare($sql);

        $pdoStatement->execute();

        $articles = $pdoStatement->fetchAll();

        return $articles;
    }

    // Ajout d'une fonction pour récupérer un article à l'aide de son ID
    function getOneArticleById(?int $articleId): array
    {
        $sql = 'SELECT 
                a.id AS article_id,
                a.name AS article_name,
                a.description AS article_description,
                a.quantity AS article_quantity,
                a.price AS article_price,
                a.arrival_date AS article_arrival_date,
                c.id AS category_id,
                c.name AS category_name,
                nc.id AS native_country_id,
                nc.name AS native_country_name,
                a.image AS article_image,
                a.spotlight AS article_spotlight,
                a.isActive AS article_isActive
                FROM article AS a
                INNER JOIN category AS c ON a.category_id = c.id
                INNER JOIN native_country AS nc ON a.native_country_id = nc.id
                WHERE A.id = ?';

        $pdoStatement = self::$pdo->prepare($sql);

        // Execution de la requête
        $pdoStatement->execute([$articleId]);

        // Récupération et retour des résultats de la requête
        $article = $pdoStatement->fetch();

        if (!$article) {
            return [];
        }

        return $article;
    }

    function getOneImageArticleById(?int $articleId): array
    {
        $sql = 'SELECT 
                a.image AS article_image
                FROM article AS a
                WHERE A.id = ?';

        $pdoStatement = self::$pdo->prepare($sql);

        // Execution de la requête
        $pdoStatement->execute([$articleId]);

        // Récupération et retour des résultats de la requête
        $article = $pdoStatement->fetch();

        if (!$article) {
            return [];
        }

        return $article;
    }

    /**
     * function pour retirer un article de la BDD en fonction de son ID
     */
    function deleteArticle(int $articleId)
    {
        $sql = 'DELETE FROM article WHERE id = ?';

        $pdoStatement = self::$pdo->prepare($sql);

        $pdoStatement->execute([$articleId]);
    }

    /**
     * function pour retirer ou ajouter la mise en avant d'un article
     */
    function changeSpotlight(int $articleSpotlight, int $articleId)
    {
        $sql = 'UPDATE article
                SET spotlight = ?
                WHERE id = ?';

        $pdoStatement = self::$pdo->prepare($sql);
        $pdoStatement->execute([$articleSpotlight, $articleId]);
    }

    /**
     * function pour retirer ou ajouter la mise en avant d'un article
     */
    function updateActiveArticle(int $articleIsActive, int $articleId)
    {
        $sql = 'UPDATE article
                SET isActive = ?
                WHERE id = ?';

        $pdoStatement = self::$pdo->prepare($sql);
        $pdoStatement->execute([$articleIsActive, $articleId]);
    }

    function insertArticle(string $name, string $description, int $quantity, float $price, ?string $arrivalDate, int $category, int $nativeCountry, string $imageArticle, int $spotlight, int $isActive)
    {
        $sql = 'INSERT INTO article
                (name, description, quantity, price, arrival_date, category_id, native_country_id, image, spotlight, isActive)
                VALUES (?,?,?,?,?,?,?,?,?,?)';

        $pdoStatement = self::$pdo->prepare($sql);
        $pdoStatement->execute([$name, $description, $quantity, $price, $arrivalDate, $category, $nativeCountry, $imageArticle, $spotlight, $isActive]);

        return self::$pdo->lastInsertId();
    }


    function updateArticle(string $name, string $description, int $quantity, float $price, ?string $arrivalDate, int $category, int $nativeCountry, string $imageArticle, int $spotlight, int $isActive, int $articleId)
    {
        $sql = 'UPDATE article
                SET name = ?, description = ?, quantity = ?, price = ?, arrival_date = ?, category_id = ?, native_country_id = ?, image = ?, spotlight = ?, isActive = ?
                WHERE id = ?';

        $pdoStatement = self::$pdo->prepare($sql);
        $pdoStatement->execute([$name, $description, $quantity, $price, $arrivalDate, $category, $nativeCountry, $imageArticle, $spotlight, $isActive, $articleId]);
    }
}
