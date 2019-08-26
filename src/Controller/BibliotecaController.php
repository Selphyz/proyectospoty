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

    /**
     * @Route("/listaCanciones", name="listaCanciones")
     */
    public function listaCanciones()
    {
        $res=[
            [
                'title'=>'Rave Digger',
                'file'=> 'rave_digger',
                'howl'=> null
            ],[
                'title'=> '80s Vibe',
                'file'=> '80s_vibe',
                'howl'=> null
            ],[
                'title'=> 'Running Out',
                'file'=> 'running_out',
                'howl'=> null
            ]
        ];
        return $this->json($res);
    }

    
}
