<?php

namespace App\Controller;

use App\Entity\Canciones;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BibliotecaController extends AbstractController
{
    /**
    * @Route("/biblioteca", name="listar")
    */
    public function listar(){

        $repo=$this->getDoctrine()->getRepository(Canciones::class);
        $canciones=$repo->leerCanciones();

        return $this->render('biblioteca/index.html.twig',[
            'canciones'=>$canciones,
        ]);    
    }
}
