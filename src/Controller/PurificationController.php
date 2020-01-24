<?php

namespace App\Controller;

use App\Entity\Purification;
use App\Form\PurificationType;
use App\Repository\PurificationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/purification")
 */
class PurificationController extends Controller
{
    /**
     * @Route("/", name="purification_index", methods={"GET"})
     */
    public function index(PurificationRepository $purificationRepository): Response
    {
        return $this->render('purification/index.html.twig', [
            'purifications' => $purificationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="purification_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $purification = new Purification();
        $form = $this->createForm(PurificationType::class, $purification);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($purification);
            $entityManager->flush();

            return $this->redirectToRoute('purification_index');
        }

        return $this->render('purification/new.html.twig', [
            'purification' => $purification,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="purification_show", methods={"GET"})
     */
    public function show(Purification $purification): Response
    {
        return $this->render('purification/show.html.twig', [
            'purification' => $purification,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="purification_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Purification $purification): Response
    {
        $form = $this->createForm(PurificationType::class, $purification);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('purification_index');
        }

        return $this->render('purification/edit.html.twig', [
            'purification' => $purification,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="purification_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Purification $purification): Response
    {
        if ($this->isCsrfTokenValid('delete'.$purification->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($purification);
            $entityManager->flush();
        }

        return $this->redirectToRoute('purification_index');
    }
}
