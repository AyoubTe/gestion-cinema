<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client extends Personne
{
    #[ORM\Column]
    private ?int $noClient = null;

    #[ORM\Column]
    private ?bool $abonne = null;

    #[ORM\OneToMany(targetEntity: Ticket::class, mappedBy: 'client')]
    private Collection $tickets;

    public function __construct()
    {
        $this->tickets = new ArrayCollection();
    }

    public function getNoClient(): ?int
    {
        return $this->noClient;
    }

    public function setNoClient(int $noClient): static
    {
        $this->noClient = $noClient;

        return $this;
    }

    public function isAbonne(): ?bool
    {
        return $this->abonne;
    }

    public function setAbonne(bool $abonne): static
    {
        $this->abonne = $abonne;

        return $this;
    }

    /**
     * @return Collection<int, Ticket>
     */
    public function getTickets(): Collection
    {
        return $this->tickets;
    }

    public function addTicket(Ticket $ticket): static
    {
        if (!$this->tickets->contains($ticket)) {
            $this->tickets->add($ticket);
            $ticket->setClient($this);
        }

        return $this;
    }

    public function removeTicket(Ticket $ticket): static
    {
        if ($this->tickets->removeElement($ticket)) {
            // set the owning side to null (unless already changed)
            if ($ticket->getClient() === $this) {
                $ticket->setClient(null);
            }
        }

        return $this;
    }
}
