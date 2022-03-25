<?php

namespace Manage\Expenses\Controllers\Expenses;

use Manage\Expenses\Helper\EntityManagerFactory;
use Manage\Expenses\Models\AcountBank;
use Manage\Expenses\Models\Company;
use Manage\Expenses\Models\CreditCard;
use Manage\Expenses\Models\Expenses;
use Manage\Expenses\Models\User;
use Manage\Expenses\Services\{Login, Routers};
use Manage\Expenses\Services\Crud\Store;
use Nyholm\Psr7\Response;
use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
use Psr\Http\Server\RequestHandlerInterface;

class StoreExpensesController implements RequestHandlerInterface
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
        $store = new Store();
        $expenses = $store->storeExpenses($request);

        if($expenses['status'] === true):


            Routers::session('success', 'Despesa salva com sucesso!');
            return new Response(302, []);
        else:
            Routers::session('danger', $expenses['message']);
            return new Response(302, ['location' => '/new-expenses']);
        endif;
    }
}