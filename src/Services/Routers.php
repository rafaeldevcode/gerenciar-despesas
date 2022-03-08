<?php

    namespace Manage\Expenses\Services;

    trait Routers
    {
        public static function route(string $rota, array $dados): string
        {
            extract($dados);
            ob_flush();
            require __DIR__ . '/../../view/' . $rota;

            $html = ob_get_clean();

            return $html;
        }

        public static function asset(string $path): void
        {
            $protocol = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on') ? 'https' : 'http');
            $host = $_SERVER['HTTP_HOST'];

            $url = "{$protocol}://{$host}/{$path}";
            
            echo $url;
        }

        public static function session(string $typeMessage, $message)
        {
            session_start();

            $_SESSION['type_message'] = $typeMessage;
            $_SESSION['message'] = $message;

        }
    }