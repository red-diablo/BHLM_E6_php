<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntrepriseRepository::class)]
class Entreprise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 5)]
    private ?string $cp = null;

    #[ORM\Column(length: 100)]
    private ?string $ville = null;

    /**
     * @var Collection<int, Employe>
     */
    #[ORM\OneToMany(targetEntity: Employe::class, mappedBy: 'Id_Entreprise')]
    private Collection $id_tuteur;

    public function __construct()
    {
        $this->id_tuteur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCP(): ?string
    {
        return $this->cp;
    }

    public function setCP(string $cp): static
    {
        $this->cp = $cp;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * @return Collection<int, Employe>
     */
    public function getIdTuteur(): Collection
    {
        return $this->id_tuteur;
    }

    public function addIdTuteur(Employe $idEmploye): static
    {
        if (!$this->id_tuteur->contains($idEmploye)) {
            $this->id_tuteur->add($idEmploye);
            $idEmploye->setIdEntreprise($this);
        }

        return $this;
    }

    public function removeIdTuteur(Employe $idEmploye): static
    {
        if ($this->id_tuteur->removeElement($idEmploye)) {
            // set the owning side to null (unless already changed)
            if ($idEmploye->getIdEntreprise() === $this) {
                $idEmploye->setIdEntreprise(null);
            }
        }

        return $this;
    }
}
