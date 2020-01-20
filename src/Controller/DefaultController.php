<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function default()
    {
        if ($this->getUser()){
            return $this->render('security/login.html.twig');

        }

        return $this->redirectToRoute('app_login');


    }
}