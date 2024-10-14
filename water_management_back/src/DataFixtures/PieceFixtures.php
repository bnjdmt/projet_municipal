<?php

namespace App\DataFixtures;

use App\Document\Piece;
use Doctrine\Bundle\MongoDBBundle\Fixture\Fixture;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\Persistence\ObjectManager;

class PieceFixtures extends Fixture
{
    private DocumentManager $dm;

    public function __construct(DocumentManager $dm)
    {
        $this->dm = $dm;
    }

    public function load(ObjectManager $manager)
    {
        $piece = new Piece();
        $piece->setNom('salon');
        $manager->persist($piece);
        $this->dm->flush();
    }
}