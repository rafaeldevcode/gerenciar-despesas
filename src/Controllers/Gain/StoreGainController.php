<?php

namespace Manage\Expenses\Controllers\Gain;

use Doctrine\ORM\Mapping\Entity;
use Manage\Expenses\Helper\EntityManagerFactory;
use Manage\Expenses\Models\AcountBank;
use Manage\Expenses\Models\Company;
use Manage\Expenses\Models\Gain;
use Manage\Expenses\Models\User;
use Manage\Expenses\Services\{Login, Routers};
use Manage\Expenses\Services\Crud\Store;
use Nyholm\Psr7\Response;
use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
use Psr\Http\Server\RequestHandlerInterface;

class StoreGainController implements RequestHandlerInterface
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
        $gain = $store->storeGain($request);

        if($gain['status'] === true):

            Routers::session('success', 'Ganho salvo com sucesso!');
            return new Response(302, ['location' => '/new-gain']);

        else:
            Routers::session('danger', $gain['message']);
            return new Response(302, ['location' => '/new-gain']);
        endif;
    }
}