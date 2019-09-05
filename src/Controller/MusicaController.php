<?php

namespace App\Controller;

use App\Entity\Listas;
use App\Entity\Canciones;
use App\Repository\CancionesRepository;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MusicaController extends AbstractController
{
    /**
     * @Route("/musica", name="musica")
     */
    public function index(CancionesRepository $repo)
    {
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


    /**
     * @Route("/jsonListaMusica", name="jsonListaMusica")
     */
    public function jsonListaMusica(Request $request)
    {

        /*$search=c
        $column=
        $order=asc*/
        $search=$request->query->get('search');
        $offset=$request->query->get('offset');
        $limit=$request->query->get('limit');

        $repo=$this->getDoctrine()->getRepository(Canciones::class);
        $canciones=$repo->colaCancionesTabla($offset, $limit, $search);
        $totalCanciones=$repo->totalCancionesTabla($search);

        $res=[
            'total'=>$totalCanciones,
            'rows'=>$canciones
        ];

        // Tip : Inject SerializerInterface $serializer in the controller method
        // and avoid these 3 lines of instanciation/configuration
        $encoders = [new JsonEncoder()]; // If no need for XmlEncoder
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

        // Serialize your object in Json
        $jsonObject = $serializer->serialize($res, 'json', [
            'circular_reference_handler' => function ($object) {
                return $object->getId();
            }
        ]);

        // For instance, return a Response with encoded Json
        return new Response($jsonObject, 200, ['Content-Type' => 'application/json']);
    }
    
    /**
     * @Route("/jsonListas", name="jsonListas")
     */
    public function jsonListas()
    {

        /*$search=c
        $column=
        $order=asc
        $search=$request->query->get('search');
        $offset=$request->query->get('offset');
        $limit=$request->query->get('limit');
        */

        $repo=$this->getDoctrine()->getRepository(Listas::class);
        $listas=$repo->listas();
        
        $res=[
            'rows'=>$listas
        ];

        // Tip : Inject SerializerInterface $serializer in the controller method
        // and avoid these 3 lines of instanciation/configuration
        $encoders = [new JsonEncoder()]; // If no need for XmlEncoder
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

        // Serialize your object in Json
        $jsonObject = $serializer->serialize($res, 'json', [
            'circular_reference_handler' => function ($object) {
                return $object->getId();
            }
        ]);

        // For instance, return a Response with encoded Json
        return new Response($jsonObject, 200, ['Content-Type' => 'application/json']);
    }



}
