<?php

    namespace Manage\Expenses\Services;

use Manage\Expenses\Helper\EntityManagerFactory;
use Manage\Expenses\Models\User;

    trait Login
    {
        public static function verifyLogin(string $path): void
        {
            session_start();

            if((!isset($_SESSION['logged'])) && 
                (strpos($path, 'login') === false) &&
                (strpos($path, 'register') === false) &&
                (strpos($path, 'logout') === false) &&
                ($path !== '/')){
                    header('location: /', true, 302);

                    return;
            }
        }

        public static function login(int $userId): void
        {
            session_start();

            $_SESSION['logged'] = true;
            $_SESSION['user_id'] = $userId;

            session_cache_expire();
        }

        public static function auth(): bool
        {
            return isset($_SESSION['logged']) ? $_SESSION['logged'] : false;
        }

        public static function user(): object
        {
            $entityManagerFactory = new EntityManagerFactory();
            $entityManager = $entityManagerFactory->getEntityManager();

            $id = $_SESSION['user_id'];
            
            return $entityManager->find(User::class, $id);
        }
    }