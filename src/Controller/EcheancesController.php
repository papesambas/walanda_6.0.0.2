<?php

namespace App\Controller;

use App\Entity\Echeances;
use App\Form\EcheancesType;
use App\Repository\EcheancesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/echeances')]
class EcheancesController extends AbstractController
{
    #[Route('/', name: 'app_echeances_index', methods: ['GET'])]
    public function index(EcheancesRepository $echeancesRepository): Response
    {
        return $this->render('echeances/index.html.twig', [
            'echeances' => $echeancesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_echeances_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $echeance = new Echeances();
        $form = $this->createForm(EcheancesType::class, $echeance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($echeance);
            $entityManager->flush();

            return $this->redirectToRoute('app_echeances_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('echeances/new.html.twig', [
            'echeance' => $echeance,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_echeances_show', methods: ['GET'])]
    public function show(Echeances $echeance): Response
    {
        return $this->render('echeances/show.html.twig', [
            'echeance' => $echeance,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_echeances_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Echeances $echeance, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EcheancesType::class, $echeance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_echeances_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('echeances/edit.html.twig', [
            'echeance' => $echeance,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_echeances_delete', methods: ['POST'])]
    public function delete(Request $request, Echeances $echeance, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$echeance->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($echeance);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_echeances_index', [], Response::HTTP_SEE_OTHER);
    }
}
