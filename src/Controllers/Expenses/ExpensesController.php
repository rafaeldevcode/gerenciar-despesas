<?php

namespace Manage\Expenses\Controllers\Expenses;

use Manage\Expenses\Helper\EntityManagerFactory;
use Manage\Expenses\Models\Company;
use Manage\Expenses\Models\User;
use Manage\Expenses\Services\{Login, Routers};
use Nyholm\Psr7\Response;
use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
use Psr\Http\Server\RequestHandlerInterface;

class ExpensesController implements RequestHandlerInterface
{
    use Routers, Login;

    private $entityManager;

    public function __construct()
    {
        $entityManagerFactory = new EntityManagerFactory();
        $this->entityManager = $entityManagerFactory->getEntityManager();

    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        /**
         * @var $user User
         */
        $user = $this->entityManager->find(User::class, Login::user()->getId());

        $html = Routers::route('add/add-expenses.php', [
            'title'   => 'Adicionar Despesa',
            'company' => $user->getCompany(),
            'acounts' => $user->getAcountsBank()
        ]);

        return new Response(200, [], $html);
    }
}