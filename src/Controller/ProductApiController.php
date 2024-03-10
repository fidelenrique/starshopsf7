<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api/products')]
class ProductApiController extends AbstractController
{
    #[Route('/', name: 'get_api_all_products', methods: ['GET'])]
    public function getProducts(ProductRepository $productRepository, SerializerInterface $serializer): JsonResponse
    {
        $products = $productRepository->findAll();
        // Sérialiser les produits en JSON
        $data = $serializer->normalize($products, null, ['groups' => 'product']);

        $jsonContent = $serializer->serialize($data, 'json');
        // Créer une réponse JSON
        return new JsonResponse($jsonContent, 200, [], true);
    }

    #[Route('/{id<\d+>}', name: 'get_api_product', methods: ['GET'])]
    public function get(int $id, ProductRepository $productRepository, SerializerInterface $serializer): JsonResponse
    {
        $product = $productRepository->find($id);
        // Sérialiser les produits en JSON
        $data = $serializer->normalize($product, null, ['groups' => 'product']);
        if (is_null($data)) {
            return throw $this->createNotFoundException();
        }
        $jsonContent = $serializer->serialize($data, 'json');
        // Créer une réponse JSON
        return new JsonResponse($jsonContent, 200, [], true);
    }
}