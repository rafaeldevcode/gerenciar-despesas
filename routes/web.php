<?php

    namespace Controle\Contas\Routes;

    use Controle\Contas\Controller\{DashboardController, MainController, NotFoundController};
    use Controle\Contas\Controller\Company\{CompanyController, CreateCompanyController};
    use Controle\Contas\Controller\Expenses\{ExpensesController};
    use Controle\Contas\Controller\Gain\{GainController};
    use Controle\Contas\Controller\Login\{LoginController, LogoutController, RealizaLoginController};
    use Controle\Contas\Controller\Register\{CreateRegisterController, RegisterController};

    return [
        '/'               => MainController::class,
        '/not-found'      => NotFoundController::class,
        '/login'          => LoginController::class,
        '/register'       => RegisterController::class,
        '/dashboard'      => DashboardController::class,
        '/save-user'      => CreateRegisterController::class,
        '/logout'         => LogoutController::class,
        '/login-to'       => RealizaLoginController::class,

        //// INDEX ////
        '/new-expenses'   => ExpensesController::class,
        '/new-gain'       => GainController::class,
        '/new-company'    => CompanyController::class,

        //// CREATE /////
        '/save-company'   => CreateCompanyController::class
    ];