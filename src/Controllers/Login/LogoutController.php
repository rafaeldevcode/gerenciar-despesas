<?php

    namespace Manage\Expenses\Controllers\Login;

    use Manage\Expenses\Services\Routers;
    use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
    use Psr\Http\Server\RequestHandlerInterface;
    use Nyholm\Psr7\Response;

    require_once __DIR__ . '/../../../vendor/autoload.php';

    class LogoutController implements RequestHandlerInterface
    {
        use Routers;

        public function handle(ServerRequestInterface $request): ResponseInterface
        {
            session_destroy();

            return new Response(302, ['location' => '/login']);
        }
    }