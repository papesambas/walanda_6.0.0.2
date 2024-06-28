<?php

namespace App\EventListener;

use App\Entity\Users;
use LogicException;
use App\Entity\Eleves;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class elevesEntityListener
{
    private $Securty;
    private $Slugger;
    private $entityManager;

    private $PasswordHasher;

    public function __construct(Security $security, SluggerInterface $Slugger, EntityManagerInterface $entityManager, UserPasswordHasherInterface $PasswordHasher)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
        $this->entityManager = $entityManager;
        $this->PasswordHasher = $PasswordHasher;
    }

    public function prePersist(Eleves $eleves, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $format = 'Y';
        $formatJour = 'd';
        $formatMois = 'm';
        $recrutem = $eleves->getDateRecrutement()->format($format);
        $dateNaissJour = $eleves->getDateNaissance()->format($formatJour);
        $dateNaissMois = $eleves->getDateNaissance()->format($formatMois);
        $nom = $eleves->getNom();
        $prenom = $eleves->getPrenom();
        $nom = substr($nom, 0, 2);
        $prenom = substr($prenom, 0, 2);

        // Générer un matricule aléatoire avec des chiffres et des lettres
        $longueurMatricule = 8;
        $caracteres = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $matricule = '';
        $isUnique = false;

        while (!$isUnique) {
            for ($i = 0; $i < $longueurMatricule; $i++) {
                $indexAleatoire = rand(0, strlen($caracteres) - 1);
                $caractereAleatoire = $caracteres[$indexAleatoire];
                $matricule .= $caractereAleatoire;
            }

            $suffix = substr(time(), -4);;

            $matricules = $recrutem . ' ' . $nom . $dateNaissJour . $dateNaissMois . $prenom . '-' . $matricule . '-' . rand(10000, 99999) . '-' . $suffix;

            $existingEleve = $this->entityManager->getRepository(Eleves::class)->findOneBy(['matricule' => $matricules]);
            if ($existingEleve === null) {
                $isUnique = true;
            }
        }
        $eleves
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setFullName($eleves->getNom() . ' ' . $eleves->getPrenom())
            ->setMatricule($matricules)
            ->setSlug($this->getElevesSlug($eleves));
    }

    public function preUpdate(Eleves $eleves, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $eleves
            ->setUpdatedAt(new \DateTimeImmutable('now'))
            ->setFullName($eleves->getNom() . ' ' . $eleves->getPrenom())
            ->setSlug($this->getElevesSlug($eleves));
    }

    private function getElevesSlug(Eleves $eleves): string
    {
        $slug = mb_strtolower($eleves->getNom() . '' . $eleves->getMatricule() . '' . $eleves->getId() . '' . $eleves->getPrenom() . '-' . time(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}
