<?php

namespace App\Entity;

class NativeCountry
{
    // NativeCountry (celles de la table article de la BDD)
    private ?int $native_country_id;
    private string $native_country_name;

    public function __construct(
        ?int $native_country_id,
        string $native_country_name
    ) {
        $this->native_country_id = $native_country_id;
        $this->native_country_name = $native_country_name;
    }

    /**
     * Getter et Setter (accesseurs et mutateurs)
     */

    public function getNativeCountryId(): ?int
    {
        return $this->native_country_id;
    }
    public function setNativeCountryId(?int $native_country_id)
    {
        $this->native_country_id = $native_country_id;
        return $this;
    }

    public function getNativeCountryName(): string
    {
        return $this->native_country_name;
    }
    public function setNativeCountryName(string $native_country_name): self
    {
        $this->native_country_name = $native_country_name;
        return $this;
    }
}
