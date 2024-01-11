<?php

namespace App\Entity;

use App\Entity\User;
use DateTimeImmutable;

class Order
{
    private ?int $order_id;
    private User $user;
    private DateTimeImmutable $order_date_order;
    private float $order_total_amount;

    public function __construct(
        ?int $order_id,
        User $user,
        string $order_date_order,
        float $order_total_amount
    ) {
        $this->order_id = $order_id;
        $this->user = $user;
        $this->order_date_order = new DateTimeImmutable($order_date_order);
        $this->order_total_amount = $order_total_amount;
    }

    function getFormattedArrivalDate(): string
    {
        if ($this->order_date_order == null) {
            return '';
        }

        return $this->order_date_order->format('d/m/Y');
    }

    /**
     * Get the value of order_id
     */
    public function getorderId()
    {
        return $this->order_id;
    }

    /**
     * Set the value of order_id
     */
    public function setorderId($order_id): self
    {
        $this->order_id = $order_id;

        return $this;
    }

    /**
     * Get the value of user
     */
    public function getorderUserId()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     */
    public function setorderUserId($user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of order_date_order
     */
    public function getorderDateorder()
    {
        return $this->order_date_order;
    }

    /**
     * Set the value of order_date_order
     */
    public function setorderDateorder($order_date_order): self
    {
        $this->order_date_order = $order_date_order;

        return $this;
    }

    /**
     * Get the value of order_total_amount
     */
    public function getorderTotalAmount()
    {
        return $this->order_total_amount;
    }

    /**
     * Set the value of order_total_amount
     */
    public function setorderTotalAmount($order_total_amount): self
    {
        $this->order_total_amount = $order_total_amount;

        return $this;
    }
}
