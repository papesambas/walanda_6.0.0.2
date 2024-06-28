<?php

namespace App\EventListener;

use LogicException;
use App\Entity\Departements;
use App\Entity\Echeances;
use App\Entity\FraisType;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class fraisTypeEntityListener
{
    public function prePersist(FraisType $fraisType, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $fraisType
            ->setCreatedAt(new \DateTimeImmutable('now'));
    }

    public function preUpdate(FraisType $fraisType, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $fraisType
            ->setUpdatedAt(new \DateTimeImmutable('now'));
    }
}
