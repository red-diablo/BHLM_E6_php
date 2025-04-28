<?php

namespace App\Entity;

use App\Repository\ProfilRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfilRepository::class)]
class Profil
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $formation = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $optionFormation = null;

    /**
     * @var Collection<int, Entreprise>
     */
    #[ORM\ManyToMany(targetEntity: Entreprise::class, inversedBy: 'profils')]
    private Collection $profils;

    public function __construct()
    {
        $this->profils = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormation(): ?string
    {
        return $this->formation;
    }

    public function setFormation(?string $formation): static
    {
        $this->formation = $formation;

        return $this;
    }

    public function getOptionFormation(): ?string
    {
        return $this->optionFormation;
    }

    public function setOptionFormation(?string $optionFormation): static
    {
        $this->optionFormation = $optionFormation;

        return $this;
    }

    /**
     * @return Collection<int, Entreprise>
     */
    public function getProfils(): Collection
    {
        return $this->profils;
    }

    public function addProfil(Entreprise $profil): static
    {
        if (!$this->profils->contains($profil)) {
            $this->profils->add($profil);
        }

        return $this;
    }

    public function removeProfil(Entreprise $profil): static
    {
        $this->profils->removeElement($profil);

        return $this;
    }
}
