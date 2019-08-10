<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DevisRepository")
 */
class Devis
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $numdevis;

    /**
     * @ORM\Column(type="string", length=13)
     */
    private $numtva;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datedevis;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vosinfos;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $infosclient;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $conditions;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $consignes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $designation1;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite1;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $prixht1;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $taxe1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $designation2;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantite2;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0, nullable=true)
     */
    private $prixht2;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0, nullable=true)
     */
    private $taxe2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $designation3;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantite3;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0, nullable=true)
     */
    private $prixht3;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0, nullable=true)
     */
    private $taxe3;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="devis", cascade="persist")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNumdevis(): ?string
    {
        return $this->numdevis;
    }

    public function setNumdevis(string $numdevis): self
    {
        $this->numdevis = $numdevis;

        return $this;
    }

    public function getNumtva(): ?string
    {
        return $this->numtva;
    }

    public function setNumtva(string $numtva): self
    {
        $this->numtva = $numtva;

        return $this;
    }

    public function getDatedevis(): ?\DateTimeInterface
    {
        return $this->datedevis;
    }

    public function setDatedevis(\DateTimeInterface $datedevis): self
    {
        $this->datedevis = $datedevis;

        return $this;
    }

    public function getVosinfos(): ?string
    {
        return $this->vosinfos;
    }

    public function setVosinfos(string $vosinfos): self
    {
        $this->vosinfos = $vosinfos;

        return $this;
    }

    public function getInfosclient(): ?string
    {
        return $this->infosclient;
    }

    public function setInfosclient(string $infosclient): self
    {
        $this->infosclient = $infosclient;

        return $this;
    }

    public function getConditions(): ?string
    {
        return $this->conditions;
    }

    public function setConditions(string $conditions): self
    {
        $this->conditions = $conditions;

        return $this;
    }

    public function getConsignes(): ?string
    {
        return $this->consignes;
    }

    public function setConsignes(string $consignes): self
    {
        $this->consignes = $consignes;

        return $this;
    }

    public function getDesignation1(): ?string
    {
        return $this->designation1;
    }

    public function setDesignation1(string $designation1): self
    {
        $this->designation1 = $designation1;

        return $this;
    }

    public function getQuantite1(): ?int
    {
        return $this->quantite1;
    }

    public function setQuantite1(int $quantite1): self
    {
        $this->quantite1 = $quantite1;

        return $this;
    }

    public function getPrixht1()
    {
        return $this->prixht1;
    }

    public function setPrixht1($prixht1): self
    {
        $this->prixht1 = $prixht1;

        return $this;
    }

    public function getTaxe1()
    {
        return $this->taxe1;
    }

    public function setTaxe1($taxe1): self
    {
        $this->taxe1 = $taxe1;

        return $this;
    }

    public function getDesignation2(): ?string
    {
        return $this->designation2;
    }

    public function setDesignation2(string $designation2): self
    {
        $this->designation2 = $designation2;

        return $this;
    }

    public function getQuantite2(): ?int
    {
        return $this->quantite2;
    }

    public function setQuantite2(?int $quantite2): self
    {
        $this->quantite2 = $quantite2;

        return $this;
    }

    public function getPrixht2()
    {
        return $this->prixht2;
    }

    public function setPrixht2($prixht2): self
    {
        $this->prixht2 = $prixht2;

        return $this;
    }

    public function getTaxe2()
    {
        return $this->taxe2;
    }

    public function setTaxe2($taxe2): self
    {
        $this->taxe2 = $taxe2;

        return $this;
    }

    public function getDesignation3(): ?string
    {
        return $this->designation3;
    }

    public function setDesignation3(?string $designation3): self
    {
        $this->designation3 = $designation3;

        return $this;
    }

    public function getQuantite3(): ?int
    {
        return $this->quantite3;
    }

    public function setQuantite3(?int $quantite3): self
    {
        $this->quantite3 = $quantite3;

        return $this;
    }

    public function getPrixht3()
    {
        return $this->prixht3;
    }

    public function setPrixht3($prixht3): self
    {
        $this->prixht3 = $prixht3;

        return $this;
    }

    public function getTaxe3()
    {
        return $this->taxe3;
    }

    public function setTaxe3($taxe3): self
    {
        $this->taxe3 = $taxe3;

        return $this;
    }
}
