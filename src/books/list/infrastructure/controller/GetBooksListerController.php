<?php

declare(strict_types=1);

namespace books\list\infrastructure\controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class GetBooksListerController
{
    #[Route('/books-lister', methods: ['GET'], name: 'books-lister')]
    public function __invoke(): Response
    {
        return new JsonResponse(['books lister']);
    }
}
