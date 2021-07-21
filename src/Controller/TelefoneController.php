<?php

namespace App\Controller;

use App\Entity\Telefone;
use App\Form\TelefoneType;
use App\Repository\TelefoneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/telefone")
 */
class TelefoneController extends AbstractController
{
    /**
     * @Route("/", name="telefone_index", methods={"GET"})
     */
    public function index(TelefoneRepository $telefoneRepository): Response
    {
        return $this->render('telefone/index.html.twig', [
            'telefones' => $telefoneRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="telefone_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $telefone = new Telefone();
        $form = $this->createForm(TelefoneType::class, $telefone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($telefone);
            $entityManager->flush();

            return $this->redirectToRoute('telefone_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('telefone/new.html.twig', [
            'telefone' => $telefone,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="telefone_show", methods={"GET"})
     */
    public function show(Telefone $telefone): Response
    {
        return $this->render('telefone/show.html.twig', [
            'telefone' => $telefone,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="telefone_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Telefone $telefone): Response
    {
        $form = $this->createForm(TelefoneType::class, $telefone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('telefone_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('telefone/edit.html.twig', [
            'telefone' => $telefone,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="telefone_delete", methods={"POST"})
     */
    public function delete(Request $request, Telefone $telefone): Response
    {
        if ($this->isCsrfTokenValid('delete'.$telefone->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($telefone);
            $entityManager->flush();
        }

        return $this->redirectToRoute('telefone_index', [], Response::HTTP_SEE_OTHER);
    }
}
