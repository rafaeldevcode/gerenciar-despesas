<?php

    namespace Manage\Expenses\Controllers\Register;

    use Manage\Expenses\Services\Routers;
    use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
    use Psr\Http\Server\RequestHandlerInterface;
    use Nyholm\Psr7\Response;

    require_once __DIR__ . '/../../../vendor/autoload.php';

    class RegisterController implements RequestHandlerInterface
    {
        use Routers;

        public function handle(ServerRequestInterface $request): ResponseInterface
        {
            $html = Routers::route('register/index.php', [
                'title' => 'Register',
            ]);

            return new Response(200, [], $html);
        }
    }