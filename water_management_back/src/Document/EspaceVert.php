<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use MongoDB\Collection;

#[ODM\Document(collection: 'espace_verts')]
class EspaceVert
{
    #[ODM\Id]
    private $id = null;

    #[ODM\Field(type: 'string')]
    private ?string $nom = null;

    #[ODM\Field(type: 'string')]
    private ?string $emplacement = null;

    #[ODM\Field(type: 'boolean')]
    private ?bool $arrosageAutomatique = null;

    #[ODM\Field(type: 'collection')]
    private array $creneauxArrosage = [];

    #[ODM\Field(type: 'boolean')]
    private ?bool $annulationSiPluie = null;

    public function getId(): ?string
    {
        return $this->id;
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

    public function getEmplacement(): ?string
    {
        return $this->emplacement;
    }

    public function setEmplacement(?string $emplacement): static
    {
        $this->emplacement = $emplacement;

        return $this;
    }

    public function isArrosageAutomatique(): ?bool
    {
        return $this->arrosageAutomatique;
    }

    public function setArrosageAutomatique(bool $arrosageAutomatique): static
    {
        $this->arrosageAutomatique = $arrosageAutomatique;

        return $this;
    }

    public function getCreneauxArrosage(): array
    {
        return $this->creneauxArrosage;
    }

    public function setCreneauxArrosage(array $creneauxArrosage): static
    {
        $this->creneauxArrosage = $creneauxArrosage;

        return $this;
    }

    public function isAnnulationSiPluie(): ?bool
    {
        return $this->annulationSiPluie;
    }

    public function setAnnulationSiPluie(bool $annulationSiPluie): static
    {
        $this->annulationSiPluie = $annulationSiPluie;

        return $this;
    }
}
