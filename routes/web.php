<?php

    namespace Controle\Contas\Routes;

    use Controle\Contas\Controller\{DashboardController, MainController, NotFoundController};
    use Controle\Contas\Controller\Add\{AddCompanyController, AddExpensesController, AddGainController};
    use Controle\Contas\Controller\Login\{LoginController, LogoutController, RealizaLoginController};
    use Controle\Contas\Controller\Register\{CreateRegisterController, RegisterController};

    return [
        '/'               => MainController::class,
        '/not-found'      => NotFoundController::class,
        '/login'          => LoginController::class,
        '/register'       => RegisterController::class,
        '/dashboard'      => DashboardController::class,
        '/salvar-usuario' => CreateRegisterController::class,
        '/logout'         => LogoutController::class,
        '/realiza-login'  => RealizaLoginController::class,

        //// ADD ////
        '/nova-despesa'   => AddExpensesController::class,
        '/novo-ganho'     => AddGainController::class,
        '/nova-empresa'   => AddCompanyController::class,
    ];