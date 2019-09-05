<?php

namespace App\Controller;

use App\Entity\Listas;
use App\Repository\ListasRepository;
use App\Repository\CancionesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ListasController extends AbstractController
{
    /**
     * @Route("/listaNueva/{nombre}", name="listaNueva")
     */
    public function listaNueva($nombre, EntityManagerInterface $em)
    {
        $user=$this->getUser();

        $objNuevo=new Listas();
        $objNuevo->setNombre($nombre);
        $objNuevo->setIdUsuario($user);

        $em->persist($objNuevo);
        $em->flush();

        return $this->json("ok");
    }

        /**
     * @Route("/borrarLista/{nombre}", name="borrarLista")
     */
    public function borrarLista($nombre, EntityManagerInterface $em)
    {
        // $user=$this->getUser();

        // $objNuevo=new Listas();
        // $objNuevo->setNombre($nombre);
        // $objNuevo->setIdUsuario($user);

        // $em->persist($objNuevo);
        // $em->flush();

        // return $this->json("ok");
        alert("Estamos trabajando en ello, no se ha borrado nada");
    }


    /**
     * @Route("/listaAddCancion/{idCancion}/{idLista}", name="listaAddCancion")
     */
    public function listaAddCancion($idCancion, $idLista, 
            CancionesRepository $repoCan, ListasRepository $repoLista,
            EntityManagerInterface $em)
    {
        $cancion=$repoCan->find($idCancion);
        $lista=$repoLista->find($idLista);

        $lista->addIdCancion($cancion);
        
        $em->persist($lista);
        $em->flush();

        return $this->json("ok");
    }    
}
