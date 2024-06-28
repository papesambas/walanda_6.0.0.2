<?php

namespace App\EventListener;

use LogicException;
use App\Entity\Departements;
use App\Entity\Echeances;
use App\Entity\FraisScolaires;
use App\Entity\Santes;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class santesEntityListener
{
    public function prePersist(Santes $santes, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $santes
            ->setCreatedAt(new \DateTimeImmutable('now'));
    }

    public function preUpdate(Santes $santes, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $santes
            ->setUpdatedAt(new \DateTimeImmutable('now'));
    }
}
