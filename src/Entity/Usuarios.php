<?php

namespace App\Entity;

use App\Entity\Canciones;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * Usuarios
 *
 * @ORM\Table(name="usuarios")
 * @ORM\Entity(repositoryClass="App\Repository\UsuariosRepository")
 * @UniqueEntity(fields={"username"}, message="There is already an account with this username")
 */
class Usuarios implements UserInterface
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
     * @ORM\Column(name="username", type="string", length=70, nullable=true, options={"default"="NULL"})
     */
    private $username = 'NULL';

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

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

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

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
    public function getSalt(){

    }
    public function eraseCredentials(){
        
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
