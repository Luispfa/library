<?php

declare(strict_types=1);

namespace App\orders\list\infrastructure\controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

final class GetOrdersListerController
{
    #[Route('/orders-lister', methods: ['GET'], name: 'orders-lister')]
    public function __invoke()
    {
        return new JsonResponse(['hola mundo']);
    }
}
