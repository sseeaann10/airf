<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255)]
    private ?string $Prenom = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $departureDateTime = null;

    #[ORM\Column(length: 255)]
    private ?string $departureCity = null;

    #[ORM\Column(length: 255)]
    private ?string $arrivalCity = null;

    #[ORM\ManyToOne(targetEntity: TicketType::class, inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TicketType $ticketType = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): static
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getDepartureDateTime(): ?\DateTimeInterface
    {
        return $this->departureDateTime;
    }

    public function setDepartureDateTime(\DateTimeInterface $departureDateTime): static
    {
        $this->departureDateTime = $departureDateTime;

        return $this;
    }

    public function getDepartureCity(): ?string
    {
        return $this->departureCity;
    }

    public function setDepartureCity(string $departureCity): static
    {
        $this->departureCity = $departureCity;

        return $this;
    }

    public function getArrivalCity(): ?string
    {
        return $this->arrivalCity;
    }

    public function setArrivalCity(string $arrivalCity): static
    {
        $this->arrivalCity = $arrivalCity;

        return $this;
    }
    public function getTicketType(): ?TicketType
    {
        return $this->ticketType;
    }

    public function setTicketType(?TicketType $ticketType): static
    {
        $this->ticketType = $ticketType;

        return $this;
    }
}
