<?php

namespace App\Controller;

use App\Entity\Hardness;
use App\Form\HardnessType;
use App\Repository\HardnessRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/hardness")
 */
class HardnessController extends Controller
{
    /**
     * @Route("/", name="hardness_index", methods={"GET"})
     */
    public function index(HardnessRepository $hardnessRepository): Response
    {
        return $this->render('hardness/index.html.twig', [
            'hardnesses' => $hardnessRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="hardness_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $hardness = new Hardness();
        $form = $this->createForm(HardnessType::class, $hardness);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($hardness);
            $entityManager->flush();

            return $this->redirectToRoute('hardness_index');
        }

        return $this->render('hardness/new.html.twig', [
            'hardness' => $hardness,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="hardness_show", methods={"GET"})
     */
    public function show(Hardness $hardness): Response
    {
        return $this->render('hardness/show.html.twig', [
            'hardness' => $hardness,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="hardness_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Hardness $hardness): Response
    {
        $form = $this->createForm(HardnessType::class, $hardness);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('hardness_index');
        }

        return $this->render('hardness/edit.html.twig', [
            'hardness' => $hardness,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="hardness_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Hardness $hardness): Response
    {
        if ($this->isCsrfTokenValid('delete'.$hardness->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($hardness);
            $entityManager->flush();
        }

        return $this->redirectToRoute('hardness_index');
    }
}
