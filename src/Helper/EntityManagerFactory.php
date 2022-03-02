<?php

    namespace Painel\Helper;

    require_once __DIR__ . '/../../vendor/autoload.php';

    use Doctrine\ORM\EntityManager;
    use Doctrine\ORM\EntityManagerInterface;
    use Doctrine\ORM\Tools\Setup;

    class EntityManagerFactory
    {
        /**
         * @EntityManagerInterface
         * @throws \Doctrine\ORM\ORMException
         */
        public function getEntityManager(): EntityManagerInterface
        {
            $rootDir = __DIR__ . '/../..';

            $config = Setup::createAnnotationMetadataConfiguration(
                [$rootDir . '/src'],
                true
            );

            $sqlite = [
                'driver' => 'pdo_sqlite',
                'path'   => $rootDir . '/database/data/database.sqlite',
            ];

            $mysql = [
                'driver'   => 'pdo_mysql',
                'host'     => '127.0.0.1',
                'port'     => '3306',
                'dbname'   => 'controle_contas',
                'user'     => 'root',
                'password' => 'root',
            ];

            return EntityManager::create($mysql, $config);
        }
    }