<?php

namespace App\Entity;

class Category
{
    // Category (celles de la table article de la BDD)
    private ?int $category_id;
    private string $category_name;

    public function __construct(
        ?int $category_id,
        string $category_name
    ) {
        $this->category_id = $category_id;
        $this->category_name = $category_name;
    }

    /**
     * Getter et Setter (accesseurs et mutateurs)
     */

    public function getCategoryId(): ?int
    {
        return $this->category_id;
    }
    public function setcategoryId(?int $category_id)
    {
        $this->category_id = $category_id;
        return $this;
    }

    public function getCategoryName(): string
    {
        return $this->category_name;
    }
    public function setCategoryName(string $category_name): self
    {
        $this->category_name = $category_name;
        return $this;
    }
}
