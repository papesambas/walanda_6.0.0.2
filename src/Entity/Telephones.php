<?php

namespace App\Entity;

use App\Entity\Trait\EntityTrackingTrait;
use App\Entity\Trait\SlugTrait;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Trait\CreatedAtTrait;
use App\Repository\TelephonesRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: TelephonesRepository::class)]
class Telephones
{
    use CreatedAtTrait;
    use SlugTrait;
    use EntityTrackingTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 25)]
    private ?string $numero = null;

    #[ORM\OneToOne(mappedBy: 'telephone', cascade: ['persist', 'remove'])]
    private ?Peres $peres = null;

    #[ORM\OneToOne(mappedBy: 'telephone', cascade: ['persist', 'remove'])]
    private ?Meres $meres = null;

    public function __toString()
    {
        return $this->numero;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): static
    {
        $this->numero = $numero;

        return $this;
    }

    public function getPeres(): ?Peres
    {
        return $this->peres;
    }

    public function setPeres(Peres $peres): static
    {
        // set the owning side of the relation if necessary
        if ($peres->getTelephone() !== $this) {
            $peres->setTelephone($this);
        }

        $this->peres = $peres;

        return $this;
    }

    public function getMeres(): ?Meres
    {
        return $this->meres;
    }

    public function setMeres(?Meres $meres): static
    {
        // unset the owning side of the relation if necessary
        if ($meres === null && $this->meres !== null) {
            $this->meres->setTelephone(null);
        }

        // set the owning side of the relation if necessary
        if ($meres !== null && $meres->getTelephone() !== $this) {
            $meres->setTelephone($this);
        }

        $this->meres = $meres;

        return $this;
    }
}
