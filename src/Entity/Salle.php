<?php

namespace App\Entity;

use App\Repository\SalleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SalleRepository::class)]
class Salle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $nbPlaces = null;

    #[ORM\ManyToOne(inversedBy: 'salles')]
    private ?Cinema $cinema = null;

    #[ORM\OneToMany(targetEntity: Place::class, mappedBy: 'salle')]
    private Collection $places;

    #[ORM\ManyToMany(targetEntity: Employee::class, inversedBy: 'salles')]
    private Collection $employees;

    #[ORM\OneToMany(targetEntity: ProjectionFilm::class, mappedBy: 'salle')]
    private Collection $projectionFilm;

    public function __construct()
    {
        $this->places = new ArrayCollection();
        $this->employees = new ArrayCollection();
        $this->projectionFilm = new ArrayCollection();
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

    public function getNbPlaces(): ?int
    {
        return $this->nbPlaces;
    }

    public function setNbPlaces(int $nbPlaces): static
    {
        $this->nbPlaces = $nbPlaces;

        return $this;
    }

    public function getCinema(): ?Cinema
    {
        return $this->cinema;
    }

    public function setCinema(?Cinema $cinema): static
    {
        $this->cinema = $cinema;

        return $this;
    }

    /**
     * @return Collection<int, Place>
     */
    public function getPlaces(): Collection
    {
        return $this->places;
    }

    public function addPlace(Place $place): static
    {
        if (!$this->places->contains($place)) {
            $this->places->add($place);
            $place->setSalle($this);
        }

        return $this;
    }

    public function removePlace(Place $place): static
    {
        if ($this->places->removeElement($place)) {
            // set the owning side to null (unless already changed)
            if ($place->getSalle() === $this) {
                $place->setSalle(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Employee>
     */
    public function getEmployees(): Collection
    {
        return $this->employees;
    }

    public function addEmployee(Employee $employee): static
    {
        if (!$this->employees->contains($employee)) {
            $this->employees->add($employee);
        }

        return $this;
    }

    public function removeEmployee(Employee $employee): static
    {
        $this->employees->removeElement($employee);

        return $this;
    }

    /**
     * @return Collection<int, ProjectionFilm>
     */
    public function getProjectionFilm(): Collection
    {
        return $this->projectionFilm;
    }

    public function addProjectionFilm(ProjectionFilm $projectionFilm): static
    {
        if (!$this->projectionFilm->contains($projectionFilm)) {
            $this->projectionFilm->add($projectionFilm);
            $projectionFilm->setSalle($this);
        }

        return $this;
    }

    public function removeProjectionFilm(ProjectionFilm $projectionFilm): static
    {
        if ($this->projectionFilm->removeElement($projectionFilm)) {
            // set the owning side to null (unless already changed)
            if ($projectionFilm->getSalle() === $this) {
                $projectionFilm->setSalle(null);
            }
        }

        return $this;
    }
}
