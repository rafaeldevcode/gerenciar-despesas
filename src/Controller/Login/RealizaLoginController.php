<?php

    namespace Controle\Contas\Controller\Login;

    use Controle\Contas\Model\User;
    use Controle\Contas\Helper\EntityManagerFactory;
    use Controle\Contas\Services\{Login, Routers};
    use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
    use Psr\Http\Server\RequestHandlerInterface;
    use Nyholm\Psr7\Response;

    require_once __DIR__ . '/../../../vendor/autoload.php';

    class RealizaLoginController implements RequestHandlerInterface
    {
        private $entityManager;
        private $userRepository;

        use Routers, Login;

        public function __construct()
        {
            $entityManagerFactory = new EntityManagerFactory();
            $this->entityManager = $entityManagerFactory->getEntityManager();
            $this->userRepository = $this->entityManager->getRepository(User::class);
        }

        public function handle(ServerRequestInterface $request): ResponseInterface
        {
            $data = $request->getParsedBody();

            /**
             * @var User $user
             */
            $user = $this->userRepository->findOneBy(['email' => $data['email']]);

            if((is_null($user)) || ($user->verifyPass($data['password'])) === false){
                Routers::session('danger', 'Usuário e/ou senha incorreta!');

                return new Response(302, ['location' => '/login']);
            }

            Login::login($user->getId());

            return new Response(302, ['location' => '/dashboard']);
        }
    }