<?php

    namespace Manage\Expenses\Controllers;

    use Manage\Expenses\Models\User;
    use Manage\Expenses\Helper\EntityManagerFactory;
    use Manage\Expenses\Services\{Login, Routers};
    use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
    use Psr\Http\Server\RequestHandlerInterface;
    use Nyholm\Psr7\Response;

    require_once __DIR__ . '/../../vendor/autoload.php';

    class DashboardController implements RequestHandlerInterface
    {
        private $entityManager;
        private $userRepository;

        use Routers, Login;

        public function handle(ServerRequestInterface $request): ResponseInterface
        {
            /**
             * @var User $user
             */
            $user = Login::user();
            
            $html = Routers::route('dashboard.php', [
                'name'  => $user->getName(),
                'title' => 'Dashboard',
            ]);

            return new Response(200, [], $html);
        }
    }