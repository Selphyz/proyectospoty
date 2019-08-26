<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Usuarios
 *
 * @ORM\Table(name="usuarios")
 * @ORM\Entity
 */
class Usuarios
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
     * @ORM\Column(name="usuario", type="string", length=70, nullable=true, options={"default"="NULL"})
     */
    private $usuario = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=70, nullable=true, options={"default"="NULL"})
     */
    private $password = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="rol", type="string", length=70, nullable=true, options={"default"="NULL"})
     */
    private $rol = 'NULL';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Canciones", mappedBy="usuario")
     */
    private $cancion;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cancion = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsuario(): ?string
    {
        return $this->usuario;
    }

    public function setUsuario(?string $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRol(): ?string
    {
        return $this->rol;
    }

    public function setRol(?string $rol): self
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * @return Collection|Canciones[]
     */
    public function getCancion(): Collection
    {
        return $this->cancion;
    }

    public function addCancion(Canciones $cancion): self
    {
        if (!$this->cancion->contains($cancion)) {
            $this->cancion[] = $cancion;
            $cancion->addUsuario($this);
        }

        return $this;
    }

    public function removeCancion(Canciones $cancion): self
    {
        if ($this->cancion->contains($cancion)) {
            $this->cancion->removeElement($cancion);
            $cancion->removeUsuario($this);
        }

        return $this;
    }

}
