<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Niveaux;
use App\Entity\Statuts;
use App\Entity\FraisType;
use App\Entity\FraisScolaires;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class Niveaux1erCycleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($niv = 1; $niv <= 6; $niv++) {
            if ($niv == 1) {
                $cycle = $this->getReference('cycle-' . $faker->numberBetween(2, 2));
                $anneeScolaire = $this->getReference('annee_1');
                $niveau = new Niveaux();
                $niveau->setDesignation('1ère Année');
                $niveau->setCycle($cycle);
                for ($i = 1; $i <= 8; $i++) {
                    if ($i == 1) {
                        $statut = new Statuts();
                        $statut->setDesignation('1ère Inscription');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(5000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(1000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut1ere_' . $i, $statut);
                    } elseif ($i == 2) {
                        $statut = new Statuts();
                        $statut->setDesignation('Passant');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }

                        $manager->persist($statut);
                        $this->addReference('statut1ere_' . $i, $statut);
                    } elseif ($i == 3) {
                        $statut = new Statuts();
                        $statut->setDesignation('Redoublant');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut1ere_' . $i, $statut);
                    } elseif ($i == 4) {
                        $statut = new Statuts();
                        $statut->setDesignation('Transfert départ');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(5000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut1ere_' . $i, $statut);
                    } elseif ($i == 5) {
                        $statut = new Statuts();
                        $statut->setDesignation('Sans dossier');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(5000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(1000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }

                        $manager->persist($statut);
                        $this->addReference('statut1ere_' . $i, $statut);
                    } elseif ($i == 6) {
                        $statut = new Statuts();
                        $statut->setDesignation('En attente');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(5000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(1000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut1ere_' . $i, $statut);
                    } elseif ($i == 7) {
                        $statut = new Statuts();
                        $statut->setDesignation('Abandon');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(5000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut1ere_' . $i, $statut);
                    } elseif ($i == 8) {
                        $statut = new Statuts();
                        $statut->setDesignation('Exclus');
                        $statut->setNiveau($niveau);
                        $manager->persist($statut);
                        $this->addReference('statut1ere_' . $i, $statut);
                    }
                }
                $manager->persist($niveau);
                $this->addReference('niveau1er-' . $niv, $niveau);
            } elseif ($niv == 2) {
                $cycle = $this->getReference('cycle-' . $faker->numberBetween(2, 2));
                $anneeScolaire = $this->getReference('annee_1');
                $niveau = new Niveaux();
                $niveau->setDesignation('2ème Année');
                $niveau->setCycle($cycle);
                for ($i = 1; $i <= 8; $i++) {
                    if ($i == 1) {
                        $statut = new Statuts();
                        $statut->setDesignation('Transfert Arrivé');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(5000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(1000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut2eme_' . $i, $statut);
                    } elseif ($i == 2) {
                        $statut = new Statuts();
                        $statut->setDesignation('Passant');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }

                        $manager->persist($statut);
                        $this->addReference('statut2eme_' . $i, $statut);
                    } elseif ($i == 3) {
                        $statut = new Statuts();
                        $statut->setDesignation('Redoublant');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut2eme_' . $i, $statut);
                    } elseif ($i == 4) {
                        $statut = new Statuts();
                        $statut->setDesignation('Transfert départ');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(5000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut2eme_' . $i, $statut);
                    } elseif ($i == 5) {
                        $statut = new Statuts();
                        $statut->setDesignation('Sans dossier');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(5000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(1000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut2eme_' . $i, $statut);
                    } elseif ($i == 6) {
                        $statut = new Statuts();
                        $statut->setDesignation('En attente');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(5000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(1000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut2eme_' . $i, $statut);
                    } elseif ($i == 7) {
                        $statut = new Statuts();
                        $statut->setDesignation('Abandon');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(5000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut2eme_' . $i, $statut);
                    } elseif ($i == 8) {
                        $statut = new Statuts();
                        $statut->setDesignation('Exclus');
                        $statut->setNiveau($niveau);
                        $manager->persist($statut);
                        $this->addReference('statut2eme_' . $i, $statut);
                    }
                }
                $manager->persist($niveau);
                $this->addReference('niveau2eme-' . $niv, $niveau);
            } elseif ($niv == 3) {
                $cycle = $this->getReference('cycle-' . $faker->numberBetween(2, 2));
                $anneeScolaire = $this->getReference('annee_1');
                $niveau = new Niveaux();
                $niveau->setDesignation('3ème Année');
                $niveau->setCycle($cycle);
                for ($i = 1; $i <= 8; $i++) {
                    if ($i == 1) {
                        $statut = new Statuts();
                        $statut->setDesignation('Transfert Arrivé');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(5000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(1000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut3eme_' . $i, $statut);
                    } elseif ($i == 2) {
                        $statut = new Statuts();
                        $statut->setDesignation('Passant');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut3eme_' . $i, $statut);
                    } elseif ($i == 3) {
                        $statut = new Statuts();
                        $statut->setDesignation('Redoublant');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $frais->addAnneeScolaire($anneeScolaire);
                        $frais->setFraisType($fraisType);
                        $manager->persist($statut);
                        $this->addReference('statut3eme_' . $i, $statut);
                    } elseif ($i == 4) {
                        $statut = new Statuts();
                        $statut->setDesignation('Transfert départ');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(5000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut3eme_' . $i, $statut);
                    } elseif ($i == 5) {
                        $statut = new Statuts();
                        $statut->setDesignation('Sans dossier');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(5000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(1000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut3eme_' . $i, $statut);
                    } elseif ($i == 6) {
                        $statut = new Statuts();
                        $statut->setDesignation('En attente');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(5000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(1000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut3eme_' . $i, $statut);
                    } elseif ($i == 7) {
                        $statut = new Statuts();
                        $statut->setDesignation('Abandon');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(5000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut3eme_' . $i, $statut);
                    } elseif ($i == 8) {
                        $statut = new Statuts();
                        $statut->setDesignation('Exclus');
                        $statut->setNiveau($niveau);
                        $manager->persist($statut);
                        $this->addReference('statut3eme_' . $i, $statut);
                    }
                }
                $manager->persist($niveau);
                $this->addReference('niveau3eme-' . $niv, $niveau);
            } elseif ($niv == 4) {
                $cycle = $this->getReference('cycle-' . $faker->numberBetween(2, 2));
                $anneeScolaire = $this->getReference('annee_1');
                $niveau = new Niveaux();
                $niveau->setDesignation('4ème Année');
                $niveau->setCycle($cycle);
                for ($i = 1; $i <= 8; $i++) {
                    if ($i == 1) {
                        $statut = new Statuts();
                        $statut->setDesignation('Transfert Arrivé');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(5000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(1000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut4eme_' . $i, $statut);
                    } elseif ($i == 2) {
                        $statut = new Statuts();
                        $statut->setDesignation('Passant');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut4eme_' . $i, $statut);
                    } elseif ($i == 3) {
                        $statut = new Statuts();
                        $statut->setDesignation('Redoublant');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut4eme_' . $i, $statut);
                    } elseif ($i == 4) {
                        $statut = new Statuts();
                        $statut->setDesignation('Transfert départ');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(5000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut4eme_' . $i, $statut);
                    } elseif ($i == 5) {
                        $statut = new Statuts();
                        $statut->setDesignation('Sans dossier');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(5000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(1000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut4eme_' . $i, $statut);
                    } elseif ($i == 6) {
                        $statut = new Statuts();
                        $statut->setDesignation('En attente');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(5000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(1000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut4eme_' . $i, $statut);
                    } elseif ($i == 7) {
                        $statut = new Statuts();
                        $statut->setDesignation('Abandon');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(5000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut4eme_' . $i, $statut);
                    } elseif ($i == 8) {
                        $statut = new Statuts();
                        $statut->setDesignation('Exclus');
                        $statut->setNiveau($niveau);
                        $manager->persist($statut);
                        $this->addReference('statut4eme_' . $i, $statut);
                    }
                }
                $manager->persist($niveau);
                $this->addReference('niveau4eme-' . $niv, $niveau);
            } elseif ($niv == 5) {
                $cycle = $this->getReference('cycle-' . $faker->numberBetween(2, 2));
                $anneeScolaire = $this->getReference('annee_1');
                $niveau = new Niveaux();
                $niveau->setDesignation('5ème Année');
                $niveau->setCycle($cycle);
                for ($i = 1; $i <= 8; $i++) {
                    if ($i == 1) {
                        $statut = new Statuts();
                        $statut->setDesignation('Transfert Arrivé');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(5000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(1000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut5eme_' . $i, $statut);
                    } elseif ($i == 2) {
                        $statut = new Statuts();
                        $statut->setDesignation('Passant');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut5eme_' . $i, $statut);
                    } elseif ($i == 3) {
                        $statut = new Statuts();
                        $statut->setDesignation('Redoublant');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut5eme_' . $i, $statut);
                    } elseif ($i == 4) {
                        $statut = new Statuts();
                        $statut->setDesignation('Transfert départ');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(5000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }

                        $frais->addAnneeScolaire($anneeScolaire);
                        $frais->setFraisType($fraisType);
                        $manager->persist($statut);
                        $this->addReference('statut5eme_' . $i, $statut);
                    } elseif ($i == 5) {
                        $statut = new Statuts();
                        $statut->setDesignation('Sans dossier');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(5000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(1000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut5eme_' . $i, $statut);
                    } elseif ($i == 6) {
                        $statut = new Statuts();
                        $statut->setDesignation('En attente');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(5000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(1000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut5eme_' . $i, $statut);
                    } elseif ($i == 7) {
                        $statut = new Statuts();
                        $statut->setDesignation('Abandon');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(5000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut5eme_' . $i, $statut);
                    } elseif ($i == 8) {
                        $statut = new Statuts();
                        $statut->setDesignation('Exclus');
                        $statut->setNiveau($niveau);
                        $manager->persist($statut);
                        $this->addReference('statut5eme_' . $i, $statut);
                    }
                }
                $manager->persist($niveau);
                $this->addReference('niveau5eme-' . $niv, $niveau);
            } else {
                $cycle = $this->getReference('cycle-' . $faker->numberBetween(2, 2));
                $anneeScolaire = $this->getReference('annee_1');
                $niveau = new Niveaux();
                $niveau->setDesignation('6ème Année');
                $niveau->setCycle($cycle);
                for ($i = 1; $i <= 8; $i++) {
                    if ($i == 1) {
                        $statut = new Statuts();
                        $statut->setDesignation('Transfert Arrivé');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(5000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(1000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut6eme_' . $i, $statut);
                    } elseif ($i == 2) {
                        $statut = new Statuts();
                        $statut->setDesignation('Passant');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut6eme_' . $i, $statut);
                    } elseif ($i == 3) {
                        $statut = new Statuts();
                        $statut->setDesignation('Redoublant');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut6eme_' . $i, $statut);
                    } elseif ($i == 4) {
                        $statut = new Statuts();
                        $statut->setDesignation('Transfert départ');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(5000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut6eme_' . $i, $statut);
                    } elseif ($i == 5) {
                        $statut = new Statuts();
                        $statut->setDesignation('Sans dossier');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(5000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(1000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut6eme_' . $i, $statut);
                    } elseif ($i == 6) {
                        $statut = new Statuts();
                        $statut->setDesignation('En attente');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(5000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(1000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $manager->persist($statut);
                        $this->addReference('statut6eme_' . $i, $statut);
                    } elseif ($i == 7) {
                        $statut = new Statuts();
                        $statut->setDesignation('Abandon');
                        $statut->setNiveau($niveau);
                        for ($j = 1; $j <= 1; $j++) {
                            $fraisType = new FraisType();
                            $fraisType->setPeriode('mensuel');
                            $fraisType->setNiveau($niveau);
                            $fraisType->setStatut($statut);
                            for ($a = 1; $a <= 15; $a++) {
                                $frais = new FraisScolaires();
                                if ($a == 1) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('arriérés');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 2) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Inscription');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 3) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('carnet');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 4) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('Abandon');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(5000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(12000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 14) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('juin');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 15) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(9, 9));
                                    $frais->setDesignation('autre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                }
                            }
                            $manager->persist($fraisType);
                        }
                        $frais->addAnneeScolaire($anneeScolaire);
                        $frais->setFraisType($fraisType);
                        $manager->persist($statut);
                        $this->addReference('statut6eme_' . $i, $statut);
                    } elseif ($i == 8) {
                        $statut = new Statuts();
                        $statut->setDesignation('Exclus');
                        $statut->setNiveau($niveau);
                        $manager->persist($statut);
                        $this->addReference('statut6eme_' . $i, $statut);
                    }
                }
                $manager->persist($niveau);
                $this->addReference('niveau6eme-' . $niv, $niveau);
            }
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            NiveauxMaternelleFixtures::class,
        ];
    }
}
