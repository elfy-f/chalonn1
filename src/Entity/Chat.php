<?php

namespace App\Entity;

use App\Repository\ChatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ChatRepository::class)
 * @Vich\Uploadable
 */
class Chat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sexe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $race;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pelage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sterelise;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $testFiv;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $testFelv;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $histoire;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $caractere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contact;

    /**
     * @ORM\Column(type="decimal", precision=3, scale=0, nullable=true)
     */
    private $frais;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $file;

    /**
     * @Vich\UploadableField(mapping="chat_images", fileNameProperty="file")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;


    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="chats")
     */
    private $user;

    /**
     * @ORM\ManyToMany(targetEntity=categorie::class, inversedBy="chats")
     */
    private $categorie;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="chat")
     */
    private $commentaires;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $miseenavant;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $reserve;

    public function __construct()
    {
        $this->categorie = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(?string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getRace(): ?string
    {
        return $this->race;
    }

    public function setRace(?string $race): self
    {
        $this->race = $race;

        return $this;
    }

    public function getPelage(): ?string
    {
        return $this->pelage;
    }

    public function setPelage(?string $pelage): self
    {
        $this->pelage = $pelage;

        return $this;
    }

    public function getSterelise(): ?string
    {
        return $this->sterelise;
    }

    public function setSterelise(?string $sterelise): self
    {
        $this->sterelise = $sterelise;

        return $this;
    }

    public function getTestFiv(): ?string
    {
        return $this->testFiv;
    }

    public function setTestFiv(?string $testFiv): self
    {
        $this->testFiv = $testFiv;

        return $this;
    }

    public function getTestFelv(): ?string
    {
        return $this->testFelv;
    }

    public function setTestFelv(?string $testFelv): self
    {
        $this->testFelv = $testFelv;

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

    public function getCaractere(): ?string
    {
        return $this->caractere;
    }

    public function setCaractere(?string $caractere): self
    {
        $this->caractere = $caractere;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(?string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getFrais(): ?string
    {
        return $this->frais;
    }

    public function setFrais(?string $frais): self
    {
        $this->frais = $frais;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFile(): ?string
    {
        return $this->file;
    }

    /**
     * @param string|null $file
     * @return $this
     */
    public function setFile(?string $file): self
    {
        $this->file = $file;

        return $this;
    }


    /**
     * @param File|null $file
     */
    public function setImageFile(File $imagefile = null)
    {


        //Very important:
        //It is required that as least on field changes if yoi are using Doctrine,
        //other the event listeners won't be called and the file is lost
        if ($imagefile) {
            //if 'updateAt' is not defined in your entity, use another property
            $this->createdAt = new \DateTime('now');
            $this->imageFile=$imagefile;
        }
    }

    /**
     * @return File|null
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }


    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|categorie[]
     */
    public function getCategorie(): Collection
    {
        return $this->categorie;
    }

    public function addCategorie(categorie $categorie): self
    {
        if (!$this->categorie->contains($categorie)) {
            $this->categorie[] = $categorie;
        }

        return $this;
    }

    public function removeCategorie(categorie $categorie): self
    {
        $this->categorie->removeElement($categorie);

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setChat($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getChat() === $this) {
                $commentaire->setChat(null);
            }
        }

        return $this;
    }

    public function getMiseenavant(): ?bool
    {
        return $this->miseenavant;
    }

    public function setMiseenavant(?bool $miseenavant): self
    {
        $this->miseenavant = $miseenavant;

        return $this;
    }

    public function getReserve(): ?bool
    {
        return $this->reserve;
    }

    public function setReserve(?bool $reserve): self
    {
        $this->reserve = $reserve;

        return $this;
    }
}
