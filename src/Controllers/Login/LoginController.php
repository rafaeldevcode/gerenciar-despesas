<?php

    namespace Manage\Expenses\Controllers\Login;

    use Manage\Expenses\Services\{Login, Routers};
    use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
    use Psr\Http\Server\RequestHandlerInterface;
    use Nyholm\Psr7\Response;

    require_once __DIR__ . '/../../../vendor/autoload.php';

    class LoginController implements RequestHandlerInterface
    {
        use Routers, Login;

        public function handle(ServerRequestInterface $request): ResponseInterface
        {
            if(Login::auth() === true){
                return new Response(302, ['location' => '/dashboard']);
            }

            $html = Routers::route('login/index.php', [
                'title' => 'Login',
            ]);

            return new Response(200, [], $html);
        }
    }