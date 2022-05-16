<?php 
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use  App\Entity\Annonce;
class Contact
{

/**
 * var string|null
 * @Assert\NotBlank()
 * @Assert\Length(min=2,max=100)
 */
private $firstname;

/**
 * var string|null
 * @Assert\NotBlank()
 * @Assert\Length(min=2,max=100)
 */
private $lastname;

/**
 * var string|null
 * @Assert\NotBlank()
 */
private $phone;
/**
 * var string|null
 * @Assert\NotBlank()
 * @Assert\Email()
 */
private $email;

/**
 * var string|null
 * @Assert\NotBlank()
 * @Assert\Length(min=10)
 */
private $message;
/**
 * var Annonce|null
 */
private $Annonce;

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
    public function getAnnonce():?Annonce
    {
        return $this->Annonce;
    }
    public function setAnnonce(?Annonce $Annonce):Contact
    {
        $this->Annonce = $Annonce;
        return $this;
    }
}
?>