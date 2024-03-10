<?php

namespace App\Controller;

use App\Model\Starship;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/startships')]
class StartshipApiController extends AbstractController
{
    #[Route('/')]
    public function getCollection(LoggerInterface $logger): Response
    {
        $logger->info('Startship collection retrieved');
        $startships = [
            new Starship(1, 'USS LeafyCruiser (NCC-0001)', 'Garden', 'Jean-Luc Pickles', 'under construction'),
            new Starship(2, 'USS LeafyCruiser (NCC-0002)', 'Garden2', 'Jean-Luc Pickles2', 'under construction2'),
            new Starship(3, 'USS LeafyCruiser (NCC-0003)', 'Garden3', 'Jean-Luc Pickles3', 'under construction3'),
        ];

        return $this->json($startships);
    }
}
