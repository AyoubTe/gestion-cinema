<?php

namespace App\Entity;

use App\Repository\FilmRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FilmRepository::class)]
class Film
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 200)]
    private ?string $titre = null;

    #[ORM\Column]
    private ?float $duree = null;

    #[ORM\Column(length: 255)]
    private ?string $realisteur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::BLOB, nullable: true)]
    private $photo;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateSortie = null;

    #[ORM\OneToMany(targetEntity: ProjectionFilm::class, mappedBy: 'film')]
    private Collection $projectionFilm;

    #[ORM\ManyToOne(inversedBy: 'films')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorie $categorie = null;

    public function __construct()
    {
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

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDuree(): ?float
    {
        return $this->duree;
    }

    public function setDuree(float $duree): static
    {
        $this->duree = $duree;

        return $this;
    }

    public function getRealisteur(): ?string
    {
        return $this->realisteur;
    }

    public function setRealisteur(string $realisteur): static
    {
        $this->realisteur = $realisteur;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    public function getDateSortie(): ?\DateTimeInterface
    {
        return $this->dateSortie;
    }

    public function setDateSortie(\DateTimeInterface $dateSortie): static
    {
        $this->dateSortie = $dateSortie;

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
            $projectionFilm->setFilm($this);
        }

        return $this;
    }

    public function removeProjectionFilm(ProjectionFilm $projectionFilm): static
    {
        if ($this->projectionFilm->removeElement($projectionFilm)) {
            // set the owning side to null (unless already changed)
            if ($projectionFilm->getFilm() === $this) {
                $projectionFilm->setFilm(null);
            }
        }

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }
}
