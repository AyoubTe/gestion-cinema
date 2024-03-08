<?php

namespace App\Entity;

use App\Repository\SeanceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SeanceRepository::class)]
class Seance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $heureDebut = null;

    #[ORM\OneToOne(mappedBy: 'seance', cascade: ['persist', 'remove'])]
    private ?ProjectionFilm $projectionFilm = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(string $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(\DateTimeInterface $heureDebut): static
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    public function getProjectionFilm(): ?ProjectionFilm
    {
        return $this->projectionFilm;
    }

    public function setProjectionFilm(ProjectionFilm $projectionFilm): static
    {
        // set the owning side of the relation if necessary
        if ($projectionFilm->getSeance() !== $this) {
            $projectionFilm->setSeance($this);
        }

        $this->projectionFilm = $projectionFilm;

        return $this;
    }
}
