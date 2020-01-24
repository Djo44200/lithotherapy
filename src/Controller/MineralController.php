<?php

namespace App\Controller;

use App\Entity\Mineral;
use App\Form\MineralType;
use App\Repository\MineralRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/mineral")
 */
class MineralController extends Controller
{
    /**
     * @Route("/", name="mineral_index", methods={"GET"})
     */
    public function index(MineralRepository $mineralRepository): Response
    {
        return $this->render('mineral/index.html.twig', [
            'minerals' => $mineralRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="mineral_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $mineral = new Mineral();
        $form = $this->createForm(MineralType::class, $mineral);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($mineral);
            $entityManager->flush();

            return $this->redirectToRoute('mineral_index');
        }

        return $this->render('mineral/new.html.twig', [
            'mineral' => $mineral,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="mineral_show", methods={"GET"})
     */
    public function show(Mineral $mineral): Response
    {
        return $this->render('mineral/show.html.twig', [
            'mineral' => $mineral,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="mineral_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Mineral $mineral): Response
    {
        $form = $this->createForm(MineralType::class, $mineral);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('mineral_index');
        }

        return $this->render('mineral/edit.html.twig', [
            'mineral' => $mineral,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="mineral_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Mineral $mineral): Response
    {
        if ($this->isCsrfTokenValid('delete'.$mineral->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($mineral);
            $entityManager->flush();
        }

        return $this->redirectToRoute('mineral_index');
    }
}
