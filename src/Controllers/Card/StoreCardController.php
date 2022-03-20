<?php

namespace Manage\Expenses\Controllers\Card;

use Manage\Expenses\Helper\EntityManagerFactory;
use Manage\Expenses\Models\CreditCard;
use Manage\Expenses\Models\User;
use Manage\Expenses\Services\{Login, Routers};
use Nyholm\Psr7\Response;
use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
use Psr\Http\Server\RequestHandlerInterface;

class StoreCardController implements RequestHandlerInterface
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

        Routers::session('success', 'Cartão de crédito adicionado com sucesso!');

        return new Response(302, ['location' => '/new-card']);
    }
}