<?php

namespace App\DataFixtures;

use App\Entity\AnneeScolaires;
use DateTime;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AnneeScolairesFixtures extends Fixture implements DependentFixtureInterface
{
    private $counter = 1;
    public function load(ObjectManager $manager): void
    {
        $dateActuelle = new DateTime();
        $anneeEnCours = (int)$dateActuelle->format('Y');

        $anneeScolaire = new AnneeScolaires();
        $anneeScolaire->setAnneeDebut($anneeEnCours);
        $anneeScolaire->setAnneeFin($anneeEnCours + 1);
        $this->addReference('annee_1', $anneeScolaire);
        $manager->persist($anneeScolaire);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            NomsFixtures::class
        ];
    }
}
