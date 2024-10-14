<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

#[ODM\Document(collection: 'utilisateurs')]
class Utilisateur
{
    #[ODM\Id]
    private $id = null;

    #[ODM\Field(type: 'string')]
    private ?string $nom = null;

    #[ODM\Field(type: 'string')]
    private ?string $email = null;

    #[ODM\Field(type: 'string')]
    private ?string $role = null;

    #[ODM\ReferenceMany(targetDocument: Foyer::class, cascade: 'persist')]
    private iterable $foyerId = [];

    #[ODM\ReferenceMany(targetDocument: EspaceVert::class, cascade: 'persist')]
    private iterable $espaceVertId = [];

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): void
    {
        $this->role = $role;
    }

    public function getFoyerId(): iterable
    {
        return $this->foyerId;
    }

    public function setFoyerId(iterable $foyerId): void
    {
        $this->foyerId = $foyerId;
    }

    public function getEspaceVertId(): iterable
    {
        return $this->espaceVertId;
    }

    public function setEspaceVertId(iterable $espaceVertId): void
    {
        $this->espaceVertId = $espaceVertId;
    }
}
