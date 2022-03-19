<?php

namespace Manage\Expenses\Controllers\Expenses;

use Manage\Expenses\Helper\EntityManagerFactory;
use Manage\Expenses\Models\Company;
use Manage\Expenses\Services\{Routers};
use Nyholm\Psr7\Response;
use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
use Psr\Http\Server\RequestHandlerInterface;

class ExpensesController implements RequestHandlerInterface
{
    use Routers;

    private $entityManager;
    private $companyRepository;

    public function __construct()
    {
        $entityManagerFactory = new EntityManagerFactory();
        $this->entityManager = $entityManagerFactory->getEntityManager();
        $this->companyRepository = $this->entityManager->getRepository(Company::class);

    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        $html = Routers::route('add/add-expenses.php', [
            'title'   => 'Adicionar Despesa',
            'company' => $this->companyRepository->findAll(),
        ]);

        return new Response(200, [], $html);
    }
}