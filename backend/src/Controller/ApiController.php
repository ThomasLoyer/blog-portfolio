<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    #[Route('/api/test', name: 'api_test', methods: ['POST'])]
    public function testJson(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (!$data) {
            return new JsonResponse(['error' => 'Invalid JSON'], 400);
        }

        // Tu peux tester ce que tu veux avec $data ici
        return new JsonResponse([
            'received' => $data,
            'message' => 'JSON bien reçu !'
        ]);
    }
}
