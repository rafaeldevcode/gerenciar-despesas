<?php

namespace Manage\Expenses\Controllers\Company;

use Manage\Expenses\Helper\EntityManagerFactory;
use Manage\Expenses\Models\Company;
use Manage\Expenses\Models\User;
use Manage\Expenses\Services\{Login, Routers};
use Manage\Expenses\Services\Crud\Store;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class StoreCompanyController implements RequestHandlerInterface
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
        $company = $store->storeCompany($request);

        if($company['status'] === true){

            Routers::session('success', 'Empresa salva com sucesso!');
            return new Response(302, ['location' => '/new-company']);
        }else{
            Routers::session('danger', $company['message']);

            return new Response(302, ['location' => '/new-company']);
        }
    }
}