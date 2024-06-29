<?php

namespace App\Test\Controller;

use App\Entity\Caisses;
use App\Repository\CaissesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CaissesControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/caisses/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(Caisses::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Caiss index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'caiss[dateOp]' => 'Testing',
            'caiss[libelle]' => 'Testing',
            'caiss[debit]' => 'Testing',
            'caiss[credit]' => 'Testing',
            'caiss[solde]' => 'Testing',
            'caiss[soldeCumul]' => 'Testing',
            'caiss[createdAt]' => 'Testing',
            'caiss[updatedAt]' => 'Testing',
            'caiss[slug]' => 'Testing',
            'caiss[scolarite]' => 'Testing',
            'caiss[author]' => 'Testing',
            'caiss[anneeScolaires]' => 'Testing',
            'caiss[createdBy]' => 'Testing',
            'caiss[updatedBy]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Caisses();
        $fixture->setDateOp('My Title');
        $fixture->setLibelle('My Title');
        $fixture->setDebit('My Title');
        $fixture->setCredit('My Title');
        $fixture->setSolde('My Title');
        $fixture->setSoldeCumul('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setUpdatedAt('My Title');
        $fixture->setSlug('My Title');
        $fixture->setScolarite('My Title');
        $fixture->setAuthor('My Title');
        $fixture->setAnneeScolaires('My Title');
        $fixture->setCreatedBy('My Title');
        $fixture->setUpdatedBy('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Caiss');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Caisses();
        $fixture->setDateOp('Value');
        $fixture->setLibelle('Value');
        $fixture->setDebit('Value');
        $fixture->setCredit('Value');
        $fixture->setSolde('Value');
        $fixture->setSoldeCumul('Value');
        $fixture->setCreatedAt('Value');
        $fixture->setUpdatedAt('Value');
        $fixture->setSlug('Value');
        $fixture->setScolarite('Value');
        $fixture->setAuthor('Value');
        $fixture->setAnneeScolaires('Value');
        $fixture->setCreatedBy('Value');
        $fixture->setUpdatedBy('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'caiss[dateOp]' => 'Something New',
            'caiss[libelle]' => 'Something New',
            'caiss[debit]' => 'Something New',
            'caiss[credit]' => 'Something New',
            'caiss[solde]' => 'Something New',
            'caiss[soldeCumul]' => 'Something New',
            'caiss[createdAt]' => 'Something New',
            'caiss[updatedAt]' => 'Something New',
            'caiss[slug]' => 'Something New',
            'caiss[scolarite]' => 'Something New',
            'caiss[author]' => 'Something New',
            'caiss[anneeScolaires]' => 'Something New',
            'caiss[createdBy]' => 'Something New',
            'caiss[updatedBy]' => 'Something New',
        ]);

        self::assertResponseRedirects('/caisses/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getDateOp());
        self::assertSame('Something New', $fixture[0]->getLibelle());
        self::assertSame('Something New', $fixture[0]->getDebit());
        self::assertSame('Something New', $fixture[0]->getCredit());
        self::assertSame('Something New', $fixture[0]->getSolde());
        self::assertSame('Something New', $fixture[0]->getSoldeCumul());
        self::assertSame('Something New', $fixture[0]->getCreatedAt());
        self::assertSame('Something New', $fixture[0]->getUpdatedAt());
        self::assertSame('Something New', $fixture[0]->getSlug());
        self::assertSame('Something New', $fixture[0]->getScolarite());
        self::assertSame('Something New', $fixture[0]->getAuthor());
        self::assertSame('Something New', $fixture[0]->getAnneeScolaires());
        self::assertSame('Something New', $fixture[0]->getCreatedBy());
        self::assertSame('Something New', $fixture[0]->getUpdatedBy());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new Caisses();
        $fixture->setDateOp('Value');
        $fixture->setLibelle('Value');
        $fixture->setDebit('Value');
        $fixture->setCredit('Value');
        $fixture->setSolde('Value');
        $fixture->setSoldeCumul('Value');
        $fixture->setCreatedAt('Value');
        $fixture->setUpdatedAt('Value');
        $fixture->setSlug('Value');
        $fixture->setScolarite('Value');
        $fixture->setAuthor('Value');
        $fixture->setAnneeScolaires('Value');
        $fixture->setCreatedBy('Value');
        $fixture->setUpdatedBy('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/caisses/');
        self::assertSame(0, $this->repository->count([]));
    }
}
