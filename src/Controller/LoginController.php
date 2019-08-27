<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{

    /**
     * @Route("/loginOk", name="loginOk")
     */
    public function loginOk()
    {
        return $this->render('login/loginOk.html.twig', [
            'controller_name' => 'LoginController',
        ]);
    }

    /**
     * @Route("/login", name="login")
     */
    public function index()
    {
        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController',
        ]);
    }
}
