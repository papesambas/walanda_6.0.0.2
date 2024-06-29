<?php

namespace App\Controller;

use App\Entity\Caisses;
use App\Form\CaissesType;
use App\Repository\CaissesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/caisses')]
class CaissesController extends AbstractController
{
    #[Route('/', name: 'app_caisses_index', methods: ['GET'])]
    public function index(CaissesRepository $caissesRepository): Response
    {
        return $this->render('caisses/index.html.twig', [
            'caisses' => $caissesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_caisses_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $caiss = new Caisses();
        $form = $this->createForm(CaissesType::class, $caiss);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($caiss);
            $entityManager->flush();

            return $this->redirectToRoute('app_caisses_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('caisses/new.html.twig', [
            'caiss' => $caiss,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_caisses_show', methods: ['GET'])]
    public function show(Caisses $caiss): Response
    {
        return $this->render('caisses/show.html.twig', [
            'caiss' => $caiss,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_caisses_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Caisses $caiss, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CaissesType::class, $caiss);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_caisses_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('caisses/edit.html.twig', [
            'caiss' => $caiss,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_caisses_delete', methods: ['POST'])]
    public function delete(Request $request, Caisses $caiss, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$caiss->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($caiss);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_caisses_index', [], Response::HTTP_SEE_OTHER);
    }
}
