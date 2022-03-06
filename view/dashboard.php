<?php use Controle\Contas\Services\Routers; ?>

<!DOCTYPE html>
<html lang="pt-br">
    <?php require_once __DIR__ . '/layouts/components/head.php'; ?>
<body>

    <?php require_once __DIR__ . '/layouts/components/header.php'; ?>

    <main class="content">
        <?php require_once __DIR__ . '/layouts/components/menu-aside.php'; ?>

        <section class="welcome">
            <h1>Bem Vindo! <?php echo $name; ?></h1>
        </section>

        <section class="emoji">
            <img src="<?php Routers::asset('assets/images/emoji-coffe.png') ?>" alt="Emoji Coffe">

            <div class="inputs-group-btn down">
                <a href="/new-expenses" class="inputs-btn secondary margin-auto" title="Adicionar nova despesa">Nova despesa</a>
            </div>
        </section>
    </main>

    <?php require_once __DIR__ . '/layouts/components/footer.php'; ?>

    <script type="text/javascript" src="https://kit.fontawesome.com/b0387bb217.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php Routers::asset('assets/js/funcoes.js') ?>"></script>

    <script type="text/javascript">
        oppenMenu();
    </script>
</body>
</html>