<?php 
namespace App\Entity;

class AnnonceSearch{

/**
 * var int|null
 */
private $maxPrice;

/**
 * var int|null
 */
private $maxSurface;

/**
 * var string|null
 */
private $transaction;

/**
 * var string|null
 */
private $typedebien;

/**
 * var string|null
 */
private $ville;

    public function getTypedebien(): ?string
    {
        return $this->typedebien;
    }

    public function setTypedebien(string $typedebien): self
    {
        $this->typedebien = $typedebien;

        return $this;
    }
    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }
    public function getTransaction(): ?string
    {
        return $this->transaction;
    }

    public function setTransaction(string $transaction): self
    {
        $this->transaction = $transaction;

        return $this;
    }

    public function getMaxPrice(): ?string
    {
        return $this->maxPrice;
    }

    public function setMaxPrice(string $maxPrice): self
    {
        $this->maxPrice = $maxPrice;

        return $this;
    }

    public function getMaxSurface(): ?string
    {
        return $this->maxSurface;
    }

    public function setMaxSurface(string $maxSurface): self
    {
        $this->maxSurface = $maxSurface;

        return $this;
    }

    
}
?>