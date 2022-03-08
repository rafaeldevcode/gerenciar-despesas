<?php

    namespace Manage\Expenses\Controller\Expenses;

    use Manage\Expenses\Services\{Routers};
    use Nyholm\Psr7\Response;
    use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
    use Psr\Http\Server\RequestHandlerInterface;

    class ExpensesController implements RequestHandlerInterface
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