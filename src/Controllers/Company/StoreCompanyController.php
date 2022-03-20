<?php

namespace Manage\Expenses\Controllers\Company;

use Manage\Expenses\Helper\EntityManagerFactory;
use Manage\Expenses\Models\Company;
use Manage\Expenses\Models\User;
use Manage\Expenses\Services\{Login, Routers};
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
        /**
         * @var $user User
         */
        $user = $this->entityManager->find(User::class, Login::user()->getId());
        $file = $request->getUploadedFiles()['logo_company'];
        $save_image = Routers::storage($file, 'image');

        if($save_image['status'] === true){
            $data = $request->getParsedBody();

            $company = new Company();
            $company->setname($data['name']);
            $company->setCNPJ($data['cnpj']);
            $company->setLogoComapany($save_image['file']);
            $user->addCompany($company);

            $this->entityManager->persist($company);
            $this->entityManager->flush();

            Routers::session('success', 'Empresa salva com sucesso!');
            return new Response(302, ['location' => '/new-company']);
        }else{
            Routers::session('danger', $save_image['message']);

            return new Response(302, ['location' => '/new-company']);
        }
    }
}