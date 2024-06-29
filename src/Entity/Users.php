<?php

namespace App\Entity;

use App\Entity\Trait\CreatedAtTrait;
use App\Entity\Trait\SlugTrait;
use App\Repository\UsersRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_USERNAME', fields: ['username'])]
#[UniqueEntity(fields: ['username'], message: 'There is already an account with this username')]
class Users implements UserInterface, PasswordAuthenticatedUserInterface
{
    use CreatedAtTrait;
    use SlugTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $username = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 60)]
    private ?string $nom = null;

    #[ORM\Column(length: 60)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 23, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresse = null;

    #[ORM\Column]
    private ?bool $isActif = True;

    #[ORM\Column]
    private bool $isVerified = false;

    #[ORM\OneToOne(mappedBy: 'user', cascade: ['persist', 'remove'])]
    private ?Eleves $eleves = null;

    #[ORM\OneToMany(mappedBy: 'author', targetEntity: Caisses::class)]
    private Collection $caisses;

    #[ORM\OneToMany(mappedBy: 'author', targetEntity: DetailsCaisses::class)]
    private Collection $detailsCaisses;

    public function __construct()
    {
        $this->caisses = new ArrayCollection();
        $this->detailsCaisses = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function isActif(): ?bool
    {
        return $this->isActif;
    }

    public function setActif(bool $isActif): static
    {
        $this->isActif = $isActif;

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setVerified(bool $isVerified): static
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function getFullname(): ?string
    {
        return $this->nom.' '.$this->prenom;
    }

    public function getEleves(): ?Eleves
    {
        return $this->eleves;
    }

    public function setEleves(?Eleves $eleves): static
    {
        // unset the owning side of the relation if necessary
        if ($eleves === null && $this->eleves !== null) {
            $this->eleves->setUser(null);
        }

        // set the owning side of the relation if necessary
        if ($eleves !== null && $eleves->getUser() !== $this) {
            $eleves->setUser($this);
        }

        $this->eleves = $eleves;

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
            $caiss->setAuthor($this);
        }

        return $this;
    }

    public function removeCaiss(Caisses $caiss): static
    {
        if ($this->caisses->removeElement($caiss)) {
            // set the owning side to null (unless already changed)
            if ($caiss->getAuthor() === $this) {
                $caiss->setAuthor(null);
            }
        }

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
            $detailsCaiss->setAuthor($this);
        }

        return $this;
    }

    public function removeDetailsCaiss(DetailsCaisses $detailsCaiss): static
    {
        if ($this->detailsCaisses->removeElement($detailsCaiss)) {
            // set the owning side to null (unless already changed)
            if ($detailsCaiss->getAuthor() === $this) {
                $detailsCaiss->setAuthor(null);
            }
        }

        return $this;
    }
}