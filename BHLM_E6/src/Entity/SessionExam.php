<?php

namespace App\Entity;

use App\Repository\SessionExamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SessionExamRepository::class)]
class SessionExam
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $specialite = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $mois = null;

    #[ORM\Column(nullable: true)]
    private ?int $annee = null;

    /**
     * @var Collection<int, Employe>
     */
    #[ORM\ManyToMany(targetEntity: Employe::class, inversedBy: 'SessionExam')]
    private Collection $jury;

    public function __construct()
    {
        $this->jury = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(?string $specialite): static
    {
        $this->specialite = $specialite;

        return $this;
    }

    public function getMois(): ?string
    {
        return $this->mois;
    }

    public function setMois(?string $mois): static
    {
        $this->mois = $mois;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(?int $annee): static
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * @return Collection<int, Employe>
     */
    public function getJury(): Collection
    {
        return $this->jury;
    }

    public function addJury(Employe $jury): static
    {
        if (!$this->jury->contains($jury)) {
            $this->jury->add($jury);
        }

        return $this;
    }

    public function removeJury(Employe $jury): static
    {
        $this->jury->removeElement($jury);

        return $this;
    }
}
