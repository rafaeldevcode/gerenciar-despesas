<?php use Painel\Services\Routers; ?>

<!DOCTYPE html>
<html lang="pt-br">
    <?php require_once __DIR__ . '/layouts/components/head.php'; ?>
<body>

    <?php require_once __DIR__ . '/layouts/components/header.php'; ?>

    <main class="content">
        <section class="welcome">
            <h1>Bem Vindo! <?php echo $name; ?></h1>
        </section>

        <section class="emoji">
            <img src="<?php Routers::asset('assets/images/emoji-coffe.png') ?>" alt="Emoji Coffe">
        </section>
    </main>

    <?php require_once __DIR__ . '/layouts/components/footer.php'; ?>

    <script type="text/javascript" src="https://kit.fontawesome.com/b0387bb217.js" crossorigin="anonymous"></script>
</body>
</html>