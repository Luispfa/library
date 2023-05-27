<?php

declare(strict_types=1);

namespace App\orders\list\infrastructure\controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

final class GetListOrdersController
{
    #[Route('/list-orders', methods: ['GET'], name: 'list-orders')]
    public function __invoke()
    {
        return new JsonResponse(['hola mundo']);
    }
}