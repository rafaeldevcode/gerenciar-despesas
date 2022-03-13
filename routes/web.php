<?php

    namespace Manage\Expenses\Routes;

    use Manage\Expenses\Controller\{DashboardController, MainController, NotFoundController};
    use Manage\Expenses\Controller\Company\{CompanyController, StoreCompanyController};
    use Manage\Expenses\Controller\Expenses\{ExpensesController};
    use Manage\Expenses\Controller\Gain\{GainController};
    use Manage\Expenses\Controller\Login\{LoginController, LogoutController, RealizaLoginController};
    use Manage\Expenses\Controller\Register\{CreateRegisterController, RegisterController};

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
        '/save-company'   => StoreCompanyController::class,
    ];