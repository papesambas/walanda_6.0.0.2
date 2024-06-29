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

class Niveaux3ndCycleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($niv = 1; $niv <= 3; $niv++) {
            if ($niv == 1) {
                $cycle = $this->getReference('cycle-' . $faker->numberBetween(4, 4));
                $anneeScolaire = $this->getReference('annee_1');
                $niveau = new Niveaux();
                $niveau->setDesignation('10ème Année');
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
                                    $frais->setMontant(50000);

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
                                    $frais->setDesignation('transfert');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(40000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);

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
                        $this->addReference('statut10eme_' . $i, $statut);
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
                                    $frais->setDesignation('transfert');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(40000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);

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
                        $this->addReference('statut10eme_' . $i, $statut);
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
                                    $frais->setDesignation('transfert');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(40000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
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
                        $this->addReference('statut10eme_' . $i, $statut);
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
                                    $frais->setDesignation('transfert');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
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
                        $this->addReference('statut10eme_' . $i, $statut);
                    } elseif ($i == 5) {
                        $statut = new Statuts();
                        $statut->setDesignation('Candidat libre');
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
                                    $frais->setMontant(50000);
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
                                    $frais->setDesignation('transfert');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(40000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
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
                        $this->addReference('statut10eme_' . $i, $statut);
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
                                    $frais->setMontant(50000);
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
                                    $frais->setDesignation('transfert');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(40000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
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
                        $this->addReference('statut10eme_' . $i, $statut);
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
                                    $frais->setDesignation('transfert');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
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
                        $this->addReference('statut10eme_' . $i, $statut);
                    } elseif ($i == 8) {
                        $statut = new Statuts();
                        $statut->setDesignation('Exclus');
                        $statut->setNiveau($niveau);
                        $manager->persist($statut);
                        $this->addReference('statut10eme_' . $i, $statut);
                    }
                }
                $manager->persist($niveau);
                $this->setReference('niveau10eme-' . $niv, $niveau);
            } elseif ($niv == 2) {
                $cycle = $this->getReference('cycle-' . $faker->numberBetween(4, 4));
                $anneeScolaire = $this->getReference('annee_1');
                $niveau = new Niveaux();
                $niveau->setDesignation('11ème Année');
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
                                    $frais->setMontant(50000);
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
                                    $frais->setDesignation('transfert');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(40000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
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
                        $this->addReference('statut11eme_' . $i, $statut);
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
                                    $frais->setDesignation('transfert');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(40000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
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
                        $this->addReference('statut11eme_' . $i, $statut);
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
                                    $frais->setDesignation('transfert');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(40000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
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
                        $this->addReference('statut11eme_' . $i, $statut);
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
                                    $frais->setDesignation('transfert');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
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
                        $this->addReference('statut11eme_' . $i, $statut);
                    } elseif ($i == 5) {
                        $statut = new Statuts();
                        $statut->setDesignation('Candidat libre');
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
                                    $frais->setMontant(50000);
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
                                    $frais->setDesignation('transfert');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(40000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
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
                        $this->addReference('statut11eme_' . $i, $statut);
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
                                    $frais->setMontant(50000);
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
                                    $frais->setDesignation('transfert');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(40000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
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
                        $this->addReference('statut11eme_' . $i, $statut);
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
                                    $frais->setDesignation('transfert');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
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
                        $this->addReference('statut11eme_' . $i, $statut);
                    } elseif ($i == 8) {
                        $statut = new Statuts();
                        $statut->setDesignation('Exclus');
                        $statut->setNiveau($niveau);
                        $manager->persist($statut);
                        $this->addReference('statut11eme_' . $i, $statut);
                    }
                }
                $manager->persist($niveau);
                $this->setReference('niveau11eme-' . $niv, $niveau);
            } else {
                $cycle = $this->getReference('cycle-' . $faker->numberBetween(4, 4));
                $anneeScolaire = $this->getReference('annee_1');
                $niveau = new Niveaux();
                $niveau->setDesignation('12ème Année');
                $niveau->setCycle($cycle);
                for ($i = 1; $i <= 9; $i++) {
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
                                    $frais->setMontant(50000);
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
                                    $frais->setDesignation('transfert');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(40000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
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
                        $this->addReference('statut12eme_' . $i, $statut);
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
                                    $frais->setDesignation('transfert');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(40000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
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
                        $this->addReference('statut12eme_' . $i, $statut);
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
                                    $frais->setDesignation('transfert');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(40000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
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
                        $this->addReference('statut12eme_' . $i, $statut);
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
                                    $frais->setDesignation('transfert');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
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
                        $this->addReference('statut12eme_' . $i, $statut);
                    } elseif ($i == 5) {
                        $statut = new Statuts();
                        $statut->setDesignation('Candidat libre');
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
                                    $frais->setMontant(50000);
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
                                    $frais->setDesignation('transfert');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(40000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
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
                        $this->addReference('statut12eme_' . $i, $statut);
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
                                    $frais->setMontant(50000);
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
                                    $frais->setDesignation('transfert');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 6) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(1, 1));
                                    $frais->setDesignation('octobre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(40000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 13) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(8, 8));
                                    $frais->setDesignation('mai');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(30000);
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
                        $this->addReference('statut12eme_' . $i, $statut);
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
                                    $frais->setDesignation('transfert');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
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
                        $this->addReference('statut12eme_' . $i, $statut);
                    } elseif ($i == 8) {
                        $statut = new Statuts();
                        $statut->setDesignation('Exclus');
                        $statut->setNiveau($niveau);
                        $manager->persist($statut);
                        $this->addReference('statut12eme_' . $i, $statut);
                    } elseif ($i == 9) {
                        $statut = new Statuts();
                        $statut->setDesignation('Passe au BAC');
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
                                    $frais->setDesignation('transfert');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 5) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(0, 0));
                                    $frais->setDesignation('septembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(0);
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
                        $this->addReference('statut12eme_' . $i, $statut);
                    }
                }

                $manager->persist($niveau);
                $this->setReference('niveau12eme-' . $niv, $niveau);
            }
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            Niveaux2ndCycleFixtures::class,
        ];
    }
}
