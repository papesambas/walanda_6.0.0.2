<?php

namespace App\Controller;

use App\Entity\DossierEleves;
use App\Form\DossierElevesType;
use App\Repository\DossierElevesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/dossier/eleves')]
class DossierElevesController extends AbstractController
{
    #[Route('/', name: 'app_dossier_eleves_index', methods: ['GET'])]
    public function index(DossierElevesRepository $dossierElevesRepository): Response
    {
        return $this->render('dossier_eleves/index.html.twig', [
            'dossier_eleves' => $dossierElevesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_dossier_eleves_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $dossierElefe = new DossierEleves();
        $form = $this->createForm(DossierElevesType::class, $dossierElefe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($dossierElefe);
            $entityManager->flush();

            return $this->redirectToRoute('app_dossier_eleves_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('dossier_eleves/new.html.twig', [
            'dossier_elefe' => $dossierElefe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_dossier_eleves_show', methods: ['GET'])]
    public function show(DossierEleves $dossierElefe): Response
    {
        return $this->render('dossier_eleves/show.html.twig', [
            'dossier_elefe' => $dossierElefe,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_dossier_eleves_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, DossierEleves $dossierElefe, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DossierElevesType::class, $dossierElefe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_dossier_eleves_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('dossier_eleves/edit.html.twig', [
            'dossier_elefe' => $dossierElefe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_dossier_eleves_delete', methods: ['POST'])]
    public function delete(Request $request, DossierEleves $dossierElefe, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dossierElefe->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($dossierElefe);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_dossier_eleves_index', [], Response::HTTP_SEE_OTHER);
    }
}
