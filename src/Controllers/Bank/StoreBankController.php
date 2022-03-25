<?php

namespace Manage\Expenses\Controllers\Bank;

use Manage\Expenses\Helper\EntityManagerFactory;
use Manage\Expenses\Models\AcountBank;
use Manage\Expenses\Models\User;
use Manage\Expenses\Services\{Login, Routers};
use Manage\Expenses\Services\Crud\Store;
use Nyholm\Psr7\Response;
use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
use Psr\Http\Server\RequestHandlerInterface;

class StoreBankController implements RequestHandlerInterface
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
        $acount = $store->storeBank($request);

        if($acount['status'] === true):


            Routers::session('success', 'Conta bancária sanva com sucesso!');
            return new Response(302, ['location' => '/new-bank']);
        else:

            Routers::session('danger', $acount['message']);
            return new Response(302, ['location' => '/new-bank']);
        endif;
    }
}