<?php

    namespace Controle\Contas\Controller;

    use Controle\Contas\Services\Routers;
    use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
    use Psr\Http\Server\RequestHandlerInterface;
    use Nyholm\Psr7\Response;

    require_once __DIR__ . '/../../vendor/autoload.php';

    class MainController implements RequestHandlerInterface
    {
        use Routers;

        public function handle(ServerRequestInterface $request): ResponseInterface
        {

            $html = Routers::route('index.php', [
                'title' => 'Início',
            ]);

            if(isset($_SESSION['logged'])){
                return new Response(302, ['location' => '/dashboard']);
            }

            return new Response(200, [], $html);
        }
    }