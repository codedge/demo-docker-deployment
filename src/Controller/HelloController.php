<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class HelloController extends AbstractController
{
    #[Route('json')]
    public function jsonOutput(): JsonResponse {
        $data = [
            'some_sample_text' => 'Hello Backend guys!',
        ];


        return $this->json($data);
    }
}
