<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Listas
 *
 * @ORM\Table(name="listas")
 * @ORM\Entity(repositoryClass="App\Repository\ListasRepository")
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

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Canciones", inversedBy="idLista")
     * @ORM\JoinTable(name="listas_canciones",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_lista", referencedColumnName="id_lista")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_cancion", referencedColumnName="id")
     *   }
     * )
     */
    private $idCancion;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Usuarios", inversedBy="lista")
     * @ORM\JoinTable(name="listas_usuarios",
     *   joinColumns={
     *     @ORM\JoinColumn(name="lista_id", referencedColumnName="id_lista")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     *   }
     * )
     */
    private $usuario;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idCancion = new \Doctrine\Common\Collections\ArrayCollection();
        $this->usuario = new \Doctrine\Common\Collections\ArrayCollection();
    }

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

    /**
     * @return Collection|Canciones[]
     */
    public function getIdCancion(): Collection
    {
        return $this->idCancion;
    }

    public function addIdCancion(Canciones $idCancion): self
    {
        if (!$this->idCancion->contains($idCancion)) {
            $this->idCancion[] = $idCancion;
        }

        return $this;
    }

    public function removeIdCancion(Canciones $idCancion): self
    {
        if ($this->idCancion->contains($idCancion)) {
            $this->idCancion->removeElement($idCancion);
        }

        return $this;
    }

    /**
     * @return Collection|Usuarios[]
     */
    public function getUsuario(): Collection
    {
        return $this->usuario;
    }

    public function addUsuario(Usuarios $usuario): self
    {
        if (!$this->usuario->contains($usuario)) {
            $this->usuario[] = $usuario;
        }

        return $this;
    }

    public function removeUsuario(Usuarios $usuario): self
    {
        if ($this->usuario->contains($usuario)) {
            $this->usuario->removeElement($usuario);
        }

        return $this;
    }

}
