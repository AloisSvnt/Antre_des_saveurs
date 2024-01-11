<?php

namespace App\Entity;

use DateTimeImmutable;
use App\Entity\Category;
use App\Entity\NativeCountry;

class Article
{
    // Articles (celles de la table article de la BDD)
    private ?int $article_id;
    private string $article_name;
    private string $article_description;
    private int $article_quantity;
    private float $article_price;
    private DateTimeImmutable $article_arrival_date;
    private Category $category;
    private NativeCountry $native_country;
    private string $article_image;
    private int $article_spotlight;
    private int $article_isActive;

    // Constructeur
    public function __construct(
        ?int $article_id,
        string $article_name,
        string $article_description,
        int $article_quantity,
        float $article_price,
        string $article_arrival_date,
        Category $category,
        NativeCountry $native_country,
        string $article_image,
        int $article_spotlight,
        int $article_isActive,
    ) {
        $this->article_id = $article_id;
        $this->article_name = $article_name;
        $this->article_description = $article_description;
        $this->article_quantity = $article_quantity;
        $this->article_price = $article_price;
        $this->article_arrival_date = new \DateTimeImmutable($article_arrival_date);
        $this->category = $category;
        $this->native_country = $native_country;
        $this->article_image = $article_image;
        $this->article_spotlight = $article_spotlight;
        $this->article_isActive = $article_isActive;
    }

    /**
     * Formatte une date au format "français"
     * @param null|string $date : date au format américain ('2023-05-12')
     * @return string La date formattée 
     */
    function getFormattedArrivalDate(): string
    {
        // Si la date est null (pas de deadline)...
        if ($this->article_arrival_date == null) {

            // ... on retourne une chaîne vide
            return '';
        }

        // Formattage de la date
        return $this->article_arrival_date->format('d/m/Y');
    }

    /**
     * Get the value of article_id
     */
    public function getArticleId()
    {
        return $this->article_id;
    }

    /**
     * Set the value of article_id
     */
    public function setArticleId($article_id): self
    {
        $this->article_id = $article_id;

        return $this;
    }

    /**
     * Get the value of article_name
     */
    public function getArticleName()
    {
        return $this->article_name;
    }

    /**
     * Set the value of article_name
     */
    public function setArticleName($article_name): self
    {
        $this->article_name = $article_name;

        return $this;
    }

    /**
     * Get the value of article_description
     */
    public function getArticleDescription()
    {
        return $this->article_description;
    }

    /**
     * Set the value of article_description
     */
    public function setArticleDescription($article_description): self
    {
        $this->article_description = $article_description;

        return $this;
    }

    /**
     * Get the value of article_quantity
     */
    public function getArticleQuantity()
    {
        return $this->article_quantity;
    }

    /**
     * Set the value of article_quantity
     */
    public function setArticleQuantity($article_quantity): self
    {
        $this->article_quantity = $article_quantity;

        return $this;
    }

    /**
     * Get the value of article_price
     */
    public function getArticlePrice()
    {
        return $this->article_price;
    }

    /**
     * Set the value of article_price
     */
    public function setArticlePrice($article_price): self
    {
        $this->article_price = $article_price;

        return $this;
    }

    /**
     * Get the value of article_arrival_date
     */
    public function getArticleArrivalDate()
    {
        return $this->article_arrival_date;
    }

    /**
     * Set the value of article_arrival_date
     */
    public function setArticleArrivalDate($article_arrival_date): self
    {
        $this->article_arrival_date = $article_arrival_date;

        return $this;
    }

    /**
     * Get the value of category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     */
    public function setCategory($category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get the value of native_country
     */
    public function getNativeCountry()
    {
        return $this->native_country;
    }

    /**
     * Set the value of native_country
     */
    public function setNativeCountry($native_country): self
    {
        $this->native_country = $native_country;

        return $this;
    }

    /**
     * Get the value of article_image
     */
    public function getArticleImage()
    {
        return $this->article_image;
    }

    /**
     * Set the value of article_image
     */
    public function setArticleImage($article_image): self
    {
        $this->article_image = $article_image;

        return $this;
    }

    /**
     * Get the value of article_spotlight
     */
    public function getArticleSpotlight()
    {
        return $this->article_spotlight;
    }

    /**
     * Set the value of article_spotlight
     */
    public function setArticleSpotlight($article_spotlight): self
    {
        $this->article_spotlight = $article_spotlight;

        return $this;
    }

    /**
     * Get the value of article_isActive
     */
    public function getArticleIsActive()
    {
        return $this->article_isActive;
    }

    /**
     * Set the value of article_isActive
     */
    public function setArticleIsActive($article_isActive): self
    {
        $this->article_isActive = $article_isActive;

        return $this;
    }
}
