<?php

namespace App\Entity;

use App\Entity\Trait\EntityTrackingTrait;
use App\Entity\Trait\SlugTrait;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Trait\CreatedAtTrait;
use App\Repository\StatutsRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: StatutsRepository::class)]
class Statuts
{
    use CreatedAtTrait;
    use SlugTrait;
    use EntityTrackingTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $designation = null;

    #[ORM\ManyToOne(inversedBy: 'statuts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Niveaux $niveau = null;

    #[ORM\OneToMany(mappedBy: 'statut', targetEntity: Eleves::class)]
    private Collection $eleves;

    #[ORM\OneToMany(mappedBy: 'statut', targetEntity: FraisType::class)]
    private Collection $fraisTypes;

    public function __construct()
    {
        $this->eleves = new ArrayCollection();
        $this->fraisTypes = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->designation;
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
     * @return Collection<int, Eleves>
     */
    public function getEleves(): Collection
    {
        return $this->eleves;
    }

    public function addElefe(Eleves $elefe): static
    {
        if (!$this->eleves->contains($elefe)) {
            $this->eleves->add($elefe);
            $elefe->setStatut($this);
        }

        return $this;
    }

    public function removeElefe(Eleves $elefe): static
    {
        if ($this->eleves->removeElement($elefe)) {
            // set the owning side to null (unless already changed)
            if ($elefe->getStatut() === $this) {
                $elefe->setStatut(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, FraisType>
     */
    public function getFraisTypes(): Collection
    {
        return $this->fraisTypes;
    }

    public function addFraisType(FraisType $fraisType): static
    {
        if (!$this->fraisTypes->contains($fraisType)) {
            $this->fraisTypes->add($fraisType);
            $fraisType->setStatut($this);
        }

        return $this;
    }

    public function removeFraisType(FraisType $fraisType): static
    {
        if ($this->fraisTypes->removeElement($fraisType)) {
            // set the owning side to null (unless already changed)
            if ($fraisType->getStatut() === $this) {
                $fraisType->setStatut(null);
            }
        }

        return $this;
    }
}
