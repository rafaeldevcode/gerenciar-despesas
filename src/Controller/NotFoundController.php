<?php

    namespace Manage\Expenses\Controller;

    use Manage\Expenses\Services\Routers;
    use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
    use Psr\Http\Server\RequestHandlerInterface;
    use Nyholm\Psr7\Response;

    require_once __DIR__ . '/../../vendor/autoload.php';

    class NotFoundController implements RequestHandlerInterface
    {
        use Routers;

        public function handle(ServerRequestInterface $request): ResponseInterface
        {

            $html = Routers::route('404.php', [
                'title' => 'Página não encontrada | 404',
            ]);

            return new Response(200, [], $html);
        }
    }