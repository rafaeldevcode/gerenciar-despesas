<?php

    require_once __DIR__ . '/../vendor/autoload.php';

    use Controle\Contas\Services\Login;
    use Nyholm\Psr7\Factory\Psr17Factory;
    use Nyholm\Psr7Server\ServerRequestCreator;

    $path = !isset($_SERVER['PATH_INFO']) ? '/' : $_SERVER['PATH_INFO'];
    $routes = require_once __DIR__ . '/../routes/web.php';

    if(!array_key_exists($path, $routes)): header('location: /not-found', true, 302); exit(); endif;

    Login::verifyLogin($path);

    $psr17Factory = new Psr17Factory();
    $creator = new ServerRequestCreator(
        $psr17Factory, // ServerRequestFactory
        $psr17Factory, // UriFactory
        $psr17Factory, // UploadFileFActory
        $psr17Factory, // StreamFactory
    );
    $request = $creator->fromGlobals();

    $class_controller = $routes[$path];
    $controller = new $class_controller;
    $reponse = $controller->handle($request);

    foreach($reponse->getHeaders() as $name => $values){
        foreach($values as $value){
            header(sprintf('%s: %s', $name, $value), false);
        }
    }

    echo $reponse->getBody();