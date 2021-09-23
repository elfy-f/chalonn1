<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 */
class Utilisateur implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephone;

    /**
     * @ORM\Column(type="text")
     */
    private $accueil;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nb;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $animaux;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sterilise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $chat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $quarantaine;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $journee;

    /**
     * @ORM\Column(type="text")
     */
    private $vancances;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $non;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $assurance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $veto;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $autre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vacances;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
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

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAccueil(): ?string
    {
        return $this->accueil;
    }

    public function setAccueil(string $accueil): self
    {
        $this->accueil = $accueil;

        return $this;
    }

    public function getNb(): ?string
    {
        return $this->nb;
    }

    public function setNb(string $nb): self
    {
        $this->nb = $nb;

        return $this;
    }

    public function getAnimaux(): ?string
    {
        return $this->animaux;
    }

    public function setAnimaux(string $animaux): self
    {
        $this->animaux = $animaux;

        return $this;
    }

    public function getSterilise(): ?string
    {
        return $this->sterilise;
    }

    public function setSterilise(string $sterilise): self
    {
        $this->sterilise = $sterilise;

        return $this;
    }

    public function getChat(): ?string
    {
        return $this->chat;
    }

    public function setChat(string $chat): self
    {
        $this->chat = $chat;

        return $this;
    }

    public function getQuarantaine(): ?string
    {
        return $this->quarantaine;
    }

    public function setQuarantaine(string $quarantaine): self
    {
        $this->quarantaine = $quarantaine;

        return $this;
    }

    public function getJournee(): ?string
    {
        return $this->journee;
    }

    public function setJournee(string $journee): self
    {
        $this->journee = $journee;

        return $this;
    }

    public function getVancances(): ?string
    {
        return $this->vancances;
    }

    public function setVancances(string $vancances): self
    {
        $this->vancances = $vancances;

        return $this;
    }

    public function getLibre(): ?string
    {
        return $this->libre;
    }

    public function setLibre(string $libre): self
    {
        $this->libre = $libre;

        return $this;
    }

    public function getNon(): ?string
    {
        return $this->non;
    }

    public function setNon(?string $non): self
    {
        $this->non = $non;

        return $this;
    }

    public function getAssurance(): ?string
    {
        return $this->assurance;
    }

    public function setAssurance(?string $assurance): self
    {
        $this->assurance = $assurance;

        return $this;
    }

    public function getVeto(): ?string
    {
        return $this->veto;
    }

    public function setVeto(?string $veto): self
    {
        $this->veto = $veto;

        return $this;
    }

    public function getAutre(): ?string
    {
        return $this->autre;
    }

    public function setAutre(?string $autre): self
    {
        $this->autre = $autre;

        return $this;
    }

    public function getVacances(): ?string
    {
        return $this->vacances;
    }

    public function setVacances(?string $vacances): self
    {
        $this->vacances = $vacances;

        return $this;
    }
}
