<?php

namespace Manage\Expenses\Routes;

use Manage\Expenses\Controllers\{DashboardController, MainController, NotFoundController};
use Manage\Expenses\Controllers\Bank\BankController;
use Manage\Expenses\Controllers\Bank\StoreBankController;
use Manage\Expenses\Controllers\Card\CardController;
use Manage\Expenses\Controllers\Card\StoreCardController;
use Manage\Expenses\Controllers\Company\{CompanyController, StoreCompanyController};
use Manage\Expenses\Controllers\Expenses\{ExpensesController, StoreExpensesController};
use Manage\Expenses\Controllers\Gain\{GainController, StoreGainController};
use Manage\Expenses\Controllers\Login\{LoginController, LogoutController, RealizaLoginController};
use Manage\Expenses\Controllers\Register\{CreateRegisterController, RegisterController};

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
    '/new-bank'       => BankController::class,
    '/new-card'       => CardController::class,
    '/save-card'      => StoreCardController::class,
    '/save-bank'      => StoreBankController::class,
    '/save-gain'      => StoreGainController::class,
    '/save-expenses'  => StoreExpensesController::class,

    //// CREATE /////
    '/save-company'   => StoreCompanyController::class,
];