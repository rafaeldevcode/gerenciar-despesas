<?php

    namespace Controle\Contas\Controller\Gain;

    use Controle\Contas\Services\{Routers};
    use Nyholm\Psr7\Response;
    use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
    use Psr\Http\Server\RequestHandlerInterface;

    class GainController implements RequestHandlerInterface
    {
        use Routers;

        public function handle(ServerRequestInterface $request): ResponseInterface
        {
            $html = Routers::route('add/add-gain.php', [
                'title' => 'Adicionar Ganho',
            ]);

            return new Response(200, [], $html);
        }
    }