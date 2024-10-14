<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use MongoDB\Collection;

#[ODM\Document(collection: 'recommandations')]
class Recommandation
{
    #[ODM\Id]
    private $id = null;

    #[ODM\Field(type: 'string')]
    private ?string $texteRecommandation = null;

    #[ODM\ReferenceMany(targetDocument: ObjetConsommation::class, cascade: 'persist')]
    private ?iterable $objetConsommationId = [];

    #[ODM\ReferenceMany(targetDocument: Utilisateur::class, cascade: 'persist')]
    private ?iterable $userId = [];

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getTexteRecommandation(): ?string
    {
        return $this->texteRecommandation;
    }

    public function setTexteRecommandation(?string $texteRecommandation): static
    {
        $this->texteRecommandation = $texteRecommandation;

        return $this;
    }

    public function getObjetConsommationId(): ?iterable
    {
        return $this->objetConsommationId;
    }

    public function setObjetConsommationId(?iterable $objetConsommationId): void
    {
        $this->objetConsommationId = $objetConsommationId;
    }

    public function getUserId(): ?iterable
    {
        return $this->userId;
    }

    public function setUserId(?iterable $userId): void
    {
        $this->userId = $userId;
    }
}
