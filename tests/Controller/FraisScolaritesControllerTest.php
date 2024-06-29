<?php

namespace App\Test\Controller;

use App\Entity\FraisScolarites;
use App\Repository\FraisScolaritesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FraisScolaritesControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/frais/scolarites/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(FraisScolarites::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('FraisScolarite index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'frais_scolarite[montant]' => 'Testing',
            'frais_scolarite[arrieres]' => 'Testing',
            'frais_scolarite[inscription]' => 'Testing',
            'frais_scolarite[carnet]' => 'Testing',
            'frais_scolarite[transfert]' => 'Testing',
            'frais_scolarite[septembre]' => 'Testing',
            'frais_scolarite[octobre]' => 'Testing',
            'frais_scolarite[novembre]' => 'Testing',
            'frais_scolarite[decembre]' => 'Testing',
            'frais_scolarite[janvier]' => 'Testing',
            'frais_scolarite[fevrier]' => 'Testing',
            'frais_scolarite[mars]' => 'Testing',
            'frais_scolarite[avril]' => 'Testing',
            'frais_scolarite[mai]' => 'Testing',
            'frais_scolarite[juin]' => 'Testing',
            'frais_scolarite[autre]' => 'Testing',
            'frais_scolarite[echeanceTransfert]' => 'Testing',
            'frais_scolarite[echeanceCarnet]' => 'Testing',
            'frais_scolarite[echeanceInscription]' => 'Testing',
            'frais_scolarite[echeancesArrieres]' => 'Testing',
            'frais_scolarite[echeanceSeptembre]' => 'Testing',
            'frais_scolarite[echeanceOctobre]' => 'Testing',
            'frais_scolarite[echeanceNovembre]' => 'Testing',
            'frais_scolarite[echeanceDecembre]' => 'Testing',
            'frais_scolarite[echeanceJanvier]' => 'Testing',
            'frais_scolarite[echeanceFevrier]' => 'Testing',
            'frais_scolarite[echeanceMars]' => 'Testing',
            'frais_scolarite[echeanceAvril]' => 'Testing',
            'frais_scolarite[echeanceMai]' => 'Testing',
            'frais_scolarite[echeanceJuin]' => 'Testing',
            'frais_scolarite[echeanceAutre]' => 'Testing',
            'frais_scolarite[eleves]' => 'Testing',
            'frais_scolarite[fraisScolaires]' => 'Testing',
            'frais_scolarite[anneeScolaires]' => 'Testing',
            'frais_scolarite[fraisType]' => 'Testing',
            'frais_scolarite[createdBy]' => 'Testing',
            'frais_scolarite[updatedBy]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new FraisScolarites();
        $fixture->setMontant('My Title');
        $fixture->setArrieres('My Title');
        $fixture->setInscription('My Title');
        $fixture->setCarnet('My Title');
        $fixture->setTransfert('My Title');
        $fixture->setSeptembre('My Title');
        $fixture->setOctobre('My Title');
        $fixture->setNovembre('My Title');
        $fixture->setDecembre('My Title');
        $fixture->setJanvier('My Title');
        $fixture->setFevrier('My Title');
        $fixture->setMars('My Title');
        $fixture->setAvril('My Title');
        $fixture->setMai('My Title');
        $fixture->setJuin('My Title');
        $fixture->setAutre('My Title');
        $fixture->setEcheanceTransfert('My Title');
        $fixture->setEcheanceCarnet('My Title');
        $fixture->setEcheanceInscription('My Title');
        $fixture->setEcheancesArrieres('My Title');
        $fixture->setEcheanceSeptembre('My Title');
        $fixture->setEcheanceOctobre('My Title');
        $fixture->setEcheanceNovembre('My Title');
        $fixture->setEcheanceDecembre('My Title');
        $fixture->setEcheanceJanvier('My Title');
        $fixture->setEcheanceFevrier('My Title');
        $fixture->setEcheanceMars('My Title');
        $fixture->setEcheanceAvril('My Title');
        $fixture->setEcheanceMai('My Title');
        $fixture->setEcheanceJuin('My Title');
        $fixture->setEcheanceAutre('My Title');
        $fixture->setEleves('My Title');
        $fixture->setFraisScolaires('My Title');
        $fixture->setAnneeScolaires('My Title');
        $fixture->setFraisType('My Title');
        $fixture->setCreatedBy('My Title');
        $fixture->setUpdatedBy('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('FraisScolarite');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new FraisScolarites();
        $fixture->setMontant('Value');
        $fixture->setArrieres('Value');
        $fixture->setInscription('Value');
        $fixture->setCarnet('Value');
        $fixture->setTransfert('Value');
        $fixture->setSeptembre('Value');
        $fixture->setOctobre('Value');
        $fixture->setNovembre('Value');
        $fixture->setDecembre('Value');
        $fixture->setJanvier('Value');
        $fixture->setFevrier('Value');
        $fixture->setMars('Value');
        $fixture->setAvril('Value');
        $fixture->setMai('Value');
        $fixture->setJuin('Value');
        $fixture->setAutre('Value');
        $fixture->setEcheanceTransfert('Value');
        $fixture->setEcheanceCarnet('Value');
        $fixture->setEcheanceInscription('Value');
        $fixture->setEcheancesArrieres('Value');
        $fixture->setEcheanceSeptembre('Value');
        $fixture->setEcheanceOctobre('Value');
        $fixture->setEcheanceNovembre('Value');
        $fixture->setEcheanceDecembre('Value');
        $fixture->setEcheanceJanvier('Value');
        $fixture->setEcheanceFevrier('Value');
        $fixture->setEcheanceMars('Value');
        $fixture->setEcheanceAvril('Value');
        $fixture->setEcheanceMai('Value');
        $fixture->setEcheanceJuin('Value');
        $fixture->setEcheanceAutre('Value');
        $fixture->setEleves('Value');
        $fixture->setFraisScolaires('Value');
        $fixture->setAnneeScolaires('Value');
        $fixture->setFraisType('Value');
        $fixture->setCreatedBy('Value');
        $fixture->setUpdatedBy('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'frais_scolarite[montant]' => 'Something New',
            'frais_scolarite[arrieres]' => 'Something New',
            'frais_scolarite[inscription]' => 'Something New',
            'frais_scolarite[carnet]' => 'Something New',
            'frais_scolarite[transfert]' => 'Something New',
            'frais_scolarite[septembre]' => 'Something New',
            'frais_scolarite[octobre]' => 'Something New',
            'frais_scolarite[novembre]' => 'Something New',
            'frais_scolarite[decembre]' => 'Something New',
            'frais_scolarite[janvier]' => 'Something New',
            'frais_scolarite[fevrier]' => 'Something New',
            'frais_scolarite[mars]' => 'Something New',
            'frais_scolarite[avril]' => 'Something New',
            'frais_scolarite[mai]' => 'Something New',
            'frais_scolarite[juin]' => 'Something New',
            'frais_scolarite[autre]' => 'Something New',
            'frais_scolarite[echeanceTransfert]' => 'Something New',
            'frais_scolarite[echeanceCarnet]' => 'Something New',
            'frais_scolarite[echeanceInscription]' => 'Something New',
            'frais_scolarite[echeancesArrieres]' => 'Something New',
            'frais_scolarite[echeanceSeptembre]' => 'Something New',
            'frais_scolarite[echeanceOctobre]' => 'Something New',
            'frais_scolarite[echeanceNovembre]' => 'Something New',
            'frais_scolarite[echeanceDecembre]' => 'Something New',
            'frais_scolarite[echeanceJanvier]' => 'Something New',
            'frais_scolarite[echeanceFevrier]' => 'Something New',
            'frais_scolarite[echeanceMars]' => 'Something New',
            'frais_scolarite[echeanceAvril]' => 'Something New',
            'frais_scolarite[echeanceMai]' => 'Something New',
            'frais_scolarite[echeanceJuin]' => 'Something New',
            'frais_scolarite[echeanceAutre]' => 'Something New',
            'frais_scolarite[eleves]' => 'Something New',
            'frais_scolarite[fraisScolaires]' => 'Something New',
            'frais_scolarite[anneeScolaires]' => 'Something New',
            'frais_scolarite[fraisType]' => 'Something New',
            'frais_scolarite[createdBy]' => 'Something New',
            'frais_scolarite[updatedBy]' => 'Something New',
        ]);

        self::assertResponseRedirects('/frais/scolarites/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getMontant());
        self::assertSame('Something New', $fixture[0]->getArrieres());
        self::assertSame('Something New', $fixture[0]->getInscription());
        self::assertSame('Something New', $fixture[0]->getCarnet());
        self::assertSame('Something New', $fixture[0]->getTransfert());
        self::assertSame('Something New', $fixture[0]->getSeptembre());
        self::assertSame('Something New', $fixture[0]->getOctobre());
        self::assertSame('Something New', $fixture[0]->getNovembre());
        self::assertSame('Something New', $fixture[0]->getDecembre());
        self::assertSame('Something New', $fixture[0]->getJanvier());
        self::assertSame('Something New', $fixture[0]->getFevrier());
        self::assertSame('Something New', $fixture[0]->getMars());
        self::assertSame('Something New', $fixture[0]->getAvril());
        self::assertSame('Something New', $fixture[0]->getMai());
        self::assertSame('Something New', $fixture[0]->getJuin());
        self::assertSame('Something New', $fixture[0]->getAutre());
        self::assertSame('Something New', $fixture[0]->getEcheanceTransfert());
        self::assertSame('Something New', $fixture[0]->getEcheanceCarnet());
        self::assertSame('Something New', $fixture[0]->getEcheanceInscription());
        self::assertSame('Something New', $fixture[0]->getEcheancesArrieres());
        self::assertSame('Something New', $fixture[0]->getEcheanceSeptembre());
        self::assertSame('Something New', $fixture[0]->getEcheanceOctobre());
        self::assertSame('Something New', $fixture[0]->getEcheanceNovembre());
        self::assertSame('Something New', $fixture[0]->getEcheanceDecembre());
        self::assertSame('Something New', $fixture[0]->getEcheanceJanvier());
        self::assertSame('Something New', $fixture[0]->getEcheanceFevrier());
        self::assertSame('Something New', $fixture[0]->getEcheanceMars());
        self::assertSame('Something New', $fixture[0]->getEcheanceAvril());
        self::assertSame('Something New', $fixture[0]->getEcheanceMai());
        self::assertSame('Something New', $fixture[0]->getEcheanceJuin());
        self::assertSame('Something New', $fixture[0]->getEcheanceAutre());
        self::assertSame('Something New', $fixture[0]->getEleves());
        self::assertSame('Something New', $fixture[0]->getFraisScolaires());
        self::assertSame('Something New', $fixture[0]->getAnneeScolaires());
        self::assertSame('Something New', $fixture[0]->getFraisType());
        self::assertSame('Something New', $fixture[0]->getCreatedBy());
        self::assertSame('Something New', $fixture[0]->getUpdatedBy());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new FraisScolarites();
        $fixture->setMontant('Value');
        $fixture->setArrieres('Value');
        $fixture->setInscription('Value');
        $fixture->setCarnet('Value');
        $fixture->setTransfert('Value');
        $fixture->setSeptembre('Value');
        $fixture->setOctobre('Value');
        $fixture->setNovembre('Value');
        $fixture->setDecembre('Value');
        $fixture->setJanvier('Value');
        $fixture->setFevrier('Value');
        $fixture->setMars('Value');
        $fixture->setAvril('Value');
        $fixture->setMai('Value');
        $fixture->setJuin('Value');
        $fixture->setAutre('Value');
        $fixture->setEcheanceTransfert('Value');
        $fixture->setEcheanceCarnet('Value');
        $fixture->setEcheanceInscription('Value');
        $fixture->setEcheancesArrieres('Value');
        $fixture->setEcheanceSeptembre('Value');
        $fixture->setEcheanceOctobre('Value');
        $fixture->setEcheanceNovembre('Value');
        $fixture->setEcheanceDecembre('Value');
        $fixture->setEcheanceJanvier('Value');
        $fixture->setEcheanceFevrier('Value');
        $fixture->setEcheanceMars('Value');
        $fixture->setEcheanceAvril('Value');
        $fixture->setEcheanceMai('Value');
        $fixture->setEcheanceJuin('Value');
        $fixture->setEcheanceAutre('Value');
        $fixture->setEleves('Value');
        $fixture->setFraisScolaires('Value');
        $fixture->setAnneeScolaires('Value');
        $fixture->setFraisType('Value');
        $fixture->setCreatedBy('Value');
        $fixture->setUpdatedBy('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/frais/scolarites/');
        self::assertSame(0, $this->repository->count([]));
    }
}
