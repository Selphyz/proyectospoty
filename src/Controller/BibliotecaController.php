<?php

namespace App\Controller;

use App\Entity\Listas;
use App\Entity\Usuarios;
use App\Entity\Canciones;
use Doctrine\ORM\EntityManagerInterface;
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

    /**
    * @Route("/addCancion/{id}/{idLista}", name="addCancion")
    */
    public function addCancion(Canciones $cancion, int $idLista, EntityManagerInterface $em){

        //$user=$this->getUser();
        //$user=$em->getReference(Usuarios::class, 1);
        $lista=$em->getReference(Listas::class, $idLista);

        //$user->addCancion($cancion);
        $lista->addIdCancion($cancion);

        //$em->persist($user);
        $em->persist($lista);
        $em->flush();

        $this->redirectToRoute("verLista");
/*
        $repo=$this->getDoctrine()->getRepository(Canciones::class);
        $canciones=$repo->leerCanciones();

        return $this->render('biblioteca/index.html.twig',[
            'canciones'=>$canciones,
        ]);    */
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
