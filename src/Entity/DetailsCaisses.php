<?php

namespace App\Entity;

use App\Entity\Trait\SlugTrait;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Trait\CreatedAtTrait;
use Doctrine\Common\Collections\Collection;
use App\Repository\DetailsCaissesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: DetailsCaissesRepository::class)]
class DetailsCaisses
{
    use CreatedAtTrait;
    use SlugTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateOp = null;

    #[ORM\Column(length: 100)]
    private ?string $designation = null;

    #[ORM\Column]
    private ?float $montant = null;

    #[ORM\ManyToOne(inversedBy: 'detailsCaisses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Caisses $caisse = null;

    #[ORM\ManyToOne(inversedBy: 'detailsCaisses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $author = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateOp(): ?\DateTimeImmutable
    {
        return $this->dateOp;
    }

    public function setDateOp(\DateTimeImmutable $dateOp): static
    {
        $this->dateOp = $dateOp;

        return $this;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): static
    {
        $this->designation = $designation;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): static
    {
        $this->montant = $montant;

        return $this;
    }

    public function getCaisse(): ?Caisses
    {
        return $this->caisse;
    }

    public function setCaisse(?Caisses $caisse): static
    {
        $this->caisse = $caisse;

        return $this;
    }

    public function getAuthor(): ?Users
    {
        return $this->author;
    }

    public function setAuthor(?Users $author): static
    {
        $this->author = $author;

        return $this;
    }
}