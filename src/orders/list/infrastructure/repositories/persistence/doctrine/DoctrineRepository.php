<?php

declare(strict_types=1);

namespace orders\list\infrastructure\repositories\persistence\doctrine;

use Doctrine\ORM\EntityManagerInterface;

class DoctrineRepository
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function searchAll(string $entity): array
    {
        return $this->entityManager->getRepository($entity)->findAll();
    }
}
