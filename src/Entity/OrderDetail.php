<?php

namespace App\Entity;

use App\Entity\Order;
use App\Entity\Article;

class OrderDetail
{
    private ?int $order_detail_id;
    private Order $order;
    private Article $article;
    private int $order_detail_quantity;
    private float $order_detail_unit_price;

    public function __construct(
        ?int $order_detail_id,
        Order $order,
        Article $article,
        int $order_detail_quantity,
        float $order_detail_unit_price
    ) {
        $this->order_detail_id = $order_detail_id;
        $this->order = $order;
        $this->article = $article;
        $this->order_detail_quantity = $order_detail_quantity;
        $this->order_detail_unit_price = $order_detail_unit_price;
    }

    /**
     * Get the value of order_detail_id
     */
    public function getOrderDetailId()
    {
        return $this->order_detail_id;
    }

    /**
     * Set the value of order_detail_id
     */
    public function setOrderDetailId($order_detail_id): self
    {
        $this->order_detail_id = $order_detail_id;

        return $this;
    }

    /**
     * Get the value of order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set the value of order
     */
    public function setOrder($order): self
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get the value of article
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Set the value of article
     */
    public function setArticle($article): self
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get the value of order_detail_quantity
     */
    public function getOrderDetailQuantity()
    {
        return $this->order_detail_quantity;
    }

    /**
     * Set the value of order_detail_quantity
     */
    public function setOrderDetailQuantity($order_detail_quantity): self
    {
        $this->order_detail_quantity = $order_detail_quantity;

        return $this;
    }

    /**
     * Get the value of order_detail_unit_price
     */
    public function getOrderDetailUnitPrice()
    {
        return $this->order_detail_unit_price;
    }

    /**
     * Set the value of order_detail_unit_price
     */
    public function setOrderDetailUnitPrice($order_detail_unit_price): self
    {
        $this->order_detail_unit_price = $order_detail_unit_price;

        return $this;
    }
}
