<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(
 *  fields={"email"},
 *  message= "L'email que vous avez indiqué est déjà utilisé"
 * )
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     * min="1",
     * max="3",
     * minMessage="Votre mot de passe doit faire minimum 1 caractères",
     * maxMessage="Votre mot de passe doit faire maximum 3 caractères"
     * )
     * @Assert\EqualTo(propertyPath="confirmPassword", message="Vous n'avez pas tapé le même mot de passe")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\EqualTo(propertyPath="password")
     */
    private $confirmPassword;


    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];



    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Facture", mappedBy="user")
     */
    private $factures;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Devis", mappedBy="user")
     */
    private $deviss;



    public function __construct()
    {
        $this->factures = new ArrayCollection();
        $this->deviss = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getConfirmPassword(): ?string
    {
        return $this->confirmPassword;
    }

    public function setConfirmPassword(string $confirmPassword): self
    {
        $this->confirmPassword = $confirmPassword;
        
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

    /**
     * @return Collection|Facture[]
     */
    public function getFactures(): Collection
    {
        return $this->factures;
    }

    public function addFacture(Facture $facture): self
    {
        if (!$this->factures->contains($facture)) {
            $this->factures[] = $facture;
            $facture->setUser($this);
        }

        return $this;
    }

    public function removeFacture(Facture $facture): self
    {
        if ($this->factures->contains($facture)) {
            $this->factures->removeElement($facture);
            // set the owning side to null (unless already changed)
            if ($facture->getUser() === $this) {
                $facture->setUser(null);
            }
        }

        return $this;
    }


    /**
     * @return Collection|Devis[]
     */
    public function getDeviss(): Collection
    {
        return $this->deviss;
    }

    public function addDevis(Devis $devis): self
    {
        if (!$this->deviss->contains($devis)) {
            $this->deviss[] = $devis;
            $devis->setUser($this);
        }

        return $this;
    }

    public function removeDevis(Devis $devis): self
    {
        if ($this->deviss->contains($devis)) {
            $this->deviss->removeElement($devis);
            // set the owning side to null (unless already changed)
            if ($devis->getUser() === $this) {
                $devis->setUser(null);
            }
        }

        return $this;
    }

    public function eraseCredentials()
    {

    }

    public function getSalt()
    {

    }

     public function getRoles(): ?array
    {
        $roles = $this->roles;

        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }
    
    /*
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }
 */


}
