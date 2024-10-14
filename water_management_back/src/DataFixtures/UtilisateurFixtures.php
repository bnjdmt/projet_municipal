<?php

namespace App\DataFixtures;

use App\Document\EspaceVert;
use App\Document\Foyer;
use App\Document\Utilisateur;
use Doctrine\Bundle\MongoDBBundle\Fixture\Fixture;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\Persistence\ObjectManager;

class UtilisateurFixtures extends Fixture
{
    private DocumentManager $dm;

    public function __construct(DocumentManager $dm)
    {
        $this->dm = $dm;
    }

    public function load(ObjectManager $manager)
    {
        $espacesvert = [];
        for ($i = 0; $i < 5; $i++) {
            $espacesvert_[$i] = new EspaceVert();
            $espacesvert_[$i]->setNom("Espace_vert_$i")
                ->setEmplacement("zone_$i")
                ->setArrosageAutomatique(true)
                ->setAnnulationSiPluie(true)
            ;
            $espacesvert[] = $espacesvert_[$i];
        }

        //create ADMIN user
        $utilisateur  = new Utilisateur();
        $utilisateur->setNom('ADMIN');
        $utilisateur->setRole('ADMIN');
        $utilisateur->setEspaceVertId($espacesvert);
        $this->dm->persist($utilisateur);
        $this->addReference('utilisateur', $utilisateur);

        for($i = 0; $i < 10; $i++){
            $utilisateur_[$i] = new Utilisateur();
            $utilisateur_[$i]->setNom('utilisateur_'.$i);
            $utilisateur_[$i]->setRole('CLASSIQUE');
            $this->dm->persist($utilisateur_[$i]);
            $this->addReference('utilisateur_'.$i, $utilisateur_[$i]);
        }

        $this->dm->flush();
    }
}