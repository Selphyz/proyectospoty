<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Listas
 *
 * @ORM\Table(name="listas")
 * @ORM\Entity
 */
class Listas
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_lista", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLista;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=25, nullable=true, options={"default"="NULL"})
     */
    private $nombre = 'NULL';

    public function getIdLista(): ?int
    {
        return $this->idLista;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }


}
