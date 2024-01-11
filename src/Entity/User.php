<?php

namespace App\Entity;

use DateTimeImmutable;

class User
{
    private ?int $user_id;
    private string $user_lastname;
    private string $user_firstname;
    private string $user_email;
    private string $user_password;
    private ?string $user_phone;
    private DateTimeImmutable $user_createdAt;

    public function __construct(
        ?int $user_id,
        string $user_lastname,
        string $user_firstname,
        string $user_email,
        string $user_password,
        ?string $user_phone,
        string $user_createdAt
    ) {
        $this->user_id = $user_id;
        $this->user_lastname = $user_lastname;
        $this->user_firstname = $user_firstname;
        $this->user_email = $user_email;
        $this->user_password = $user_password;
        $this->user_phone = $user_phone;
        $this->user_createdAt = $user_createdAt;
    }

    function getFormattedCreationDate(): string
    {
        if ($this->user_createdAt == null) {

            return '';
        }

        return $this->user_createdAt->format('d/m/Y');
    }


    /**
     * Get the value of user_id
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     */
    public function setUserId($user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of user_lastname
     */
    public function getUserLastname()
    {
        return $this->user_lastname;
    }

    /**
     * Set the value of user_lastname
     */
    public function setUserLastname($user_lastname): self
    {
        $this->user_lastname = $user_lastname;

        return $this;
    }

    /**
     * Get the value of user_firstname
     */
    public function getUserFirstname()
    {
        return $this->user_firstname;
    }

    /**
     * Set the value of user_firstname
     */
    public function setUserFirstname($user_firstname): self
    {
        $this->user_firstname = $user_firstname;

        return $this;
    }

    /**
     * Get the value of user_email
     */
    public function getUserEmail()
    {
        return $this->user_email;
    }

    /**
     * Set the value of user_email
     */
    public function setUserEmail($user_email): self
    {
        $this->user_email = $user_email;

        return $this;
    }

    /**
     * Get the value of user_password
     */
    public function getUserPassword()
    {
        return $this->user_password;
    }

    /**
     * Set the value of user_password
     */
    public function setUserPassword($user_password): self
    {
        $this->user_password = $user_password;

        return $this;
    }

    /**
     * Get the value of user_phone
     */
    public function getUserPhone()
    {
        return $this->user_phone;
    }

    /**
     * Set the value of user_phone
     */
    public function setUserPhone($user_phone): self
    {
        $this->user_phone = $user_phone;

        return $this;
    }

    /**
     * Get the value of user_createdAt
     */
    public function getUserCreatedAt()
    {
        return $this->user_createdAt;
    }

    /**
     * Set the value of user_createdAt
     */
    public function setUserCreatedAt($user_createdAt): self
    {
        $this->user_createdAt = $user_createdAt;

        return $this;
    }
}
