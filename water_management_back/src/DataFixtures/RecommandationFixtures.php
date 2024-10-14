<?php

namespace App\DataFixtures;

use App\Document\Recommandation;
use Doctrine\Bundle\MongoDBBundle\Fixture\Fixture;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\Persistence\ObjectManager;

class RecommandationFixtures extends Fixture
{
    private DocumentManager $dm;

    public function __construct(DocumentManager $dm)
    {
        $this->dm = $dm;
    }

    public function load(ObjectManager $manager)
    {
        $i = 0;
        $objetConsommationsName = ['fontaine à eau', 'évier', 'baignoire', 'wc', 'lavabo'];
        $recommandationsContent =
            [
                "Vérifiez que l'arrivée d'eau n'est pas endommagée",
                "Un évier en mauvais état provoque des pertes d'eau",
                "Préférez les douches au baignoire",
                "Si vos toilettes ont une chasse à deux options faites en bon usage",
                "Ne laissez pas l'eau couler pendant que vous vous brossez les dents"
            ];
        foreach ($objetConsommationsName as $objetConsommationName) {
            $recommandation = new Recommandation();
            $recommandation
                ->setTexteRecommandation($recommandationsContent[$i])
            ;
            $manager->persist($recommandation);
            $this->addReference('recommandation_'.$i, $recommandation);
            $i++;
        }

        $this->dm->flush();
    }
}