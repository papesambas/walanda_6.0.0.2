<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Echeances;
use App\Entity\FraisScolairesType;
use App\Entity\FraisType;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class EcheancesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        $dateReelle = new \DateTime();
        $anneeCourante = $dateReelle->format('Y');
        $dateCourante = new \DateTime("$anneeCourante-08-01");

        // Mois de départ pour les échéances mensuelles
        $moisDepartMensuel = 9; // Septembre
        $moisDepartCourant = 8; //Aouût
        $nombreEcheancesMensuelles = 10; // Tous les mois sauf juillet et août

        // Mois de départ pour les échéances trimestrielles
        $moisDepartTrimestriel = 10; // Octobre
        $nombreEcheancesTrimestrielles = 3; // Tous les trimestres

        // Liste pour stocker les dates d'échéance
        $listeEcheances = [];

        // Générer les échéances mensuelles
        for ($i = 0; $i < $nombreEcheancesMensuelles; $i++) {
            $moisActuel = ($moisDepartMensuel + $i) % 12;
            $moisCourant = ($moisDepartCourant + $i) % 12;

            $anneeActuelle = $anneeCourante + intdiv(($moisDepartMensuel + $i), 12);

            $dateEcheance = new \DateTime("$anneeActuelle-$moisActuel-05");

            if ($dateEcheance <= $dateCourante) {
                $moisActuel = ($moisActuel + 1) % 12;
                $anneeActuelle = $anneeCourante + intdiv(($moisDepartMensuel + $i + 1), 12);
                $dateEcheance = new \DateTime("$anneeActuelle-$moisActuel-05");
            }

            $echeance = new Echeances();
            $echeance->setPeriode($this->getMonthName($moisCourant + 1));

            $echeance->setEcheance($dateEcheance);
            $manager->persist($echeance);
            $this->addReference('mensuelle_' . $i, $echeance);

            $listeEcheances[] = $dateEcheance->format('Y-m-d');
        }

        // Générer les échéances trimestrielles
        for ($i = 0; $i < $nombreEcheancesTrimestrielles; $i++) {
            $moisActuel = ($moisDepartTrimestriel + ($i * 3)) % 12;
            $anneeActuelle = $anneeCourante + intdiv(($moisDepartTrimestriel + ($i * 3)), 12);

            $dateEcheance = new \DateTime("$anneeActuelle-$moisActuel-05");

            if ($dateEcheance <= $dateCourante) {
                $moisActuel = ($moisActuel + 1) % 12;
                $anneeActuelle = $anneeCourante + intdiv(($moisDepartTrimestriel + ($i * 3) + 1), 12);
                $dateEcheance = new \DateTime("$anneeActuelle-$moisActuel-05");
            }

            $echeance = new Echeances();
            $echeance->setPeriode($this->getTrimesterName($i + 1));
            $echeance->setEcheance($dateEcheance);

            $echeance->setEcheance($dateEcheance);

            $manager->persist($echeance);
            $this->addReference('trimestrielle_' . $i, $echeance);

            $listeEcheances[] = $dateEcheance->format('Y-m-d');
        }

        $manager->flush();
    }

    private function getMonthName($monthNumber)
    {
        $monthNames = [
            'janvier', 'février', 'mars', 'avril', 'mai', 'juin',
            'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'
        ];

        return $monthNames[$monthNumber - 1];
    }

    private function getTrimesterName($trimesterNumber)
    {
        $trimesterNames = ['1er trimestre', '2e trimestre', '3e trimestre', '4e trimestre'];

        return $trimesterNames[$trimesterNumber - 1];
    }
}