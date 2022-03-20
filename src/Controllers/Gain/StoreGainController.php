<?php

namespace Manage\Expenses\Controllers\Gain;

use Doctrine\ORM\Mapping\Entity;
use Manage\Expenses\Helper\EntityManagerFactory;
use Manage\Expenses\Models\AcountBank;
use Manage\Expenses\Models\Company;
use Manage\Expenses\Models\Gain;
use Manage\Expenses\Models\User;
use Manage\Expenses\Services\{Login, Routers};
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
        /**
         * @var $user User
         */
        $user = $this->entityManager->find(User::class, Login::user()->getId());
        $data = $request->getParsedBody();
        $company = $this->entityManager->find(Company::class, $data['company']);
        $bank = $this->entityManager->find(AcountBank::class, $data['acount_bank']);
        $balance = $bank->getBalance() + $data['value_gain'];

        $file = $request->getUploadedFiles()['receipt_gain'];
        $save_image = Routers::storage($file, 'image');

        if($save_image['status'] === true):
            $gain = new Gain();
            $gain->setName($data['name']);
            $gain->setValueGain($data['value_gain']);
            $gain->setTypeGain($data['type_gain']);
            $gain->setReceiptGain($save_image['file']);
            $gain->setAcountBank($bank);
            $gain->setCompany($company);

            $bank->setBalance($balance);
            $user->addGain($gain);

            $this->entityManager->persist($gain);
            $this->entityManager->flush();

            Routers::session('success', 'Ganho salvo com sucesso!');
            return new Response(302, ['location' => '/new-gain']);

        else:
            Routers::session('danger', $save_image['message']);
            return new Response(302, ['location' => '/new-gain']);
        endif;
    }
}