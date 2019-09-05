<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Canciones
 *
 * @ORM\Table(name="canciones")
 * @ORM\Entity
 */
class Canciones
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=100, nullable=true)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="album", type="string", length=50, nullable=true)
     */
    private $album;

    /**
     * @var string|null
     *
     * @ORM\Column(name="compositor", type="string", length=50, nullable=true)
     */
    private $compositor;

    /**
     * @var string|null
     *
     * @ORM\Column(name="titulo", type="string", length=50, nullable=true)
     */
    private $titulo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Listas", mappedBy="idCancion")
     */
    private $idLista;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idLista = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getAlbum(): ?string
    {
        return $this->album;
    }

    public function setAlbum(?string $album): self
    {
        $this->album = $album;

        return $this;
    }

    public function getCompositor(): ?string
    {
        return $this->compositor;
    }

    public function setCompositor(?string $compositor): self
    {
        $this->compositor = $compositor;

        return $this;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(?string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * @return Collection|Listas[]
     */
    public function getIdLista(): Collection
    {
        return $this->idLista;
    }

    public function addIdListum(Listas $idListum): self
    {
        if (!$this->idLista->contains($idListum)) {
            $this->idLista[] = $idListum;
            $idListum->addIdCancion($this);
        }

        return $this;
    }

    public function removeIdListum(Listas $idListum): self
    {
        if ($this->idLista->contains($idListum)) {
            $this->idLista->removeElement($idListum);
            $idListum->removeIdCancion($this);
        }

        return $this;
    }

}
