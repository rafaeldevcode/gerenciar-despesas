<?php use Manage\Expenses\Services\Routers; ?>

<header class="header">
    <section class="body-header">
        <span class="logo-header">
            <a title="Tela principal" href="/dashboard">
                <img src="<?php Routers::asset('assets/images/logo.png') ?>" alt="Logo">
            </a>
        </span>

        <?php require_once __DIR__ . '/menu.php';?>
    </section>
</header>