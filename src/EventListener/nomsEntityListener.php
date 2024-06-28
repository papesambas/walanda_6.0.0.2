<?php

namespace App\EventListener;

use LogicException;
use App\Entity\Noms;
use Symfony\Bundle\SecurityBundle\Security;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class nomsEntityListener
{
    private $security;
    private $Slugger;
    private $tokenStorage;

    public function __construct(Security $security, SluggerInterface $Slugger, TokenStorageInterface $tokenStorage)
    {
        $this->security = $security;
        $this->Slugger = $Slugger;
        $this->tokenStorage = $tokenStorage;
    }

    public function prePersist(Noms $nom, LifecycleEventArgs $arg): void
    {
        /*$user = $user = $this->tokenStorage->getToken()->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/
        $nom
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getClassesSlug($nom));
    }

    public function preUpdate(Noms $nom, LifecycleEventArgs $arg): void
    {
        $user = $user = $this->tokenStorage->getToken()->getUser();
        /*if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $nom
            ->setUpdatedAt(new \DateTimeImmutable('now'));
    }


    private function getClassesSlug(Noms $nom): string
    {
        $slug = mb_strtolower($nom->getDesignation() . '' . $nom->getId() . '' . time(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}
