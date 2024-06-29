<?php

namespace App\Controller;

use App\Entity\FraisScolaires;
use App\Form\FraisScolairesType;
use App\Repository\FraisScolairesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/frais/scolaires')]
class FraisScolairesController extends AbstractController
{
    #[Route('/', name: 'app_frais_scolaires_index', methods: ['GET'])]
    public function index(FraisScolairesRepository $fraisScolairesRepository): Response
    {
        return $this->render('frais_scolaires/index.html.twig', [
            'frais_scolaires' => $fraisScolairesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_frais_scolaires_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $fraisScolaire = new FraisScolaires();
        $form = $this->createForm(FraisScolairesType::class, $fraisScolaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($fraisScolaire);
            $entityManager->flush();

            return $this->redirectToRoute('app_frais_scolaires_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('frais_scolaires/new.html.twig', [
            'frais_scolaire' => $fraisScolaire,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_frais_scolaires_show', methods: ['GET'])]
    public function show(FraisScolaires $fraisScolaire): Response
    {
        return $this->render('frais_scolaires/show.html.twig', [
            'frais_scolaire' => $fraisScolaire,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_frais_scolaires_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, FraisScolaires $fraisScolaire, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FraisScolairesType::class, $fraisScolaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_frais_scolaires_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('frais_scolaires/edit.html.twig', [
            'frais_scolaire' => $fraisScolaire,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_frais_scolaires_delete', methods: ['POST'])]
    public function delete(Request $request, FraisScolaires $fraisScolaire, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fraisScolaire->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($fraisScolaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_frais_scolaires_index', [], Response::HTTP_SEE_OTHER);
    }
}
