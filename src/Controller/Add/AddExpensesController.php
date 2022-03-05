<?php

    namespace Controle\Contas\Controller\Add;

    use Controle\Contas\Services\{Routers};
    use Nyholm\Psr7\Response;
    use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
    use Psr\Http\Server\RequestHandlerInterface;

    class AddExpensesController implements RequestHandlerInterface
    {
        use Routers;

        public function handle(ServerRequestInterface $request): ResponseInterface
        {
            $html = Routers::route('add/add-expenses.php', [
                'title' => 'Adicionar Despesa',
            ]);

            return new Response(200, [], $html);
        }
    }