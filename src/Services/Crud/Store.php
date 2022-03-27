<?php

namespace Manage\Expenses\Services\Crud;

use Manage\Expenses\Helper\EntityManagerFactory;
use Manage\Expenses\Models\{User, CreditCard, AcountBank, Company, Expenses, Gain};
use Manage\Expenses\Services\Crud\EntityManager;
use Manage\Expenses\Services\{Login, Routers};

require_once __DIR__ . '/../../../vendor/autoload.php';

class Store extends EntityManager
{
    use Routers, Login;

    private $entityManager;

    public function __construct()
    {
        $entityManageFactory = new EntityManagerFactory();
        $this->entityManager = $entityManageFactory->getEntityManager();
    }

    public function storeUser(object $request): object
    {
        $user = new User();
        $data = $request->getParsedBody();
        $passHash = password_hash($data['password'], PASSWORD_ARGON2I);

        $user->setName($data['name']);
        $user->setEmail($data['email']);
        $user->setPass($passHash);
        
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $user;
    }

    public function storeBank(object $request): array
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

            return $save_image;
        else:
            return $save_image;
        endif;
    }

    public function storeCard(object $request): void
    {
        $data = $request->getParsedBody();
        /**
         * @var $user User
         */
        $user = $this->entityManager->find(User::class, Login::user()->getId());

        $card = new CreditCard();
        $card->setName($data['name']);
        $card->setLimit($data['limit']);

        $user->addCreditCard($card);

        $this->entityManager->persist($card);
        $this->entityManager->flush();
    }

    public function storeCompany(object $request): array
    {
        /**
         * @var $user User
         */
        $user = $this->entityManager->find(User::class, Login::user()->getId());
        $file = $request->getUploadedFiles()['logo_company'];
        $save_image = Routers::storage($file, 'image');

        if($save_image['status'] === true):
            $data = $request->getParsedBody();

            $company = new Company();
            $company->setname($data['name']);
            $company->setCNPJ($data['cnpj']);
            $company->setLogoComapany($save_image['file']);
            $user->addCompany($company);

            $this->entityManager->persist($company);
            $this->entityManager->flush();

            return $save_image;
        else:
            return $save_image;
        endif;
    }

    public function storeExpenses(object $request): array
    {
        $data = $request->getParsedBody();
        /**
         * @var $user User
         */
        $user = $this->entityManager->find(User::class, Login::user()->getId());
        /**
         * @var $card CreditCard
         */
        $card = $this->entityManager->find(CreditCard::class, $data['payment_credit']);
        /**
         * @var $bank AcountBank
         */
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
            $expenses->setTaxCupon($save_image['file']);

            if($data['form_payment'] === 'debit'):
                $balance = $bank->getBalance();
                $value_expenses = $data['value_expenses'];
                
                $bank->setBalance($balance - $value_expenses);
                $bank->addExpenses($expenses);
            elseif($data['form_payment'] === 'credit'):
                $limit = $card->getLimit();
                $value_expenses = $data['value_expenses'];

                $card->setLimit($limit - $value_expenses);
                $card->addExpenses($expenses);
            endif;

            $user->addExpenses($expenses);

            $this->entityManager->persist($expenses);
            $this->entityManager->flush();

            return $save_image;
        else:
            return $save_image;
        endif;
    }

    public function storeGain(object $request): array
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

            return $save_image;

        else:
            return $save_image;
        endif;
    }
}