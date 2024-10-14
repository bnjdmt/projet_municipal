<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

#[ODM\Document(collection: 'pieces')]
class Piece
{
    #[ODM\Id]
    private $id = null;

    #[ODM\Field(type: 'string')]
    private ?string $nom = null;

    #[ODM\ReferenceMany(targetDocument: Foyer::class, cascade: 'persist')]
    private iterable $foyerId = [];

    #[ODM\ReferenceMany(targetDocument: ObjetConsommation::class, cascade: 'persist')]
    private iterable $objetConsommationId = [];

    #[ODM\ReferenceMany(targetDocument: CapteurEau::class, cascade: 'persist')]
    private iterable $capteurEauId = [];

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): void
    {
        $this->nom = $nom;
    }

    public function getFoyerId(): iterable
    {
        return $this->foyerId;
    }

    public function setFoyerId(iterable $foyerId): void
    {
        $this->foyerId = $foyerId;
    }

    public function getObjetConsommationId(): iterable
    {
        return $this->objetConsommationId;
    }

    public function setObjetConsommationId(iterable $objetConsommationId): void
    {
        $this->objetConsommationId = $objetConsommationId;
    }

    public function getCapteurEauId(): iterable
    {
        return $this->capteurEauId;
    }

    public function setCapteurEauId(iterable $capteurEauId): void
    {
        $this->capteurEauId = $capteurEauId;
    }
}
