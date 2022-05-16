<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Entity(repositoryClass=AnnonceRepository::class)
 * @Vich\Uploadable
 */
class Annonce
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titre;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $surface;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $typedebien;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $etat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $gouvernorat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $transaction;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageName;

    /**
     * @vich\UploadableField(mapping="property_image", fileNameProperty="imageName")
     * @var File|null
     */
     private $imageFile;

     //----------------------------------------------------------------------------//

     /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageName1;

    /**
     * @var File|null
     * @vich\UploadableField(mapping="property_image", fileNameProperty="imageName1")
     */
     private $imageFile1;

     /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageName2;

    /**
     * @var File|null
     * @vich\UploadableField(mapping="property_image", fileNameProperty="imageName2")
     */
     private $imageFile2;

     /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageName3;

    /**
     * @var File|null
     * @vich\UploadableField(mapping="property_image", fileNameProperty="imageName3")
     */
     private $imageFile3;

     /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageName4;

    /**
     * @var File|null
     * @vich\UploadableField(mapping="property_image", fileNameProperty="imageName4")
     */
     private $imageFile4;

     /**
     * @ORM\Column(type="string" ,nullable=true )
     *
     * @var string|null
     */
    private $imageName5;

    /**
     * @var File|null
     * @vich\UploadableField(mapping="property_image", fileNameProperty="imageName5", size="imageSize5")
     */
     private $imageFile5;

     /**
     * @ORM\Column(type="integer" ,nullable=true)
     *
     * @var int|null
     */
    private $imageSize5;

     /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageName6;

    /**
     * @var File|null
     * @vich\UploadableField(mapping="property_image", fileNameProperty="imageName6")
     */
     private $imageFile6;

     /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageName7;

    /**
     * @var File|null
     * @vich\UploadableField(mapping="property_image", fileNameProperty="imageName7")
     */
     private $imageFile7;

     /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageName8;

    /**
     * @var File|null
     * @vich\UploadableField(mapping="property_image", fileNameProperty="imageName8")
     */
     private $imageFile8;

     //------------------------------------------------------------------//
     /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;
    //-----------------------------------------------------//
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt1;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt2;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt3;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt4;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt5;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt6;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt7;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt8;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="annonces")
     */
    private $user;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nombredeposte;

    /**
     * @ORM\Column(type="boolean",nullable=true)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $annonceType;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $budgetMin;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $budgetMax;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $surfaceMin;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $surfaceMax;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $annonceConfier;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $telephone;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getSurface(): ?float
    {
        return $this->surface;
    }

    public function setSurface(float $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

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

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getGouvernorat(): ?string
    {
        return $this->gouvernorat;
    }

    public function setGouvernorat(string $gouvernorat): self
    {
        $this->gouvernorat = $gouvernorat;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function setImageFile(?File $imageFile = null): void
    { $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }
    //---------------------------------------------------------------------------------//
    public function setImageFile1(?File $imageFile1 = null): void
    {
        $this->imageFile1 = $imageFile1;

        if (null !== $imageFile1) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt1 = new \DateTimeImmutable();
        }
    }

    public function getImageFile1(): ?File
    {
        return $this->imageFile1;
    }

    public function setImageName1(?string $imageName1): void
    {
        $this->imageName1 = $imageName1;
    }

    public function getImageName1(): ?string
    {
        return $this->imageName1;
    }
    //------------------------------------------------------------------------------//
    public function setImageFile2(?File $imageFile2 = null): void
    {
        $this->imageFile2 = $imageFile2;

        if (null !== $imageFile2) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt2 = new \DateTimeImmutable();
        }
    }

    public function getImageFile2(): ?File
    {
        return $this->imageFile2;
    }

    public function setImageName2(?string $imageName2): void
    {
        $this->imageName2 = $imageName2;
    }

    public function getImageName2(): ?string
    {
        return $this->imageName2;
    }
    //----------------------------------------------------------------------------//
    public function setImageFile3(?File $imageFile3 = null): void
    {
        $this->imageFile3 = $imageFile3;

        if (null !== $imageFile3) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt3 = new \DateTimeImmutable();
        }
    }

    public function getImageFile3(): ?File
    {
        return $this->imageFile3;
    }

    public function setImageName3(?string $imageName3): void
    {
        $this->imageName3 = $imageName3;
    }

    public function getImageName3(): ?string
    {
        return $this->imageName3;
    }
    //---------------------------------------------------------------------//

    public function setImageFile4(?File $imageFile4 = null): void
    {
        $this->imageFile4 = $imageFile4;

        if (null !== $imageFile4) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt4 = new \DateTimeImmutable();
        }
    }

    public function getImageFile4(): ?File
    {
        return $this->imageFile4;
    }

    public function setImageName4(?string $imageName4): void
    {
        $this->imageName4 = $imageName4;
    }

    public function getImageName4(): ?string
    {
        return $this->imageName4;
    }
    //---------------------------------------------------------------------//
    public function setImageFile5(?File $imageFile5 = null): void
    {
        $this->imageFile5 = $imageFile5;

        if (null !== $imageFile5) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt5 = new \DateTimeImmutable();
        }
    }

    public function getImageFile5(): ?File
    {
        return $this->imageFile5;
    }

    public function setImageNam5(?string $imageName5): void
    {
        $this->imageName5 = $imageName5;
    }

    public function getImageName5(): ?string
    {
        return $this->imageName5;
    }
    //-----------------------------------------------------------------------//
    public function setImageFile6(?File $imageFile6 = null): void
    {
        $this->imageFile6 = $imageFile6;

        if (null !== $imageFile6) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt6 = new \DateTimeImmutable();
        }
    }

    public function getImageFile6(): ?File
    {
        return $this->imageFile6;
    }

    public function setImageName6(?string $imageName6): void
    {
        $this->imageName6 = $imageName6;
    }

    public function getImageName6(): ?string
    {
        return $this->imageName6;
    }
    //------------------------------------------------------------//
    public function setImageFile7(?File $imageFile7 = null): void
    {
        $this->imageFile7 = $imageFile7;

        if (null !== $imageFile7) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt7 = new \DateTimeImmutable();
        }
    }

    public function getImageFile7(): ?File
    {
        return $this->imageFile7;
    }

    public function setImageName7(?string $imageName7): void
    {
        $this->imageName7 = $imageName7;
    }

    public function getImageName7(): ?string
    {
        return $this->imageName7;
    }
    //-----------------------------------------------/
    public function setImageFile8(?File $imageFile8 = null): void
    {
        $this->imageFile8 = $imageFile8;

        if (null !== $imageFile8) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt8 = new \DateTimeImmutable();
        }
    }

    public function getImageFile8(): ?File
    {
        return $this->imageFile8;
    }

    public function setImageName8(?string $imageName8): void
    {
        $this->imageName8 = $imageName8;
    }

    public function getImageName8(): ?string
    {
        return $this->imageName8;
    }
    //----------------------------------------------------------
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
    //----------------------------------------------------------
    public function getUpdatedAt1(): ?\DateTimeInterface
    {
        return $this->updatedAt1;
    }

    public function setUpdatedAt1(?\DateTimeInterface $updatedAt1): self
    {
        $this->updatedAt1 = $updatedAt1;

        return $this;
    }
    //-------------------------------------------------------------
    public function getUpdatedAt2(): ?\DateTimeInterface
    {
        return $this->updatedAt2;
    }

    public function setUpdatedAt2(?\DateTimeInterface $updatedAt2): self
    {
        $this->updatedAt2 = $updatedAt2;

        return $this;
    }
    //---------------------------------------------------------
    public function getUpdatedAt3(): ?\DateTimeInterface
    {
        return $this->updatedAt3;
    }

    public function setUpdatedAt3(?\DateTimeInterface $updatedAt3): self
    {
        $this->updatedAt3 = $updatedAt3;

        return $this;
    }
    //----------------------------------------------------------
    public function getUpdatedAt4(): ?\DateTimeInterface
    {
        return $this->updatedAt4;
    }

    public function setUpdatedAt4(?\DateTimeInterface $updatedAt4): self
    {
        $this->updatedAt4 = $updatedAt4;

        return $this;
    }
    //--------------------------------------------------------------
    public function getUpdatedAt5(): ?\DateTimeInterface
    {
        return $this->updatedAt5;
    }

    public function setUpdatedAt5(?\DateTimeInterface $updatedAt5): self
    {
        $this->updatedAt5 = $updatedAt5;

        return $this;
    }
    //-------------------------------------------------------------
    public function getUpdatedAt6(): ?\DateTimeInterface
    {
        return $this->updatedAt6;
    }

    public function setUpdatedAt6(?\DateTimeInterface $updatedAt6): self
    {
        $this->updatedAt6 = $updatedAt6;

        return $this;
    }
    //-------------------------------------------------------------
    public function getUpdatedAt7(): ?\DateTimeInterface
    {
        return $this->updatedAt7;
    }

    public function setUpdatedAt7(?\DateTimeInterface $updatedAt7): self
    {
        $this->updatedAt7 = $updatedAt7;

        return $this;
    }
    //---------------------------------------------------------------
    public function getUpdatedAt8(): ?\DateTimeInterface
    {
        return $this->updatedAt8;
    }

    public function setUpdatedAt8(?\DateTimeInterface $updatedAt8): self
    {
        $this->updatedAt8 = $updatedAt8;

        return $this;
    }
    //-----------------------------------------------------
    public function setImageSize5(?int $imageSize5): void
    {
        $this->imageSize5 = $imageSize5;
    }

    public function getImageSize5(): ?int
    {
        return $this->imageSize5;
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

    public function getNombredeposte(): ?int
    {
        return $this->nombredeposte;
    }

    public function setNombredeposte(int $nombredeposte): self
    {
        $this->nombredeposte = $nombredeposte;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getAnnonceType(): ?string
    {
        return $this->annonceType;
    }

    public function setAnnonceType(string $annonceType): self
    {
        $this->annonceType = $annonceType;

        return $this;
    }

    public function getBudgetMin(): ?float
    {
        return $this->budgetMin;
    }

    public function setBudgetMin(?float $budgetMin): self
    {
        $this->budgetMin = $budgetMin;

        return $this;
    }

    public function getBudgetMax(): ?float
    {
        return $this->budgetMax;
    }

    public function setBudgetMax(?float $budgetMax): self
    {
        $this->budgetMax = $budgetMax;

        return $this;
    }

    public function getSurfaceMin(): ?float
    {
        return $this->surfaceMin;
    }

    public function setSurfaceMin(?float $surfaceMin): self
    {
        $this->surfaceMin = $surfaceMin;

        return $this;
    }

    public function getSurfaceMax(): ?float
    {
        return $this->surfaceMax;
    }

    public function setSurfaceMax(?float $surfaceMax): self
    {
        $this->surfaceMax = $surfaceMax;

        return $this;
    }

    public function getAnnonceConfier(): ?string
    {
        return $this->annonceConfier;
    }

    public function setAnnonceConfier(?string $annonceConfier): self
    {
        $this->annonceConfier = $annonceConfier;

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
