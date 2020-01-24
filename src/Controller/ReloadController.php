<?php

namespace App\Controller;

use App\Entity\Reload;
use App\Form\ReloadType;
use App\Repository\ReloadRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/reload")
 */
class ReloadController extends Controller
{
    /**
     * @Route("/", name="reload_index", methods={"GET"})
     */
    public function index(ReloadRepository $reloadRepository): Response
    {
        return $this->render('reload/index.html.twig', [
            'reloads' => $reloadRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="reload_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $reload = new Reload();
        $form = $this->createForm(ReloadType::class, $reload);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reload);
            $entityManager->flush();

            return $this->redirectToRoute('reload_index');
        }

        return $this->render('reload/new.html.twig', [
            'reload' => $reload,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reload_show", methods={"GET"})
     */
    public function show(Reload $reload): Response
    {
        return $this->render('reload/show.html.twig', [
            'reload' => $reload,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="reload_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Reload $reload): Response
    {
        $form = $this->createForm(ReloadType::class, $reload);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reload_index');
        }

        return $this->render('reload/edit.html.twig', [
            'reload' => $reload,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reload_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Reload $reload): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reload->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($reload);
            $entityManager->flush();
        }

        return $this->redirectToRoute('reload_index');
    }
}
