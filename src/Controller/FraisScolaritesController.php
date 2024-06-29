<?php

namespace App\Controller;

use App\Entity\FraisScolarites;
use App\Form\FraisScolaritesType;
use App\Repository\FraisScolaritesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/frais/scolarites')]
class FraisScolaritesController extends AbstractController
{
    #[Route('/', name: 'app_frais_scolarites_index', methods: ['GET'])]
    public function index(FraisScolaritesRepository $fraisScolaritesRepository): Response
    {
        return $this->render('frais_scolarites/index.html.twig', [
            'frais_scolarites' => $fraisScolaritesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_frais_scolarites_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $fraisScolarite = new FraisScolarites();
        $form = $this->createForm(FraisScolaritesType::class, $fraisScolarite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($fraisScolarite);
            $entityManager->flush();

            return $this->redirectToRoute('app_frais_scolarites_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('frais_scolarites/new.html.twig', [
            'frais_scolarite' => $fraisScolarite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_frais_scolarites_show', methods: ['GET'])]
    public function show(FraisScolarites $fraisScolarite): Response
    {
        return $this->render('frais_scolarites/show.html.twig', [
            'frais_scolarite' => $fraisScolarite,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_frais_scolarites_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, FraisScolarites $fraisScolarite, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FraisScolaritesType::class, $fraisScolarite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_frais_scolarites_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('frais_scolarites/edit.html.twig', [
            'frais_scolarite' => $fraisScolarite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_frais_scolarites_delete', methods: ['POST'])]
    public function delete(Request $request, FraisScolarites $fraisScolarite, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fraisScolarite->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($fraisScolarite);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_frais_scolarites_index', [], Response::HTTP_SEE_OTHER);
    }
}
