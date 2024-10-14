<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

#[ODM\Document(collection: 'foyers')]
class Foyer
{
    #[ODM\Id]
    private $id = null;

    #[ODM\Field(type: 'string')]
    private ?string $adresse = null;

    #[ODM\Field(type: 'integer')]
    private ?int $consommationTotale = null;

    #[ODM\ReferenceMany(targetDocument: Utilisateur::class, cascade: 'persist')]
    private iterable $utilisateurs = [];

    #[ODM\ReferenceMany(targetDocument: Piece::class, cascade: 'persist')]
    private iterable $pieces = [];

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getConsommationTotale(): ?int
    {
        return $this->consommationTotale;
    }

    public function setConsommationTotale(?int $consommationTotale): static
    {
        $this->consommationTotale = $consommationTotale;

        return $this;
    }

    public function getUtilisateurs(): iterable
    {
        return $this->utilisateurs;
    }

    public function setUtilisateurs(iterable $utilisateurs): void
    {
        $this->utilisateurs = $utilisateurs;
    }

    public function getPieces(): iterable
    {
        return $this->pieces;
    }

    public function setPieces(iterable $pieces): void
    {
        $this->pieces = $pieces;
    }
}
