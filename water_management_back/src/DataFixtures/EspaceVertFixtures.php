<?php

namespace App\DataFixtures;

use App\Document\EspaceVert;
use Doctrine\Bundle\MongoDBBundle\Fixture\Fixture;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\Persistence\ObjectManager;

class EspaceVertFixtures extends Fixture
{
    private DocumentManager $dm;

    public function __construct(DocumentManager $dm)
    {
        $this->dm = $dm;
    }

    public function load(ObjectManager $manager)
    {
        $espaceVert = new EspaceVert();
        $espaceVert->setNom('espace_vert');
        $manager->persist($espaceVert);
        $this->dm->flush();
    }
}