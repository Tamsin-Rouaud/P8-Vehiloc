<?php

namespace App\Entity;

use App\Enum\BoiteVitesseStatus;
use App\Repository\VoitureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: VoitureRepository::class)]
class Voiture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank()]
    #[Assert\Length(min:4)]
    #[ORM\Column(length: 255)]
    private ?string $nomVoiture = null;

    #[Assert\NotBlank()]
    #[Assert\Length(min:15)]
    #[ORM\Column]
    private ?string $description = null;

    #[Assert\Type('float')]
    #[Assert\NotBlank()]
    #[Assert\Positive()]
    #[ORM\Column]
    private ?float $prixMensuel = null;

    #[Assert\Type('float')]
    #[Assert\NotBlank()]
    #[Assert\Positive()]
    #[ORM\Column]
    private ?float $prixJournalier = null;

    #[Assert\NotBlank()]
    #[Assert\Range(min:1, max:9)]
    #[ORM\Column]
    private ?int $nombrePlaces = null;

    #[Assert\Type(BoiteVitesseStatus::class)]
    #[Assert\NotBlank()]
    #[ORM\Column(length: 255)]
    private ?BoiteVitesseStatus $status = null;

    #[Assert\NotBlank()]
    #[ORM\Column(length: 255)]
    private ?string $nombreKm = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomVoiture(): ?string
    {
        return $this->nomVoiture;
    }

    public function setNomVoiture(string $nomVoiture): static
    {
        $this->nomVoiture = $nomVoiture;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrixMensuel(): ?float
    {
        return $this->prixMensuel;
    }

    public function setPrixMensuel(float $prixMensuel): static
    {
        $this->prixMensuel = $prixMensuel;

        return $this;
    }

    public function getPrixJournalier(): ?float
    {
        return $this->prixJournalier;
    }

    public function setPrixJournalier(float $prixJournalier): static
    {
        $this->prixJournalier = $prixJournalier;

        return $this;
    }

    public function getNombrePlaces(): ?int
    {
        return $this->nombrePlaces;
    }

    public function setNombrePlaces(int $nombrePlaces): static
    {
        $this->nombrePlaces = $nombrePlaces;

        return $this;
    }

    public function getStatus(): ?BoiteVitesseStatus
    {
        return $this->status;
    }

    public function setStatus(BoiteVitesseStatus $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getNombreKm(): ?string
    {
        return $this->nombreKm;
    }

    public function setNombreKm(string $nombreKm): static
    {
        $this->nombreKm = $nombreKm;

        return $this;
    }

}
