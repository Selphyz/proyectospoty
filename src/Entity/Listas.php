<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Listas
 *
 * @ORM\Table(name="listas", indexes={@ORM\Index(name="usuario_lista", columns={"id_usuario"})})
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

    /**
     * @var \Usuarios
     *
     * @ORM\ManyToOne(targetEntity="Usuarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id")
     * })
     */
    private $idUsuario;

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
     * Constructor
     */
    public function __construct()
    {
        $this->idCancion = new \Doctrine\Common\Collections\ArrayCollection();
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

    public function getIdUsuario(): ?Usuarios
    {
        return $this->idUsuario;
    }

    public function setIdUsuario(?Usuarios $idUsuario): self
    {
        $this->idUsuario = $idUsuario;

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

}
