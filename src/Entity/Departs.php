<?php

namespace App\Entity;

use App\Entity\Trait\EntityTrackingTrait;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Trait\CreatedAtTrait;
use App\Repository\DepartsRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: DepartsRepository::class)]
class Departs
{
    use CreatedAtTrait;
    use EntityTrackingTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateDepart = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $motif = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ecoleDestination = null;

    #[ORM\ManyToOne(inversedBy: 'departs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Eleves $eleve = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDepart(): ?\DateTimeImmutable
    {
        return $this->dateDepart;
    }

    public function setDateDepart(\DateTimeImmutable $dateDepart): static
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(?string $motif): static
    {
        $this->motif = $motif;

        return $this;
    }

    public function getEcoleDestination(): ?string
    {
        return $this->ecoleDestination;
    }

    public function setEcoleDestination(?string $ecoleDestination): static
    {
        $this->ecoleDestination = $ecoleDestination;

        return $this;
    }

    public function getEleve(): ?Eleves
    {
        return $this->eleve;
    }

    public function setEleve(?Eleves $eleve): static
    {
        $this->eleve = $eleve;

        return $this;
    }
}
