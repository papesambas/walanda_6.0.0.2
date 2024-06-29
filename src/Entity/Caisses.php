<?php

namespace App\Entity;

use App\Entity\DetailsCaisses;
use App\Entity\Trait\EntityTrackingTrait;
use App\Entity\Trait\SlugTrait;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Trait\CreatedAtTrait;
use App\Repository\CaissesRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: CaissesRepository::class)]
class Caisses
{
    use CreatedAtTrait;
    use SlugTrait;
    use EntityTrackingTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateOp = null;

    #[ORM\Column(length: 100)]
    private ?string $libelle = null;

    #[ORM\Column(nullable: true)]
    private ?float $debit = null;

    #[ORM\Column(nullable: true)]
    private ?float $credit = null;

    #[ORM\Column]
    private ?float $solde = null;

    #[ORM\ManyToOne(inversedBy: 'caisses')]
    private ?FraisScolarites $scolarite = null;

    #[ORM\ManyToOne(inversedBy: 'caisses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $author = null;

    #[ORM\Column]
    #[Assert\PositiveOrZero]
    private ?float $soldeCumul = null;

    #[ORM\OneToMany(mappedBy: 'caisse', targetEntity: DetailsCaisses::class)]
    private Collection $detailsCaisses;

    #[ORM\ManyToOne(inversedBy: 'caisses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?AnneeScolaires $anneeScolaires = null;

    public function __construct()
    {
        $this->solde = 0;
        $this->detailsCaisses = new ArrayCollection();
    }
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

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDebit(): ?float
    {
        return $this->debit;
    }

    public function setDebit(?float $debit): static
    {
        $this->debit = $debit;

        return $this;
    }

    public function getCredit(): ?float
    {
        return $this->credit;
    }

    public function setCredit(?float $credit): static
    {
        $this->credit = $credit;

        return $this;
    }

    public function getSolde(): ?float
    {
        return $this->solde;
    }

    public function setSolde(float $solde): static
    {
        $this->solde = $solde;

        return $this;
    }

    public function getScolarite(): ?FraisScolarites
    {
        return $this->scolarite;
    }

    public function setScolarite(?FraisScolarites $scolarite): static
    {
        $this->scolarite = $scolarite;

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

    public function updateCumulativeSolde(float $debit, float $credit): self
    {
        $this->solde += ($debit - $credit);

        return $this;
    }

    public function getSoldeCumul(): ?float
    {
        return $this->soldeCumul;
    }

    public function setSoldeCumul(float $soldeCumul): static
    {
        $this->soldeCumul = $soldeCumul;

        return $this;
    }

    /**
     * @return Collection<int, DetailsCaisses>
     */
    public function getDetailsCaisses(): Collection
    {
        return $this->detailsCaisses;
    }

    public function addDetailsCaiss(DetailsCaisses $detailsCaiss): static
    {
        if (!$this->detailsCaisses->contains($detailsCaiss)) {
            $this->detailsCaisses->add($detailsCaiss);
            $detailsCaiss->setCaisse($this);
        }

        return $this;
    }

    public function removeDetailsCaiss(DetailsCaisses $detailsCaiss): static
    {
        if ($this->detailsCaisses->removeElement($detailsCaiss)) {
            // set the owning side to null (unless already changed)
            if ($detailsCaiss->getCaisse() === $this) {
                $detailsCaiss->setCaisse(null);
            }
        }

        return $this;
    }

    public function getAnneeScolaires(): ?AnneeScolaires
    {
        return $this->anneeScolaires;
    }

    public function setAnneeScolaires(?AnneeScolaires $anneeScolaires): static
    {
        $this->anneeScolaires = $anneeScolaires;

        return $this;
    }
}
