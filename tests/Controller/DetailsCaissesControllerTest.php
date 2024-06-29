<?php

namespace App\Test\Controller;

use App\Entity\DetailsCaisses;
use App\Repository\DetailsCaissesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DetailsCaissesControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/details/caisses/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(DetailsCaisses::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('DetailsCaiss index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'details_caiss[dateOp]' => 'Testing',
            'details_caiss[designation]' => 'Testing',
            'details_caiss[montant]' => 'Testing',
            'details_caiss[createdAt]' => 'Testing',
            'details_caiss[updatedAt]' => 'Testing',
            'details_caiss[slug]' => 'Testing',
            'details_caiss[caisse]' => 'Testing',
            'details_caiss[author]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new DetailsCaisses();
        $fixture->setDateOp('My Title');
        $fixture->setDesignation('My Title');
        $fixture->setMontant('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setUpdatedAt('My Title');
        $fixture->setSlug('My Title');
        $fixture->setCaisse('My Title');
        $fixture->setAuthor('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('DetailsCaiss');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new DetailsCaisses();
        $fixture->setDateOp('Value');
        $fixture->setDesignation('Value');
        $fixture->setMontant('Value');
        $fixture->setCreatedAt('Value');
        $fixture->setUpdatedAt('Value');
        $fixture->setSlug('Value');
        $fixture->setCaisse('Value');
        $fixture->setAuthor('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'details_caiss[dateOp]' => 'Something New',
            'details_caiss[designation]' => 'Something New',
            'details_caiss[montant]' => 'Something New',
            'details_caiss[createdAt]' => 'Something New',
            'details_caiss[updatedAt]' => 'Something New',
            'details_caiss[slug]' => 'Something New',
            'details_caiss[caisse]' => 'Something New',
            'details_caiss[author]' => 'Something New',
        ]);

        self::assertResponseRedirects('/details/caisses/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getDateOp());
        self::assertSame('Something New', $fixture[0]->getDesignation());
        self::assertSame('Something New', $fixture[0]->getMontant());
        self::assertSame('Something New', $fixture[0]->getCreatedAt());
        self::assertSame('Something New', $fixture[0]->getUpdatedAt());
        self::assertSame('Something New', $fixture[0]->getSlug());
        self::assertSame('Something New', $fixture[0]->getCaisse());
        self::assertSame('Something New', $fixture[0]->getAuthor());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new DetailsCaisses();
        $fixture->setDateOp('Value');
        $fixture->setDesignation('Value');
        $fixture->setMontant('Value');
        $fixture->setCreatedAt('Value');
        $fixture->setUpdatedAt('Value');
        $fixture->setSlug('Value');
        $fixture->setCaisse('Value');
        $fixture->setAuthor('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/details/caisses/');
        self::assertSame(0, $this->repository->count([]));
    }
}
