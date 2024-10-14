<?php

namespace App\Controller;

use App\Document\Foyer;
use App\Document\Piece;
use App\Document\Utilisateur;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class FoyerController extends AbstractController
{
    /*#[Route('/foyer', name: 'app_foyer')]
    public function index(): Response
    {
        return $this->render('foyer/index.html.twig', [
            'controller_name' => 'FoyerController',
        ]);
    }*/

    #[Route('/api/foyers', name: 'get_foyers', methods: ['GET'])]
    public function getFoyers(DocumentManager $dm): JsonResponse
    {
        $foyers = $dm->getRepository(Foyer::class)->findAll();

        $data = [];
        foreach ($foyers as $foyer) {
            $utilisateurs = [];
            foreach ($foyer->getUtilisateurs() as $utilisateur) {
                $utilisateurs[] = [
                    'id' => $utilisateur->getId(),
                ];
            }

            $data[] = [
                'id' => $foyer->getId(),
                'adresse' => $foyer->getAdresse(),
                'utilisateurs' => $utilisateurs,
            ];
        }

        return new JsonResponse($data, JsonResponse::HTTP_OK);
    }

    #[Route('api/foyers/{id}', name: 'get_foyer', methods: ['GET'])]
    public function getFoyer(DocumentManager $dm, $id, SerializerInterface $serializer): JsonResponse
    {
        $foyer = $dm->getRepository(Foyer::class)->find($id);

        if (!$foyer) {
            return new JsonResponse(['message' => 'Foyer not found'], JsonResponse::HTTP_NOT_FOUND);
        }

        $utilisateurs = [];
        foreach ($foyer->getUtilisateurs() as $utilisateur) {
            $utilisateurs[] = [
                'id' => $utilisateur->getId(),
            ];
        }
        $pieces = [];
        foreach ($foyer->getPieces() as $piece) {
            $capteurs = [];
            foreach ($piece->getCapteurEauId() as $capteur) {
                $capteurs[] = [
                    'id' => $capteur->getId(),
                    'emplacement' => $capteur->getEmplacement(),
                ];
            }
            $pieces[] = [
                'id' => $piece->getId(),
                'nom' => $piece->getNom(),
                'capteurs' => $capteurs,
            ];
        }
        $data = [
            'id' => $foyer->getId(),
            'adresse' => $foyer->getAdresse(),
            'pieces' => $pieces,
            'consommation_totale' => $foyer->getConsommationTotale(),
            'utilisateurs' => $utilisateurs,
        ];

        return new JsonResponse($data, JsonResponse::HTTP_OK);
    }

    #[Route('/api/foyers', name: 'create_foyer', methods: ['POST'])]
    public function createFoyer(Request $request, DocumentManager $dm, SerializerInterface $serializer): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $foyer = new Foyer();
        $foyer->setAdresse($data['adresse'] ?? null);
        $foyer->setConsommationTotale($data['consommationTotale'] ?? null);

        if (isset($data['utilisateurs']) && is_array($data['utilisateurs'])) {
            $utilisateurs = [];
            foreach ($data['utilisateurs'] as $utilisateurData) {
                $utilisateur = $serializer->denormalize($utilisateurData, Utilisateur::class);
                $utilisateurs[] = $utilisateur;
            }
            $foyer->setUtilisateurs($utilisateurs);
        }

        if (isset($data['pieces']) && is_array($data['pieces'])) {
            $pieces = [];
            foreach ($data['pieces'] as $pieceData) {
                $piece = $serializer->denormalize($pieceData, Piece::class);
                $pieces[] = $piece;
            }
            $foyer->setPieces($pieces);
        }

        $dm->persist($foyer);
        $dm->flush();

        return new JsonResponse(['message' => 'Foyer created'], JsonResponse::HTTP_CREATED);
    }
}
