<?php

namespace Manage\Expenses\Controllers\Bank;

use Manage\Expenses\Helper\EntityManagerFactory;
use Manage\Expenses\Models\AcountBank;
use Manage\Expenses\Models\User;
use Manage\Expenses\Services\{Login, Routers};
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
        /**
         * @var $user User
         */
        $user = $this->entityManager->find(User::class, Login::user()->getId());
        $data = $request->getParsedBody();
        $file = $request->getUploadedFiles()['logo_bank'];
        $save_image = Routers::storage($file, 'image');

        if($save_image['status'] === true):
            $bank = new AcountBank();
            $bank->setName($data['name']);
            $bank->setBalance($data['balance']);
            $bank->setLogobank($save_image['file']);

            $user->addAcountBank($bank);

            $this->entityManager->persist($bank);
            $this->entityManager->flush();

            Routers::session('success', 'Conta bancária sanva com sucesso!');
            return new Response(302, ['location' => '/new-bank']);
        else:

            Routers::session('danger', $save_image['message']);
            return new Response(302, ['location' => '/new-bank']);
        endif;
    }
}