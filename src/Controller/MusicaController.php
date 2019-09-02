<?php

namespace App\Controller;

use App\Entity\Canciones;
use App\Repository\CancionesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MusicaController extends AbstractController
{
    /**
     * @Route("/musica", name="musica")
     */
    public function index()
    {
        $repo=$this->getDoctrine()->getRepository(Canciones::class);
        $canciones=$repo->colaCanciones();
        $listaReproduccion=array();
        $user=$this->getUser();
        if ($user){
            $listaReproduccion=$repo->listaCanciones(); //Llamada
        }
        return $this->render('musica/index.html.twig', [
            'controller_name' => 'MusicaController',
            'canciones'=>$canciones,
            'listaReproduccion'=>$listaReproduccion
        ]);
    }

    /**
     * @Route("/musicaBuscar", name="musicaBuscar")
     */
    public function musicaBuscar(Request $request, CancionesRepository $repo)
    {
        $texto=$request->query->get('texto');
        if (strlen($texto)>0){
            $canciones= $repo->buscarCanciones($texto);
        }else{
            $canciones=array();
        }
        
        return $this->render("musica/_resultados.html.twig", [
            "canciones"=>$canciones,
        ]);      


    }




}
