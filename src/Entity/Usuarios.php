<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * Usuarios
 *
 * @ORM\Table(name="usuarios")
 * @ORM\Entity
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


}
