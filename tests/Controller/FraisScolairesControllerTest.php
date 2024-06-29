<?php

namespace App\Test\Controller;

use App\Entity\FraisScolaires;
use App\Repository\FraisScolairesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FraisScolairesControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/frais/scolaires/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(FraisScolaires::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('FraisScolaire index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'frais_scolaire[designation]' => 'Testing',
            'frais_scolaire[montant]' => 'Testing',
            'frais_scolaire[createdAt]' => 'Testing',
            'frais_scolaire[updatedAt]' => 'Testing',
            'frais_scolaire[echeance]' => 'Testing',
            'frais_scolaire[fraisType]' => 'Testing',
            'frais_scolaire[fraisScolarites]' => 'Testing',
            'frais_scolaire[anneeScolaires]' => 'Testing',
            'frais_scolaire[createdBy]' => 'Testing',
            'frais_scolaire[updatedBy]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new FraisScolaires();
        $fixture->setDesignation('My Title');
        $fixture->setMontant('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setUpdatedAt('My Title');
        $fixture->setEcheance('My Title');
        $fixture->setFraisType('My Title');
        $fixture->setFraisScolarites('My Title');
        $fixture->setAnneeScolaires('My Title');
        $fixture->setCreatedBy('My Title');
        $fixture->setUpdatedBy('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('FraisScolaire');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new FraisScolaires();
        $fixture->setDesignation('Value');
        $fixture->setMontant('Value');
        $fixture->setCreatedAt('Value');
        $fixture->setUpdatedAt('Value');
        $fixture->setEcheance('Value');
        $fixture->setFraisType('Value');
        $fixture->setFraisScolarites('Value');
        $fixture->setAnneeScolaires('Value');
        $fixture->setCreatedBy('Value');
        $fixture->setUpdatedBy('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'frais_scolaire[designation]' => 'Something New',
            'frais_scolaire[montant]' => 'Something New',
            'frais_scolaire[createdAt]' => 'Something New',
            'frais_scolaire[updatedAt]' => 'Something New',
            'frais_scolaire[echeance]' => 'Something New',
            'frais_scolaire[fraisType]' => 'Something New',
            'frais_scolaire[fraisScolarites]' => 'Something New',
            'frais_scolaire[anneeScolaires]' => 'Something New',
            'frais_scolaire[createdBy]' => 'Something New',
            'frais_scolaire[updatedBy]' => 'Something New',
        ]);

        self::assertResponseRedirects('/frais/scolaires/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getDesignation());
        self::assertSame('Something New', $fixture[0]->getMontant());
        self::assertSame('Something New', $fixture[0]->getCreatedAt());
        self::assertSame('Something New', $fixture[0]->getUpdatedAt());
        self::assertSame('Something New', $fixture[0]->getEcheance());
        self::assertSame('Something New', $fixture[0]->getFraisType());
        self::assertSame('Something New', $fixture[0]->getFraisScolarites());
        self::assertSame('Something New', $fixture[0]->getAnneeScolaires());
        self::assertSame('Something New', $fixture[0]->getCreatedBy());
        self::assertSame('Something New', $fixture[0]->getUpdatedBy());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new FraisScolaires();
        $fixture->setDesignation('Value');
        $fixture->setMontant('Value');
        $fixture->setCreatedAt('Value');
        $fixture->setUpdatedAt('Value');
        $fixture->setEcheance('Value');
        $fixture->setFraisType('Value');
        $fixture->setFraisScolarites('Value');
        $fixture->setAnneeScolaires('Value');
        $fixture->setCreatedBy('Value');
        $fixture->setUpdatedBy('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/frais/scolaires/');
        self::assertSame(0, $this->repository->count([]));
    }
}
