<?php

namespace App\Controller;

use App\Entity\FraisType;
use App\Form\FraisTypeType;
use App\Repository\FraisTypeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/frais/type')]
class FraisTypeController extends AbstractController
{
    #[Route('/', name: 'app_frais_type_index', methods: ['GET'])]
    public function index(FraisTypeRepository $fraisTypeRepository): Response
    {
        return $this->render('frais_type/index.html.twig', [
            'frais_types' => $fraisTypeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_frais_type_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $fraisType = new FraisType();
        $form = $this->createForm(FraisTypeType::class, $fraisType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($fraisType);
            $entityManager->flush();

            return $this->redirectToRoute('app_frais_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('frais_type/new.html.twig', [
            'frais_type' => $fraisType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_frais_type_show', methods: ['GET'])]
    public function show(FraisType $fraisType): Response
    {
        return $this->render('frais_type/show.html.twig', [
            'frais_type' => $fraisType,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_frais_type_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, FraisType $fraisType, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FraisTypeType::class, $fraisType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_frais_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('frais_type/edit.html.twig', [
            'frais_type' => $fraisType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_frais_type_delete', methods: ['POST'])]
    public function delete(Request $request, FraisType $fraisType, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fraisType->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($fraisType);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_frais_type_index', [], Response::HTTP_SEE_OTHER);
    }
}
