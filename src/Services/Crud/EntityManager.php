<?php

namespace Manage\Expenses\Services\Crud;

use Manage\Expenses\Helper\EntityManagerFactory;

require_once __DIR__ . '/../../../vendor/autoload.php';

class EntityManager
{
    private $entityManager;

    public function __construct()
    {
        $entityManagerFactory = new EntityManagerFactory();
        $this->entityManager = $entityManagerFactory->getEntityManager();
    }
}