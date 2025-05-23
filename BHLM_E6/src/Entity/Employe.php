<?php

namespace App\Entity;

use App\Repository\EmployeRepository;
use App\Repository\TuteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeRepository::class)]
class Employe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $fonction = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $mail = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $tel = null;

    #[ORM\ManyToOne(inversedBy: 'employes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Entreprise $idEntreprise = null;

    /**
     * @var Collection<int, SessionExam>
     */
    #[ORM\ManyToMany(targetEntity: SessionExam::class, mappedBy: 'jury')]
    private Collection $SessionExam;

    public function __construct()
    {
        $this->SessionExam = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getFonction(): ?string
    {
        return $this->fonction;
    }

    public function setFonction(string $fonction): static
    {
        $this->fonction = $fonction;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): static
    {
        $this->tel = $tel;

        return $this;
    }

    public function getIdEntreprise(): ?Entreprise
    {
        return $this->idEntreprise;
    }

    public function setIdEntreprise(?Entreprise $idEntreprise): static
    {
        $this->idEntreprise = $idEntreprise;

        return $this;
    }

    /**
     * @return Collection<int, SessionExam>
     */
    public function getSessionExam(): Collection
    {
        return $this->SessionExam;
    }

    public function addSessionExam(SessionExam $sessionExam): static
    {
        if (!$this->SessionExam->contains($sessionExam)) {
            $this->SessionExam->add($sessionExam);
            $sessionExam->addJury($this);
        }

        return $this;
    }

    public function removeSessionExam(SessionExam $sessionExam): static
    {
        if ($this->SessionExam->removeElement($sessionExam)) {
            $sessionExam->removeJury($this);
        }

        return $this;
    }
}
