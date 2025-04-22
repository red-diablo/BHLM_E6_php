<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur implements PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(length: 20)]
    private ?string $prenom = null;

    #[ORM\Column(length: 20)]
    private ?string $login = null;

    #[ORM\Column(length: 255)]
    private ?string $mdp = null;

    #[ORM\Column]
    private ?int $administrateur = 0;

    #[ORM\Column]
    private ?int $personnel = 1;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }
    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }
    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): static
    {
        $this->login = $login;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): static
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getAdministrateur(): ?int
    {
        return $this->administrateur;
    }

    public function setAdministrateur(int $administrateur): static
    {
        $this->administrateur = $administrateur;

        return $this;
    }

    public function getPersonnel(): ?int
    {
        return $this->personnel;
    }

    public function setPersonnel(int $personnel): static
    {
        $this->personnel = $personnel;

        return $this;
    }
    public function getPassword(): string
    {
        return $this->mdp;
    }
}
