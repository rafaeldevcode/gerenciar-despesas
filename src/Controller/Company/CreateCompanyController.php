<?php

    namespace Manage\Expenses\Controller\Company;

    use Nyholm\Psr7\Response;
    use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
    use Psr\Http\Server\RequestHandlerInterface;

    class CreateCompanyController implements RequestHandlerInterface
    {
        public function handle(ServerRequestInterface $request): ResponseInterface
        {
            $data = $request->getParsedBody();

            return new Response(302, ['location' => '/new-company']);
        }
    }