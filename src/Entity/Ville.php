<?php

namespace App\Entity;

use App\Repository\VilleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VilleRepository::class)]
class Ville
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 200)]
    private ?string $nom = null;

    #[ORM\OneToMany(targetEntity: Cinema::class, mappedBy: 'ville')]
    private Collection $cinemas;

    public function __construct()
    {
        $this->cinemas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(string $id): static
    {
        $this->id = $id;

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

    /**
     * @return Collection<int, Cinema>
     */
    public function getCinemas(): Collection
    {
        return $this->cinemas;
    }

    public function addCinema(Cinema $cinema): static
    {
        if (!$this->cinemas->contains($cinema)) {
            $this->cinemas->add($cinema);
            $cinema->setVille($this);
        }

        return $this;
    }

    public function removeCinema(Cinema $cinema): static
    {
        if ($this->cinemas->removeElement($cinema)) {
            // set the owning side to null (unless already changed)
            if ($cinema->getVille() === $this) {
                $cinema->setVille(null);
            }
        }

        return $this;
    }
}
