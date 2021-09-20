<?php

namespace App\Entity;

use App\Repository\LibreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LibreRepository::class)
 */
class Libre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lieu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $carte;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $histoire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nourrice;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $aide;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nombreChat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(?string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getCarte(): ?string
    {
        return $this->carte;
    }

    public function setCarte(?string $carte): self
    {
        $this->carte = $carte;

        return $this;
    }

    public function getHistoire(): ?string
    {
        return $this->histoire;
    }

    public function setHistoire(?string $histoire): self
    {
        $this->histoire = $histoire;

        return $this;
    }

    public function getNourrice(): ?string
    {
        return $this->nourrice;
    }

    public function setNourrice(?string $nourrice): self
    {
        $this->nourrice = $nourrice;

        return $this;
    }

    public function getAide(): ?bool
    {
        return $this->aide;
    }

    public function setAide(?bool $aide): self
    {
        $this->aide = $aide;

        return $this;
    }

    public function getNombreChat(): ?string
    {
        return $this->nombreChat;
    }

    public function setNombreChat(?string $nombreChat): self
    {
        $this->nombreChat = $nombreChat;

        return $this;
    }
}
