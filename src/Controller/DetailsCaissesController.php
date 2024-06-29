<?php

namespace App\Controller;

use App\Entity\DetailsCaisses;
use App\Form\DetailsCaissesType;
use App\Repository\DetailsCaissesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/details/caisses')]
class DetailsCaissesController extends AbstractController
{
    #[Route('/', name: 'app_details_caisses_index', methods: ['GET'])]
    public function index(DetailsCaissesRepository $detailsCaissesRepository): Response
    {
        return $this->render('details_caisses/index.html.twig', [
            'details_caisses' => $detailsCaissesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_details_caisses_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $detailsCaiss = new DetailsCaisses();
        $form = $this->createForm(DetailsCaissesType::class, $detailsCaiss);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($detailsCaiss);
            $entityManager->flush();

            return $this->redirectToRoute('app_details_caisses_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('details_caisses/new.html.twig', [
            'details_caiss' => $detailsCaiss,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_details_caisses_show', methods: ['GET'])]
    public function show(DetailsCaisses $detailsCaiss): Response
    {
        return $this->render('details_caisses/show.html.twig', [
            'details_caiss' => $detailsCaiss,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_details_caisses_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, DetailsCaisses $detailsCaiss, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DetailsCaissesType::class, $detailsCaiss);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_details_caisses_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('details_caisses/edit.html.twig', [
            'details_caiss' => $detailsCaiss,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_details_caisses_delete', methods: ['POST'])]
    public function delete(Request $request, DetailsCaisses $detailsCaiss, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$detailsCaiss->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($detailsCaiss);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_details_caisses_index', [], Response::HTTP_SEE_OTHER);
    }
}
