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

        public static function storage(object $file, string $type): array
        {
            $file = empty($file->getClientFilename()) ? 'logo_default.png' : $file;

            if($file === 'logo_default.png'):
                return [
                    'status'  => true,
                    'message' => 'Nenhum arquivo selecionado, imagem padrão adicionado!',
                    'file'    => $file,
                ];
            endif;

            if($type === 'image'):
                $file_type = $file->getClientMediaType();
                
                if(($file_type !== 'image/png') &&
                ($file_type !== 'image/jpg') &&
                ($file_type !== 'image/jpeg') &&
                ($file_type !== 'image/webp')):
                    return [
                        'status'  => false,
                        'message' => 'Formato de arquivo inválido!',
                    ];
                else:

                    $filename = sprintf(
                        '%s.%s',
                        md5(time()),
                        pathinfo($file->getClientFilename(), PATHINFO_EXTENSION),
                    );
                    $file->moveTo(__DIR__ . '/../../storage/uploads/'. $filename);

                    return [
                        'status'  => true,
                        'message' => 'Arquivo salvo com sucesso!',
                        'file'    => $filename,
                    ];
                endif;
            else:

                return [
                    'status'  => false,
                    'message' => 'Tipo de entrado de inválido!',
                ];
            endif;
        }
    }