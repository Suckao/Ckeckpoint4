<?php

namespace App\Entity;

use App\Repository\SpectaclesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpectaclesRepository::class)
 */
class Spectacles
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom;

    /**
     * @ORM\Column(type="text")
     */
    private $Description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Dates;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Image;

    /**
     * @ORM\Column(type="integer")
     */
    private $Places;

    /**
     * @ORM\Column(type="integer")
     */
    private $Prix;

    /**
     * @ORM\ManyToMany(targetEntity=Reservations::class, inversedBy="spectacles")
     */
    private $Reservation;

    public function __construct()
    {
        $this->Reservation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getDates(): ?\DateTimeInterface
    {
        return $this->Dates;
    }

    public function setDates(\DateTimeInterface $Dates): self
    {
        $this->Dates = $Dates;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(string $Image): self
    {
        $this->Image = $Image;

        return $this;
    }

    public function getPlaces(): ?int
    {
        return $this->Places;
    }

    public function setPlaces(int $Places): self
    {
        $this->Places = $Places;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->Prix;
    }

    public function setPrix(int $Prix): self
    {
        $this->Prix = $Prix;

        return $this;
    }

    /**
     * @return Collection|Reservations[]
     */
    public function getReservation(): Collection
    {
        return $this->Reservation;
    }

    public function addReservation(Reservations $reservation): self
    {
        if (!$this->Reservation->contains($reservation)) {
            $this->Reservation[] = $reservation;
        }

        return $this;
    }

    public function removeReservation(Reservations $reservation): self
    {
        if ($this->Reservation->contains($reservation)) {
            $this->Reservation->removeElement($reservation);
        }

        return $this;
    }
}
