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
        '/save-user' => CreateRegisterController::class,
        '/logout'         => LogoutController::class,
        '/login-to'  => RealizaLoginController::class,

        //// ADD ////
        '/new-expenses'   => AddExpensesController::class,
        '/new-gain'     => AddGainController::class,
        '/new-company'   => AddCompanyController::class,
    ];