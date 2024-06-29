<?php

namespace App\Entity;

use App\Entity\Trait\EntityTrackingTrait;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Trait\CreatedAtTrait;
use App\Repository\FraisTypeRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: FraisTypeRepository::class)]
class FraisType
{
    use CreatedAtTrait;
    use EntityTrackingTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $periode = null;

    #[ORM\OneToMany(mappedBy: 'fraisType', targetEntity: FraisScolaires::class)]
    private Collection $fraisScolaires;

    #[ORM\ManyToOne(inversedBy: 'fraisTypes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Statuts $statut = null;

    #[ORM\ManyToOne(inversedBy: 'fraisTypes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Niveaux $niveau = null;

    #[ORM\OneToMany(mappedBy: 'fraisType', targetEntity: FraisScolarites::class)]
    private Collection $fraisScolarites;

    public function __construct()
    {
        $this->fraisScolaires = new ArrayCollection();
        $this->fraisScolarites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPeriode(): ?string
    {
        return $this->periode;
    }

    public function setPeriode(string $periode): static
    {
        $this->periode = $periode;

        return $this;
    }

    /**
     * @return Collection<int, FraisScolaires>
     */
    public function getFraisScolaires(): Collection
    {
        return $this->fraisScolaires;
    }

    public function addFraisScolaire(FraisScolaires $fraisScolaire): static
    {
        if (!$this->fraisScolaires->contains($fraisScolaire)) {
            $this->fraisScolaires->add($fraisScolaire);
            $fraisScolaire->setFraisType($this);
        }

        return $this;
    }

    public function removeFraisScolaire(FraisScolaires $fraisScolaire): static
    {
        if ($this->fraisScolaires->removeElement($fraisScolaire)) {
            // set the owning side to null (unless already changed)
            if ($fraisScolaire->getFraisType() === $this) {
                $fraisScolaire->setFraisType(null);
            }
        }

        return $this;
    }

    public function getStatut(): ?Statuts
    {
        return $this->statut;
    }

    public function setStatut(?Statuts $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getNiveau(): ?Niveaux
    {
        return $this->niveau;
    }

    public function setNiveau(?Niveaux $niveau): static
    {
        $this->niveau = $niveau;

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
            $fraisScolarite->setFraisType($this);
        }

        return $this;
    }

    public function removeFraisScolarite(FraisScolarites $fraisScolarite): static
    {
        if ($this->fraisScolarites->removeElement($fraisScolarite)) {
            // set the owning side to null (unless already changed)
            if ($fraisScolarite->getFraisType() === $this) {
                $fraisScolarite->setFraisType(null);
            }
        }

        return $this;
    }
}