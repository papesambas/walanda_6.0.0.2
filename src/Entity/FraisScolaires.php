<?php

namespace App\Entity;

use App\Entity\Trait\EntityTrackingTrait;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Trait\CreatedAtTrait;
use Doctrine\Common\Collections\Collection;
use App\Repository\FraisScolairesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: FraisScolairesRepository::class)]
class FraisScolaires
{
    use CreatedAtTrait;
    use EntityTrackingTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $designation = null;

    #[ORM\Column]
    private ?int $montant = null;

    #[ORM\ManyToOne(inversedBy: 'fraisScolaires')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Echeances $echeance = null;

    #[ORM\ManyToOne(inversedBy: 'fraisScolaires')]
    #[ORM\JoinColumn(nullable: false)]
    private ?FraisType $fraisType = null;

    #[ORM\ManyToMany(targetEntity: FraisScolarites::class, inversedBy: 'fraisScolaires')]
    private Collection $fraisScolarites;

    #[ORM\ManyToMany(targetEntity: AnneeScolaires::class, inversedBy: 'fraisScolaires')]
    private Collection $anneeScolaires;

    public function __construct()
    {
        $this->fraisScolarites = new ArrayCollection();
        $this->anneeScolaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): static
    {
        $this->montant = $montant;

        return $this;
    }

    public function getEcheance(): ?Echeances
    {
        return $this->echeance;
    }

    public function setEcheance(?Echeances $echeance): static
    {
        $this->echeance = $echeance;

        return $this;
    }

    public function getFraisType(): ?FraisType
    {
        return $this->fraisType;
    }

    public function setFraisType(?FraisType $fraisType): static
    {
        $this->fraisType = $fraisType;

        return $this;
    }

    /**
     * @return Collection<int, FraisScolarites>
     */
    public function getFraisScolarites(): Collection
    {
        return $this->fraisScolarites;
    }

    public function addFraisScolarite(FraisScolarites $fraisScolarite): static
    {
        if (!$this->fraisScolarites->contains($fraisScolarite)) {
            $this->fraisScolarites->add($fraisScolarite);
        }

        return $this;
    }

    public function removeFraisScolarite(FraisScolarites $fraisScolarite): static
    {
        $this->fraisScolarites->removeElement($fraisScolarite);

        return $this;
    }

    /**
     * @return Collection<int, AnneeScolaires>
     */
    public function getAnneeScolaires(): Collection
    {
        return $this->anneeScolaires;
    }

    public function addAnneeScolaire(AnneeScolaires $anneeScolaire): static
    {
        if (!$this->anneeScolaires->contains($anneeScolaire)) {
            $this->anneeScolaires->add($anneeScolaire);
        }

        return $this;
    }

    public function removeAnneeScolaire(AnneeScolaires $anneeScolaire): static
    {
        $this->anneeScolaires->removeElement($anneeScolaire);

        return $this;
    }
}
