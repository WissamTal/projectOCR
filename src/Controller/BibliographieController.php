<?php

namespace App\Controller;

use App\Entity\Bibliographie;
use App\Form\BibliographieType;
use App\Repository\BibliographieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bibliographie")
 */
class BibliographieController extends AbstractController
{
    /**
     * @Route("/", name="app_bibliographie_index", methods={"GET"})
     */
    public function index(Request $request, BibliographieRepository $bibliographieRepository): Response
    {
        $bibliographie = new Bibliographie();
        $form = $this->createForm(BibliographieType::class, $bibliographie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bibliographieRepository->add($bibliographie, true);

            return $this->redirectToRoute('app_bibliographie_index', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('bibliographie/index.html.twig', [
            'bibliographies' => $bibliographieRepository->findAll(),
            'bibliographie' => $bibliographie,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/", name="app_bibliographie_new", methods={"GET", "POST"})
     */
    public function new(Request $request, BibliographieRepository $bibliographieRepository): Response
    {
        $bibliographie = new Bibliographie();
        $form = $this->createForm(BibliographieType::class, $bibliographie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bibliographieRepository->add($bibliographie, true);

            return $this->redirectToRoute('app_bibliographie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bibliographie/index.html.twig', [
            'bibliographie' => $bibliographie,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_bibliographie_show", methods={"GET"})
     */
    public function show(Bibliographie $bibliographie): Response
    {
        return $this->render('bibliographie/show.html.twig', [
            'bibliographie' => $bibliographie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_bibliographie_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Bibliographie $bibliographie, BibliographieRepository $bibliographieRepository): Response
    {
        $form = $this->createForm(BibliographieType::class, $bibliographie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bibliographieRepository->add($bibliographie, true);

            return $this->redirectToRoute('app_bibliographie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bibliographie/edit.html.twig', [
            'bibliographie' => $bibliographie,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_bibliographie_delete", methods={"POST"})
     */
    public function delete(Request $request, Bibliographie $bibliographie, BibliographieRepository $bibliographieRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bibliographie->getId(), $request->request->get('_token'))) {
            $bibliographieRepository->remove($bibliographie, true);
        }

        return $this->redirectToRoute('app_bibliographie_index', [], Response::HTTP_SEE_OTHER);
    }
}
