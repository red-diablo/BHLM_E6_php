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

    #[ORM\Column(length: 20)]
    private ?string $login = null;

    #[ORM\Column(length: 255)]
    private ?string $mdp = null;

    #[ORM\Column]
    private ?int $administrateur = null;

    #[ORM\Column]
    private ?int $personnel = null;

    public function getId(): ?int
    {
        return $this->id;
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
