<?php

namespace Manage\Expenses\Controllers\Bank;

use Manage\Expenses\Services\{Routers};
use Nyholm\Psr7\Response;
use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
use Psr\Http\Server\RequestHandlerInterface;

class BankController implements RequestHandlerInterface
{
    use Routers;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = Routers::route('add/add-bank.php', [
            'title' => 'Adicionar Banco',
        ]);

        return new Response(200, [], $html);
    }
}