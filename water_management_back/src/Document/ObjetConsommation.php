<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use MongoDB\Collection;

#[ODM\Document(collection: 'objetConsommations')]
class ObjetConsommation
{
    #[ODM\Id]
    private $id = null;

    #[ODM\Field(type: 'string')]
    private ?string $nom = null;

    #[ODM\Field(type: 'string')]
    private ?string $type = null;

    #[ODM\Field(type: 'integer')]
    private ?int $consommationActuelle = null;

    #[ODM\ReferenceMany(targetDocument: Piece::class, cascade: 'persist')]
    private iterable $pieceId = [];

    #[ODM\ReferenceOne(targetDocument: Recommandation::class, cascade: 'persist', inversedBy: 'objetConsommationId')]
    private Recommandation $recommandation;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getConsommationActuelle(): ?int
    {
        return $this->consommationActuelle;
    }

    public function setConsommationActuelle(?int $consommationActuelle): static
    {
        $this->consommationActuelle = $consommationActuelle;

        return $this;
    }

    public function getPieceId(): iterable
    {
        return $this->pieceId;
    }

    public function setPieceId(iterable $pieceId): void
    {
        $this->pieceId = $pieceId;
    }

    public function getRecommandation(): Recommandation
    {
        return $this->recommandation;
    }

    public function setRecommandation(Recommandation $recommandation): void
    {
        $this->recommandation = $recommandation;
    }
}
