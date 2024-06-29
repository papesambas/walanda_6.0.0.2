<?php

namespace App\Test\Controller;

use App\Entity\AnneeScolaires;
use App\Repository\AnneeScolairesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AnneeScolairesControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/annee/scolaires/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(AnneeScolaires::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('AnneeScolaire index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'annee_scolaire[anneeDebut]' => 'Testing',
            'annee_scolaire[anneeFin]' => 'Testing',
            'annee_scolaire[createdAt]' => 'Testing',
            'annee_scolaire[updatedAt]' => 'Testing',
            'annee_scolaire[fraisScolaires]' => 'Testing',
            'annee_scolaire[createdBy]' => 'Testing',
            'annee_scolaire[updatedBy]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new AnneeScolaires();
        $fixture->setAnneeDebut('My Title');
        $fixture->setAnneeFin('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setUpdatedAt('My Title');
        $fixture->setFraisScolaires('My Title');
        $fixture->setCreatedBy('My Title');
        $fixture->setUpdatedBy('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('AnneeScolaire');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new AnneeScolaires();
        $fixture->setAnneeDebut('Value');
        $fixture->setAnneeFin('Value');
        $fixture->setCreatedAt('Value');
        $fixture->setUpdatedAt('Value');
        $fixture->setFraisScolaires('Value');
        $fixture->setCreatedBy('Value');
        $fixture->setUpdatedBy('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'annee_scolaire[anneeDebut]' => 'Something New',
            'annee_scolaire[anneeFin]' => 'Something New',
            'annee_scolaire[createdAt]' => 'Something New',
            'annee_scolaire[updatedAt]' => 'Something New',
            'annee_scolaire[fraisScolaires]' => 'Something New',
            'annee_scolaire[createdBy]' => 'Something New',
            'annee_scolaire[updatedBy]' => 'Something New',
        ]);

        self::assertResponseRedirects('/annee/scolaires/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getAnneeDebut());
        self::assertSame('Something New', $fixture[0]->getAnneeFin());
        self::assertSame('Something New', $fixture[0]->getCreatedAt());
        self::assertSame('Something New', $fixture[0]->getUpdatedAt());
        self::assertSame('Something New', $fixture[0]->getFraisScolaires());
        self::assertSame('Something New', $fixture[0]->getCreatedBy());
        self::assertSame('Something New', $fixture[0]->getUpdatedBy());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new AnneeScolaires();
        $fixture->setAnneeDebut('Value');
        $fixture->setAnneeFin('Value');
        $fixture->setCreatedAt('Value');
        $fixture->setUpdatedAt('Value');
        $fixture->setFraisScolaires('Value');
        $fixture->setCreatedBy('Value');
        $fixture->setUpdatedBy('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/annee/scolaires/');
        self::assertSame(0, $this->repository->count([]));
    }
}
