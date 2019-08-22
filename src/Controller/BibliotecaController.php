<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BibliotecaController extends AbstractController
{
    /**
     * @Route("/biblioteca", name="biblioteca")
     */
    public function index()
    {
        return $this->render('biblioteca/index.html.twig', [
            'controller_name' => 'BibliotecaController',
        ]);
    }
}
