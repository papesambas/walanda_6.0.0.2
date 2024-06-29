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

class NiveauxMaternelleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($niv = 1; $niv <= 3; $niv++) {
            if ($niv == 1) {
                $cycle = $this->getReference('cycle-' . $faker->numberBetween(1, 1));
                $anneeScolaire = $this->getReference('annee_1');
                $niveau = new Niveaux();
                $niveau->setDesignation('Petite Section');
                $niveau->setCycle($cycle);
                for ($i = 1; $i <= 5; $i++) {
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
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

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
                        $this->addReference('statutPS_' . $i, $statut);
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
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

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
                        $this->addReference('statutPS_' . $i, $statut);
                    } elseif ($i == 3) {
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
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

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
                        $this->addReference('statutPS_' . $i, $statut);
                    } elseif ($i == 4) {
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
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

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
                        $this->addReference('statutPS_' . $i, $statut);
                    } elseif ($i == 5) {
                        $statut = new Statuts();
                        $statut->setDesignation('Abandon');
                        $statut->setNiveau($niveau);
                        $manager->persist($statut);
                        $this->addReference('statutPS_' . $i, $statut);
                    }
                }
                $manager->persist($niveau);
                $this->setReference('niveauMat-' . $niv, $niveau);
            } elseif ($niv == 2) {
                $cycle = $this->getReference('cycle-' . $faker->numberBetween(1, 1));
                $anneeScolaire = $this->getReference('annee_1');
                $niveau = new Niveaux();
                $niveau->setDesignation('Moyenne Section');
                $niveau->setCycle($cycle);
                for ($i = 1; $i <= 5; $i++) {
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
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

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
                        $this->addReference('statutMS_' . $i, $statut);
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
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

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
                        $this->addReference('statutMS_' . $i, $statut);
                    } elseif ($i == 3) {
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
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

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
                        $this->addReference('statutMS_' . $i, $statut);
                    } elseif ($i == 4) {
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
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

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
                        $this->addReference('statutMS_' . $i, $statut);
                    } elseif ($i == 5) {
                        $statut = new Statuts();
                        $statut->setDesignation('Abandon');
                        $statut->setNiveau($niveau);
                        $manager->persist($statut);
                        $this->addReference('statutMS_' . $i, $statut);
                    }
                }
                $manager->persist($niveau);
                $this->setReference('niveauMat-' . $niv, $niveau);
            } elseif ($niv == 3) {
                $cycle = $this->getReference('cycle-' . $faker->numberBetween(1, 1));
                $anneeScolaire = $this->getReference('annee_1');
                $niveau = new Niveaux();
                $niveau->setDesignation('Grande Section');
                $niveau->setCycle($cycle);
                for ($i = 1; $i <= 5; $i++) {
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
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

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
                        $this->addReference('statutGS_' . $i, $statut);
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
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

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
                        $this->addReference('statutGS_' . $i, $statut);
                    } elseif ($i == 3) {
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
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

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
                        $this->addReference('statutGS_' . $i, $statut);
                    } elseif ($i == 4) {
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
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 7) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(2, 2));
                                    $frais->setDesignation('novembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 8) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(3, 3));
                                    $frais->setDesignation('decembre');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 9) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(4, 4));
                                    $frais->setDesignation('janvier');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 10) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(5, 5));
                                    $frais->setDesignation('février');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 11) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(6, 6));
                                    $frais->setDesignation('mars');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(15000);

                                    $frais->addAnneeScolaire($anneeScolaire);
                                    $frais->setFraisType($fraisType);
                                    $manager->persist($frais);
                                } elseif ($a == 12) {
                                    $echeance = $this->getReference('mensuelle_' . $faker->numberBetween(7, 7));
                                    $frais->setDesignation('avril');
                                    $frais->setEcheance($echeance);
                                    $frais->setMontant(11000);

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
                        $this->addReference('statutGS_' . $i, $statut);
                    } elseif ($i == 5) {
                        $statut = new Statuts();
                        $statut->setDesignation('Abandon');
                        $statut->setNiveau($niveau);
                        $manager->persist($statut);
                        $this->addReference('statutGS_' . $i, $statut);
                    }
                }

                $this->setReference('niveauMat-' . $niv, $niveau);
                $manager->persist($niveau);
            }
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CyclesFixtures::class,
        ];
    }
}