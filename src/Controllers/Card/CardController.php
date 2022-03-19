<?php

namespace Manage\Expenses\Controllers\Card;

use Manage\Expenses\Services\{Routers};
use Nyholm\Psr7\Response;
use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
use Psr\Http\Server\RequestHandlerInterface;

class CardController implements RequestHandlerInterface
{
    use Routers;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = Routers::route('add/add-card.php', [
            'title' => 'Adicionar Cartão',
        ]);

        return new Response(200, [], $html);
    }
}