<?php use Controle\Contas\Services\Routers; ?>

<header class="header">
    <section class="body-header">
        <span class="logo-header">
            <img src="<?php Routers::asset('assets/images/logo.png') ?>" alt="Logo">
        </span>

        <?php
            if(isset($_SESSION['logged'])):  require_once __DIR__ . '/menu.php'; endif
        ?>
    </section>
</header>