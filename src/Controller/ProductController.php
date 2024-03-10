<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

#[Route('/products')]
class ProductController extends AbstractController
{

    /**
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws LoaderError
     */
    #[Route('/{id<\d+>}', name: 'get_product', methods: ['GET'])]
    public function get(int $id, ProductRepository $productRepository, SerializerInterface $serializer, Environment $twig): Response
    {
        $product = $productRepository->find($id);
        // Sérialiser les produits en JSON
        $data = $serializer->normalize($product, null, ['groups' => 'product']);

        $html = $twig->render('product/show.html.twig', [
            'title' => 'PB & Jams',
            'product' => $data,
        ]);
        return new Response($html);
    }
}