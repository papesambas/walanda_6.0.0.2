<?php

namespace App\Entity;

use App\Entity\Trait\EntityTrackingTrait;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use App\Repository\FraisScolaritesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: FraisScolaritesRepository::class)]
class FraisScolarites
{
    use EntityTrackingTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $montant = 0;

    #[ORM\OneToOne(mappedBy: 'fraisScolarite', cascade: ['persist'])]
    private ?Eleves $eleves = null;

    #[ORM\ManyToMany(targetEntity: FraisScolaires::class, mappedBy: 'fraisScolarites')]
    private Collection $fraisScolaires;

    #[ORM\ManyToOne(inversedBy: 'fraisScolarites')]
    #[ORM\JoinColumn(nullable: false)]
    private ?AnneeScolaires $anneeScolaires = null;

    #[ORM\Column]
    private ?int $arrieres = 0;

    #[ORM\Column]
    private ?int $inscription = 0;

    #[ORM\Column]
    private ?int $carnet = 0;

    #[ORM\Column]
    private ?int $transfert = 0;

    #[ORM\Column]
    private ?int $septembre = 0;

    #[ORM\Column]
    private ?int $octobre = 0;

    #[ORM\Column]
    private ?int $novembre = 0;

    #[ORM\Column]
    private ?int $decembre = 0;

    #[ORM\Column]
    private ?int $janvier = 0;

    #[ORM\Column]
    private ?int $fevrier = 0;

    #[ORM\Column]
    private ?int $mars = 0;

    #[ORM\Column]
    private ?int $avril = 0;

    #[ORM\Column]
    private ?int $mai = 0;

    #[ORM\Column]
    private ?int $juin = 0;

    #[ORM\Column]
    private ?int $autre = 0;

    #[ORM\OneToMany(mappedBy: 'scolarite', targetEntity: Caisses::class)]
    private Collection $caisses;

    #[ORM\ManyToOne(inversedBy: 'fraisScolarites')]
    #[ORM\JoinColumn(nullable: false)]
    private ?FraisType $fraisType = null;


    #[ORM\Column(nullable: true, type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $echeanceTransfert = null;

    #[ORM\Column(nullable: true, type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $echeanceCarnet = null;

    #[ORM\Column(nullable: true, type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $echeanceInscription = null;

    #[ORM\Column(nullable: true, type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $echeancesArrieres = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $echeanceSeptembre = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $echeanceOctobre = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $echeanceNovembre = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $echeanceDecembre = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $echeanceJanvier = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $echeanceFevrier = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $echeanceMars = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $echeanceAvril = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $echeanceMai = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $echeanceJuin = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $echeanceAutre = null;

    public function __construct()
    {
        $this->fraisScolaires = new ArrayCollection();
        $this->caisses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant($montant): static
    {
        $this->montant = $montant;

        return $this;
    }

    public function getEleves(): ?Eleves
    {
        return $this->eleves;
    }

    public function setEleves(?Eleves $eleves): static
    {
        // unset the owning side of the relation if necessary
        if ($eleves === null && $this->eleves !== null) {
            $this->eleves->setFraisScolarite(null);
        }

        // set the owning side of the relation if necessary
        if ($eleves !== null && $eleves->getFraisScolarite() !== $this) {
            $eleves->setFraisScolarite($this);
        }

        $this->eleves = $eleves;

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
            $fraisScolaire->addFraisScolarite($this);
        }

        return $this;
    }

    public function removeFraisScolaire(FraisScolaires $fraisScolaire): static
    {
        if ($this->fraisScolaires->removeElement($fraisScolaire)) {
            $fraisScolaire->removeFraisScolarite($this);
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

    public function getArrieres(): ?int
    {
        return $this->arrieres;
    }

    public function setArrieres($arrieres): static
    {
        $this->arrieres = $arrieres;

        return $this;
    }

    public function getInscription(): ?int
    {
        return $this->inscription;
    }

    public function setInscription($inscription): static
    {
        $this->inscription = $inscription;

        return $this;
    }

    public function getCarnet(): ?int
    {
        return $this->carnet;
    }

    public function setCarnet($carnet): static
    {
        $this->carnet = $carnet;

        return $this;
    }

    public function getTransfert(): ?int
    {
        return $this->transfert;
    }

    public function setTransfert($transfert): static
    {
        $this->transfert = $transfert;

        return $this;
    }

    public function getSeptembre(): ?int
    {
        return $this->septembre;
    }

    public function setSeptembre($septembre): static
    {
        $this->septembre = $septembre;

        return $this;
    }

    public function getOctobre(): ?int
    {
        return $this->octobre;
    }

    public function setOctobre($octobre): static
    {
        $this->octobre = $octobre;

        return $this;
    }

    public function getNovembre(): ?int
    {
        return $this->novembre;
    }

    public function setNovembre($novembre): static
    {
        $this->novembre = $novembre;

        return $this;
    }

    public function getDecembre(): ?int
    {
        return $this->decembre;
    }

    public function setDecembre($decembre): static
    {
        $this->decembre = $decembre;

        return $this;
    }

    public function getJanvier(): ?int
    {
        return $this->janvier;
    }

    public function setJanvier($janvier): static
    {
        $this->janvier = $janvier;

        return $this;
    }

    public function getFevrier(): ?int
    {
        return $this->fevrier;
    }

    public function setFevrier($fevrier): static
    {
        $this->fevrier = $fevrier;

        return $this;
    }

    public function getMars(): ?int
    {
        return $this->mars;
    }

    public function setMars($mars): static
    {
        $this->mars = $mars;

        return $this;
    }

    public function getAvril(): ?int
    {
        return $this->avril;
    }

    public function setAvril($avril): static
    {
        $this->avril = $avril;

        return $this;
    }

    public function getMai(): ?int
    {
        return $this->mai;
    }

    public function setMai($mai): static
    {
        $this->mai = $mai;

        return $this;
    }

    public function getJuin(): ?int
    {
        return $this->juin;
    }

    public function setJuin($juin): static
    {
        $this->juin = $juin;

        return $this;
    }

    public function getAutre(): ?int
    {
        return $this->autre;
    }

    public function setAutre($autre): static
    {
        $this->autre = $autre;

        return $this;
    }

    /**
     * @return Collection<int, Caisses>
     */
    public function getCaisses(): Collection
    {
        return $this->caisses;
    }

    public function addCaiss(Caisses $caiss): static
    {
        if (!$this->caisses->contains($caiss)) {
            $this->caisses->add($caiss);
            $caiss->setScolarite($this);
        }

        return $this;
    }

    public function removeCaiss(Caisses $caiss): static
    {
        if ($this->caisses->removeElement($caiss)) {
            // set the owning side to null (unless already changed)
            if ($caiss->getScolarite() === $this) {
                $caiss->setScolarite(null);
            }
        }

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


    public function getEcheanceTransfert(): ?\DateTimeInterface
    {
        return $this->echeanceTransfert;
    }

    public function setEcheanceTransfert(?\DateTimeInterface $echeanceTransfert): static
    {
        $this->echeanceTransfert = $echeanceTransfert;

        return $this;
    }

    public function getEcheanceCarnet(): ?\DateTimeInterface
    {
        return $this->echeanceCarnet;
    }

    public function setEcheanceCarnet(?\DateTimeInterface $echeanceCarnet): static
    {
        $this->echeanceCarnet = $echeanceCarnet;

        return $this;
    }

    public function getEcheanceInscription(): ?\DateTimeInterface
    {
        return $this->echeanceInscription;
    }

    public function setEcheanceInscription(?\DateTimeInterface $echeanceInscription): static
    {
        $this->echeanceInscription = $echeanceInscription;

        return $this;
    }

    public function getEcheancesArrieres(): ?\DateTimeInterface
    {
        return $this->echeancesArrieres;
    }

    public function setEcheancesArrieres(?\DateTimeInterface $echeancesArrieres): static
    {
        $this->echeancesArrieres = $echeancesArrieres;

        return $this;
    }

    public function getecheanceSeptembre(): ?\DateTimeInterface
    {
        return $this->echeanceSeptembre;
    }

    public function setecheanceSeptembre(\DateTimeInterface $echeanceSeptembre): static
    {
        $this->echeanceSeptembre = $echeanceSeptembre;

        return $this;
    }

    public function getEcheanceOctobre(): ?\DateTimeInterface
    {
        return $this->echeanceOctobre;
    }

    public function setEcheanceOctobre(\DateTimeInterface $echeanceOctobre): static
    {
        $this->echeanceOctobre = $echeanceOctobre;

        return $this;
    }

    public function getEcheanceNovembre(): ?\DateTimeInterface
    {
        return $this->echeanceNovembre;
    }

    public function setEcheanceNovembre(\DateTimeInterface $echeanceNovembre): static
    {
        $this->echeanceNovembre = $echeanceNovembre;

        return $this;
    }

    public function getEcheanceDecembre(): ?\DateTimeInterface
    {
        return $this->echeanceDecembre;
    }

    public function setEcheanceDecembre(\DateTimeInterface $echeanceDecembre): static
    {
        $this->echeanceDecembre = $echeanceDecembre;

        return $this;
    }

    public function getEcheanceJanvier(): ?\DateTimeInterface
    {
        return $this->echeanceJanvier;
    }

    public function setEcheanceJanvier(\DateTimeInterface $echeanceJanvier): static
    {
        $this->echeanceJanvier = $echeanceJanvier;

        return $this;
    }

    public function getEcheanceFevrier(): ?\DateTimeInterface
    {
        return $this->echeanceFevrier;
    }

    public function setEcheanceFevrier(\DateTimeInterface $echeanceFevrier): static
    {
        $this->echeanceFevrier = $echeanceFevrier;

        return $this;
    }

    public function getEcheanceMars(): ?\DateTimeInterface
    {
        return $this->echeanceMars;
    }

    public function setEcheanceMars(\DateTimeInterface $echeanceMars): static
    {
        $this->echeanceMars = $echeanceMars;

        return $this;
    }

    public function getEcheanceAvril(): ?\DateTimeInterface
    {
        return $this->echeanceAvril;
    }

    public function setEcheanceAvril(\DateTimeInterface $echeanceAvril): static
    {
        $this->echeanceAvril = $echeanceAvril;

        return $this;
    }

    public function getEcheanceMai(): ?\DateTimeInterface
    {
        return $this->echeanceMai;
    }

    public function setEcheanceMai(\DateTimeInterface $echeanceMai): static
    {
        $this->echeanceMai = $echeanceMai;

        return $this;
    }

    public function getEcheanceJuin(): ?\DateTimeInterface
    {
        return $this->echeanceJuin;
    }

    public function setEcheanceJuin(\DateTimeInterface $echeanceJuin): static
    {
        $this->echeanceJuin = $echeanceJuin;

        return $this;
    }

    public function getEcheanceAutre(): ?\DateTimeInterface
    {
        return $this->echeanceAutre;
    }

    public function setEcheanceAutre(\DateTimeInterface $echeanceAutre): static
    {
        $this->echeanceAutre = $echeanceAutre;

        return $this;
    }
}