<?php

namespace App\Controller;

use App\Entity\Chakra;
use App\Form\ChakraType;
use App\Repository\ChakraRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/chakra")
 */
class ChakraController extends Controller
{
    /**
     * @Route("/", name="chakra_index", methods={"GET"})
     */
    public function index(ChakraRepository $chakraRepository): Response
    {
        return $this->render('chakra/index.html.twig', [
            'chakras' => $chakraRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="chakra_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $chakra = new Chakra();
        $form = $this->createForm(ChakraType::class, $chakra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($chakra);
            $entityManager->flush();

            return $this->redirectToRoute('chakra_index');
        }

        return $this->render('chakra/new.html.twig', [
            'chakra' => $chakra,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="chakra_show", methods={"GET"})
     */
    public function show(Chakra $chakra): Response
    {
        return $this->render('chakra/show.html.twig', [
            'chakra' => $chakra,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="chakra_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Chakra $chakra): Response
    {
        $form = $this->createForm(ChakraType::class, $chakra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('chakra_index');
        }

        return $this->render('chakra/edit.html.twig', [
            'chakra' => $chakra,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="chakra_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Chakra $chakra): Response
    {
        if ($this->isCsrfTokenValid('delete'.$chakra->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($chakra);
            $entityManager->flush();
        }

        return $this->redirectToRoute('chakra_index');
    }
}
