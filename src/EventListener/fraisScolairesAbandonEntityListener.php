<?php

namespace App\EventListener;

use LogicException;
use App\Entity\Departements;
use App\Entity\Echeances;
use App\Entity\FraisScolaritesAbandon;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class fraisScolairesAbandonEntityListener
{
    public function prePersist(FraisScolaritesAbandon $fraisScolaires, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $fraisScolaires
            ->setCreatedAt(new \DateTimeImmutable('now'));
    }

    public function preUpdate(FraisScolaritesAbandon $fraisScolaires, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $fraisScolaires
            ->setUpdatedAt(new \DateTimeImmutable('now'));
    }
}
