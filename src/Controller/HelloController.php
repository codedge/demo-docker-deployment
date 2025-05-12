<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HelloController extends AbstractController
{
    public function __construct(
        #[Autowire(param: 'super_secret')]
        private string $secret
    ) {
    }


    #[Route('/')]
    public function indexAction(): Response
    {
        return new Response('Startseite...');
    }

    #[Route('json')]
    public function jsonOutput(): JsonResponse {
        $data = [
            'some_sample_text' => 'Hello Backend guys!',
            'super_secret' => $this->secret,
        ];

        return $this->json($data);
    }
}
