<?php
namespace App\Entity;

use App\Repository\AnnonceConfierRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnnonceConfierRepository::class)
 */
class AnnonceConfier
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $transaction;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $ville;

    /**
     * @ORM\Column(type="integer",nullable=true)
     */
    private $budgetMin;

    /**
     * @ORM\Column(type="integer",nullable=true)
     */
    private $budgetMax;

    /**
     * @ORM\Column(type="integer",nullable=true)
     */
    private $surfaceMin;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $etat;

    /**
     * @ORM\Column(type="integer",nullable=true)
     */
    private $surfaceMax;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="annoncesConfiers")
     */
    private $user;
    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typedebien;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getBudgetMin(): ?int
    {
        return $this->budgetMin;
    }

    public function setBudgetMin(int $budgetMin): self
    {
        $this->budgetMin = $budgetMin;

        return $this;
    }

    public function getBudgetMax(): ?int
    {
        return $this->budgetMax;
    }

    public function setBudgetMax(int $budgetMax): self
    {
        $this->budgetMax = $budgetMax;

        return $this;
    }

    public function getSurfaceMin(): ?int
    {
        return $this->surfaceMin;
    }

    public function setSurfaceMin(int $surfaceMin): self
    {
        $this->surfaceMin = $surfaceMin;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getSurfaceMax(): ?int
    {
        return $this->surfaceMax;
    }

    public function setSurfaceMax(int $surfaceMax): self
    {
        $this->surfaceMax = $surfaceMax;

        return $this;
    }

    public function getCreatedAt(): ?\datetime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\datetime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getTypedebien(): ?string
    {
        return $this->typedebien;
    }

    public function setTypedebien(string $typedebien): self
    {
        $this->typedebien = $typedebien;

        return $this;
    }
    public function __toString()
    {
        return $this->ville;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }
}
