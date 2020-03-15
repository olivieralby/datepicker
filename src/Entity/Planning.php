<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlanningRepository")
 */
class Planning
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
    private $activity;

    /**
     * @ORM\Column(type="date")
     */
    private $date_debut;

    /**
     * @ORM\Column(type="date")
     */
    private $date_fin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $professeur;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duree;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActivity(): ?string
    {
        return $this->activity;
    }

    public function setActivity(string $activity): self
    {
        $this->activity = $activity;

        return $this;
    }

    public function getDateDebut(): ?\DatetimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DatetimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DatetimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(\DatetimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getProfesseur(): ?string
    {
        return $this->professeur;
    }

    public function setProfesseur(string $professeur): self
    {
        $this->professeur = $professeur;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(?int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }
}
