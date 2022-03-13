<?php

namespace Manage\Expenses\Controller\Gain;

use Doctrine\ORM\Mapping\Entity;
use Manage\Expenses\Helper\EntityManagerFactory;
use Manage\Expenses\Model\Company;
use Manage\Expenses\Services\{Routers};
use Nyholm\Psr7\Response;
use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
use Psr\Http\Server\RequestHandlerInterface;

class GainController implements RequestHandlerInterface
{
    use Routers;

    private $entityManager;
    private $companyRepository;

    public function __construct()
    {
        $entityManagerFactory = new EntityManagerFactory();
        $this->entityManager = $entityManagerFactory->getEntityManager();
        $this->companyRepository = $this->entityManager->getRepository(Company::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = Routers::route('add/add-gain.php', [
            'title'   => 'Adicionar Ganho',
            'company' => $this->companyRepository->findAll(),
        ]);

        return new Response(200, [], $html);
    }
}