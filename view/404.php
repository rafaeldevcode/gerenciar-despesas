<?php 
    use Controle\Contas\Services\Routers;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php require_once __DIR__ . '/layouts/components/head.php'; ?>
</head>
<body>

    <?php require_once __DIR__ . '/layouts/components/header.php'; ?>

    <main class="content">
        <?php require_once __DIR__ . '/layouts/components/menu-aside.php'; ?>

        <section class="welcome">
            <h1>Desculpe, mas não encontramos a página que você está procurando</h1>
        </section>

        <section class="emoji">
            <img src="<?php Routers::asset('assets/images/emoji-404.png') ?>" alt="Página não encontrada">
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