<?php

    namespace Manage\Expenses\Controller;

    use Manage\Expenses\Model\User;
    use Manage\Expenses\Helper\EntityManagerFactory;
    use Manage\Expenses\Services\Routers;
    use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
    use Psr\Http\Server\RequestHandlerInterface;
    use Nyholm\Psr7\Response;

    require_once __DIR__ . '/../../vendor/autoload.php';

    class DashboardController implements RequestHandlerInterface
    {
        private $entityManager;
        private $userRepository;

        use Routers;

        public function __construct()
        {
            $entityManagerFactory = new EntityManagerFactory();
            $this->entityManager = $entityManagerFactory->getEntityManager();
            $this->userRepository = $this->entityManager->getRepository(User::class);
        }

        public function handle(ServerRequestInterface $request): ResponseInterface
        {
            /**
             * @var User $user
             */
            $user = $this->userRepository->findOneBy(['id' => $_SESSION['user_id']]);

            $html = Routers::route('dashboard.php', [
                'name'  => $user->getName(),
                'title' => 'Dashboard',
            ]);

            return new Response(200, [], $html);
        }
    }