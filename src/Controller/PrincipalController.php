<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PrincipalController extends Controller
{
    /**
     * @Route("/index",name="app_Index")
     */
    public function default()
    {
        if ($this->getUser()){
            // Récupération de l'ID du user en session
            $userId = $this->get('security.token_storage')->getToken()->getUser()->getId();
            return $this->render('principal/principal.html.twig', [
                'user' => $userId
            ]);

        }

        return $this->redirectToRoute('app_login');


    }
}