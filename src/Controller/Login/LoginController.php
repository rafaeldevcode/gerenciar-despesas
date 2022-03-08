<?php

    namespace Manage\Expenses\Controller\Login;

    use Manage\Expenses\Services\Routers;
    use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
    use Psr\Http\Server\RequestHandlerInterface;
    use Nyholm\Psr7\Response;

    require_once __DIR__ . '/../../../vendor/autoload.php';

    class LoginController implements RequestHandlerInterface
    {
        use Routers;

        public function handle(ServerRequestInterface $request): ResponseInterface
        {
            $html = Routers::route('login/index.php', [
                'title' => 'Login',
            ]);

            return new Response(200, [], $html);
        }
    }