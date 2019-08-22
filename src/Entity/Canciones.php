<?php

namespace App\Entity;

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
     * @ORM\Column(name="url", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $url = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="album", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $album = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="genero", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $genero = 'NULL';

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

    public function getGenero(): ?string
    {
        return $this->genero;
    }

    public function setGenero(?string $genero): self
    {
        $this->genero = $genero;

        return $this;
    }


}
