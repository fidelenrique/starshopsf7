<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/articles')]
class ArticleApiController extends AbstractController
{
    #[Route('/', name: 'get_api_all_articles', methods: ['GET'])]
    public function getArticles(ArticleRepository $articleRepository, SerializerInterface $serializer): JsonResponse
    {
        $articles = $articleRepository->findAll();
        // Sérialiser les articles en JSON
        $data = $serializer->normalize($articles, null, ['groups' => 'article']);

        $jsonContent = $serializer->serialize($data, 'json');
        // Créer une réponse JSON
        $response = new JsonResponse($jsonContent, 200, [], true);
        // Ajout de l'en-tête Access-Control-Origin
        $response->headers->set('Access-Control-Allow-Origin', '*');

        return $response;
    }
}