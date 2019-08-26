<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MusicaController extends AbstractController
{
    /**
     * @Route("/musica", name="musica")
     */
    public function index()
    {
        return $this->render('musica/index.html.twig', [
            'controller_name' => 'MusicaController',
        ]);
    }
}
