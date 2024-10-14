<?php

namespace App\DataFixtures;

use App\Document\CapteurEau;
use App\Document\Foyer;
use App\Document\ObjetConsommation;
use App\Document\Piece;
use App\Document\Utilisateur;
use Doctrine\Bundle\MongoDBBundle\Fixture\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\Persistence\ObjectManager;

class FoyerFixtures extends Fixture implements DependentFixtureInterface
{
    private DocumentManager $dm;

    public function __construct(DocumentManager $dm)
    {
        $this->dm = $dm;
    }

    public function load(ObjectManager $manager): void
    {
        $utilisateurs = [];
        $increment = 0;
        for ($m = 0; $m < 10; $m++) {
            $utilisateurs[] = $this->getReference('utilisateur_' . $m);
        }

        for ($i = 0; $i < 10; $i++) {
            $foyer = new Foyer();
            $foyer->setAdresse(($i+1)." rue des canonniers");
            $foyer->setConsommationTotale(rand(10, 5000));

            $pieces = [];
            $piecesName = ['salon', 'cuisine', 'salle de bain', 'toilettes', 'chambre'];
            $objetConsommations = [];
            $objetConsommationsName = ['fontaine à eau', 'évier', 'baignoire', 'wc', 'lavabo'];
            for ($k = 0; $k < count($piecesName); $k++) {
                $piece = new Piece();
                $piece->setNom($piecesName[$k]);
                $capteursEau = [];
                for ($j = 0; $j < 5; $j++) {
                    $capteurEau = new CapteurEau();
                    $capteurEau
                        ->setType('foyer')
                        ->setEmplacement($piece->getNom() . '_' . $j)
                        ->setEtat('normal')
                        ->setFoyerId($foyer->getId());
                    $capteursEau[] = $capteurEau;
                }
                $piece->setCapteurEauId($capteursEau);
                $objetConsommation = new ObjetConsommation();
                $objetConsommation->setConsommationActuelle(rand(10, 500))
                    ->setNom($objetConsommationsName[$k] . '_' . $k)
                    ->setType($objetConsommationsName[$k])
                    ->setRecommandation($this->getReference('recommandation_' . $k));;
                $this->addReference('objetConsommation_' . $increment, $objetConsommation);
                $objetConsommations[] = $objetConsommation;
                $piece->setObjetConsommationId($objetConsommations);
                $pieces[] = $piece;
                $increment++;
            }
            $foyer->setPieces($pieces);

            $utilisateursFoyer = [];
            for ($j = 0; $j < 5; $j++) {
                $foyers = [];
                /** @var Utilisateur $utilisateur */
                $utilisateur = $utilisateurs[$j];
                $foyers[] = $foyer;
                $utilisateur->setFoyerId($foyers);
                $utilisateursFoyer[] = $utilisateur;
            }
            $foyer->setUtilisateurs($utilisateursFoyer);

            $this->dm->persist($foyer);
        }

        $this->dm->flush();
    }

    public function getDependencies()
    {
        return [
            UtilisateurFixtures::class,
            RecommandationFixtures::class,
        ];
    }
}