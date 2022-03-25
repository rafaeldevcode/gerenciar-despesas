<?php

    namespace Manage\Expenses\Controllers\Register;

    use Manage\Expenses\Models\User;
    use Manage\Expenses\Helper\EntityManagerFactory;
    use Manage\Expenses\Services\{Login, Routers};
    use Manage\Expenses\Services\Crud\{Store};
    use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
    use Psr\Http\Server\RequestHandlerInterface;
    use Nyholm\Psr7\Response;

    require_once __DIR__ . '/../../../vendor/autoload.php';

    class StoreRegisterController implements RequestHandlerInterface
    {
        private $entityManager;

        use Routers;

        public function __construct()
        {
            $entityManagerFactory = new EntityManagerFactory();
            $this->entityManager = $entityManagerFactory->getEntityManager();
        }

        public function handle(ServerRequestInterface $request): ResponseInterface
        {
            $store = new Store();
            /**
             * @var $user User
             */
            $user = $store->storeUser($request);
            
            Login::login($user->getId());

            return new Response(302, ['location' => '/dashboard']);
        }
    }