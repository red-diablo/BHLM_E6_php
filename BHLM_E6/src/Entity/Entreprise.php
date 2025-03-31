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
    #[ORM\OneToMany(targetEntity: Employe::class, mappedBy: 'idEntreprise')]
    private Collection $employes;

    /**
     * @var Collection<int, Etudiant>
     */
    #[ORM\ManyToMany(targetEntity: Etudiant::class, mappedBy: 'entreprises')]
    private Collection $etudiants;

    #[ORM\ManyToOne(inversedBy: 'entreprises')]
    private ?SecteurActivite $SecteurActivite = null;

    public function __construct()
    {
        $this->employes = new ArrayCollection();
        $this->etudiants = new ArrayCollection();
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
    public function getEmployes(): Collection
    {
        return $this->employes;
    }

    public function addEmployes(Employe $idEmploye): static
    {
        if (!$this->employes->contains($idEmploye)) {
            $this->employes->add($idEmploye);
            $idEmploye->setidEntreprise($this);
        }

        return $this;
    }

    public function removeEmployes(Employe $idEmploye): static
    {
        if ($this->employes->removeElement($idEmploye)) {
            // set the owning side to null (unless already changed)
            if ($idEmploye->getidEntreprise() === $this) {
                $idEmploye->setidEntreprise(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Etudiant>
     */
    public function getEtudiants(): Collection
    {
        return $this->etudiants;
    }

    public function addEtudiant(Etudiant $etudiant): static
    {
        if (!$this->etudiants->contains($etudiant)) {
            $this->etudiants->add($etudiant);
            $etudiant->addEntreprise($this);
        }

        return $this;
    }

    public function removeEtudiant(Etudiant $etudiant): static
    {
        if ($this->etudiants->removeElement($etudiant)) {
            $etudiant->removeEntreprise($this);
        }

        return $this;
    }

    public function getSecteurActivite(): ?SecteurActivite
    {
        return $this->SecteurActivite;
    }

    public function setSecteurActivite(?SecteurActivite $SecteurActivite): static
    {
        $this->SecteurActivite = $SecteurActivite;

        return $this;
    }
}
