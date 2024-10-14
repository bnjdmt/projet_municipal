<?php

namespace App\Controller;

use App\Document\Foyer;
use App\Document\Utilisateur;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class UtilisateurController extends AbstractController
{
    #[Route('/api/utilisateurs/{id}', name: 'get_utilisateur', methods: ['GET'])]
    public function getUtilisateur(DocumentManager $dm, $id): JsonResponse
    {
        $utilisateur = $dm->getRepository(Utilisateur::class)->find($id);

        if (!$utilisateur) {
            return new JsonResponse(['message' => 'Utilisateur not found'], JsonResponse::HTTP_NOT_FOUND);
        }

        $foyers = [];
        foreach ($utilisateur->getFoyerId() as $foyer) {
            foreach ($foyer->getPieces() as $piece) {
                $capteurs = [];
                foreach ($piece->getCapteurEauId() as $capteur) {
                    $capteurs[] = [
                        'id' => $capteur->getId(),
                        'emplacement' => $capteur->getEmplacement(),
                    ];
                }
                $objetConsommations = [];
                foreach ($piece->getObjetConsommationId() as $objetConsommation) {
                    $recommandation = [];
                    $recommandation[] = [
                        'id' => $objetConsommation->getRecommandation()->getId(),
                        'texte recommandation' => $objetConsommation->getRecommandation()->getTexteRecommandation(),
                    ];
                    $objetConsommations[] = [
                        'id' => $objetConsommation->getId(),
                        'nom' => $objetConsommation->getNom(),
                        'type' => $objetConsommation->getType(),
                        'consommation actuelle' => $objetConsommation->getConsommationActuelle(),
                        'recommandation' => $recommandation,
                    ];
                }
                $pieces[] = [
                    'id' => $piece->getId(),
                    'nom' => $piece->getNom(),
                    'capteurs' => $capteurs,
                    'objets consommations' => $objetConsommations,
                ];
            }

            $foyers[] = [
                'adresse' => $foyer->getAdresse(),
                'consommation totale' => $foyer->getConsommationTotale(),
                'pieces' => $pieces,
            ];
        }

        $data = [
            'id' => $utilisateur->getId(),
            'name' => $utilisateur->getNom(),
            'email' => $utilisateur->getEmail(),
            'foyers' => $foyers
        ];

        return new JsonResponse($data, JsonResponse::HTTP_OK);
    }
}
