<?php use Controle\Contas\Services\Routers; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php require_once __DIR__ . '/layouts/components/head.php'; ?>
</head>
<body>

    <?php require_once __DIR__ . '/layouts/components/header.php'; ?>

    <main class="content">
        <section class="welcome">
            <h1>Desculpe, mas para continuar você precisa fazer login!</h1>
        </section>

        <section class="emoji">
            <img src="<?php Routers::asset('assets/images/emoji-login.png') ?>" alt="Ir para página de login">

            <div class="inputs-group-btn down">
                <a href="/login" class="inputs-btn secondary margin-auto" title="Ir para login">Fazer login</a>
            </div>
        </section>
    </main>

    <?php require_once __DIR__ . '/layouts/components/footer.php'; ?>

    <script type="text/javascript" src="https://kit.fontawesome.com/b0387bb217.js" crossorigin="anonymous"></script>
</body>
</html>