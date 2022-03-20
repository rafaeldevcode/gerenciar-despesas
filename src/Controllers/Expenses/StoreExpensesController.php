<?php

namespace Manage\Expenses\Controllers\Expenses;

use Manage\Expenses\Helper\EntityManagerFactory;
use Manage\Expenses\Models\AcountBank;
use Manage\Expenses\Models\Company;
use Manage\Expenses\Models\CreditCard;
use Manage\Expenses\Models\Expenses;
use Manage\Expenses\Models\User;
use Manage\Expenses\Services\{Login, Routers};
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
        /**
         * @var $user User
         */
        $user = $this->entityManager->find(User::class, Login::user()->getId());
        $data = $request->getParsedBody();
        $company = $this->entityManager->find(Company::class, $data['company']);
        $card = $this->entityManager->find(CreditCard::class, $data['payment_credit']);
        $bank = $this->entityManager->find(AcountBank::class, $data['payment_debit']);

        $file = $request->getUploadedFiles()['tax_coupon'];
        $save_image = Routers::storage($file, 'image');

        if($save_image['status'] === true):
            $expenses = new Expenses();
            $expenses->setName($data['name']);
            $expenses->setValueExpenses($data['value_expenses']);
            $expenses->setMonth($data['month']);
            $expenses->setYear($data['year']);
            $expenses->setTypeExpenses($data['type_expenses']);
            $expenses->setPayment($data['form_payment']);

            if($data['form_payment'] === 'debit'):
                $bank->setBalance($bank->getBalance() - $data(['value_expenses']));
                $expenses->setAcountBank($bank);
            elseif($data['form_payment'] === 'credit'):
                $card->setLimit($card->getLimit() - $data['value_expenses']);
                $expenses->setCreditCard($card);
            endif;

            $user->addExpenses($expenses);

            $this->entityManager->persist($expenses);
            $this->entityManager->flush();

            Routers::session('success', 'Despesa salva com sucesso!');
            return new Response(302, []);
        else:
            Routers::session('danger', $save_image['message']);
            return new Response(302, ['location' => '/new-expenses']);
        endif;
    }
}