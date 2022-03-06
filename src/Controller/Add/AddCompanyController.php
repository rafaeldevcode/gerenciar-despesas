<?php

    namespace Controle\Contas\Controller\Add;

    use Controle\Contas\Services\{Routers};
    use Nyholm\Psr7\Response;
    use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
    use Psr\Http\Server\RequestHandlerInterface;

    class AddCompanyController implements RequestHandlerInterface
    {
        use Routers;

        public function handle(ServerRequestInterface $request): ResponseInterface
        {
            $html = Routers::route('add/add-company.php', [
                'title' => 'Adicionar Empresa',
            ]);

            return new Response(200, [], $html);
        }
    }