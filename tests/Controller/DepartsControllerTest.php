<?php

namespace App\Test\Controller;

use App\Entity\Departs;
use App\Repository\DepartsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DepartsControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/departs/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(Departs::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Depart index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'depart[dateDepart]' => 'Testing',
            'depart[motif]' => 'Testing',
            'depart[ecoleDestination]' => 'Testing',
            'depart[createdAt]' => 'Testing',
            'depart[updatedAt]' => 'Testing',
            'depart[eleve]' => 'Testing',
            'depart[createdBy]' => 'Testing',
            'depart[updatedBy]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Departs();
        $fixture->setDateDepart('My Title');
        $fixture->setMotif('My Title');
        $fixture->setEcoleDestination('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setUpdatedAt('My Title');
        $fixture->setEleve('My Title');
        $fixture->setCreatedBy('My Title');
        $fixture->setUpdatedBy('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Depart');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Departs();
        $fixture->setDateDepart('Value');
        $fixture->setMotif('Value');
        $fixture->setEcoleDestination('Value');
        $fixture->setCreatedAt('Value');
        $fixture->setUpdatedAt('Value');
        $fixture->setEleve('Value');
        $fixture->setCreatedBy('Value');
        $fixture->setUpdatedBy('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'depart[dateDepart]' => 'Something New',
            'depart[motif]' => 'Something New',
            'depart[ecoleDestination]' => 'Something New',
            'depart[createdAt]' => 'Something New',
            'depart[updatedAt]' => 'Something New',
            'depart[eleve]' => 'Something New',
            'depart[createdBy]' => 'Something New',
            'depart[updatedBy]' => 'Something New',
        ]);

        self::assertResponseRedirects('/departs/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getDateDepart());
        self::assertSame('Something New', $fixture[0]->getMotif());
        self::assertSame('Something New', $fixture[0]->getEcoleDestination());
        self::assertSame('Something New', $fixture[0]->getCreatedAt());
        self::assertSame('Something New', $fixture[0]->getUpdatedAt());
        self::assertSame('Something New', $fixture[0]->getEleve());
        self::assertSame('Something New', $fixture[0]->getCreatedBy());
        self::assertSame('Something New', $fixture[0]->getUpdatedBy());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new Departs();
        $fixture->setDateDepart('Value');
        $fixture->setMotif('Value');
        $fixture->setEcoleDestination('Value');
        $fixture->setCreatedAt('Value');
        $fixture->setUpdatedAt('Value');
        $fixture->setEleve('Value');
        $fixture->setCreatedBy('Value');
        $fixture->setUpdatedBy('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/departs/');
        self::assertSame(0, $this->repository->count([]));
    }
}
