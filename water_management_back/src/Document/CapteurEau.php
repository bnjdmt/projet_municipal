<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

#[ODM\Document(collection: 'capteurs_eau')]
class CapteurEau
{
    #[ODM\Id]
    private $id = null;

    #[ODM\Field(type: 'string')]
    private ?string $emplacement = null;

    #[ODM\Field(type: 'string')]
    private ?string $type = null;

    #[ODM\Field(type: 'string')]
    private ?string $etat = null;

    #[ODM\ReferenceMany(targetDocument: EspaceVert::class, cascade: 'persist')]
    private iterable $espaceVertId = [];

    #[ODM\ReferenceOne(targetDocument: Foyer::class, cascade: 'persist')]
    private ?Foyer $foyerId = null;

    public function getId(): ?string
    {
        return $this->id;
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(?string $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    public function getEspaceVertId(): iterable
    {
        return $this->espaceVertId;
    }

    public function setEspaceVertId(iterable $espaceVertId): void
    {
        $this->espaceVertId = $espaceVertId;
    }

    public function getFoyerId(): ?Foyer
    {
        return $this->foyerId;
    }

    public function setFoyerId(?Foyer $foyerId): void
    {
        $this->foyerId = $foyerId;
    }
}
