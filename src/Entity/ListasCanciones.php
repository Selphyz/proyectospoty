<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListasCanciones
 *
 * @ORM\Table(name="listas_canciones")
 * @ORM\Entity
 */
class ListasCanciones
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_lista", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idLista;

    /**
     * @var int
     *
     * @ORM\Column(name="id_cancion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idCancion;

    public function getIdLista(): ?int
    {
        return $this->idLista;
    }

    public function getIdCancion(): ?int
    {
        return $this->idCancion;
    }


}
