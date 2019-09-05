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
     * @ORM\Column(name="usuario", type="string", length=256, nullable=true)
     */
    private $usuario;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=256, nullable=true)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="roles", type="string", length=256, nullable=true)
     */
    private $roles;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Listas", mappedBy="usuarios")
     */
    private $lista;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lista = new \Doctrine\Common\Collections\ArrayCollection();
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

    public function getRoles(): ?string
    {
        return $this->roles;
    }

    public function setRoles(?string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @return Collection|Listas[]
     */
    public function getLista(): Collection
    {
        return $this->lista;
    }

    public function addListum(Listas $listum): self
    {
        if (!$this->lista->contains($listum)) {
            $this->lista[] = $listum;
            $listum->addUsuario($this);
        }

        return $this;
    }

    public function removeListum(Listas $listum): self
    {
        if ($this->lista->contains($listum)) {
            $this->lista->removeElement($listum);
            $listum->removeUsuario($this);
        }

        return $this;
    }

}
