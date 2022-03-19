<?php use Manage\Expenses\Services\Routers; ?>

<!DOCTYPE html>
<html lang="pt-br">
    <?php require_once __DIR__ . '../../layouts/components/head.php'; ?>
<body>

    <?php require_once __DIR__ . '../../layouts/components/header.php'; ?>

    <main class="content">
        <?php require_once __DIR__ . '../../layouts/components/menu-aside.php'; ?>

        <section class="section-form form-fluid">
            <div class="form-avatar">
                <i class="fa-solid fa-credit-card"></i>
            </div>

            <div class="title">
                <h1>Adicionar um novo cartão</h1>
            </div>

            <?php require_once __DIR__ . '/../layouts/components/message.php' ?>

            <form action="/save-card" method="POST">

                <div class="inputs-group down">
                    <input required class="input" type="text" name="name" id="name">
                    <label class="input-label" for="name">Nome do cartão</label>
                    <span class="underline"></span>
                    <span class="error"></span>
                </div>

                <div class="inputs-group down">
                    <input required class="input" type="text" name="limit" id="limit">
                    <label class="input-label" for="limit">Limite do cartão</label>
                    <span class="underline"></span>
                    <span class="error"></span>
                </div>

                <div class="inputs-group-btn left down">
                    <input class="inputs-btn" title="Salvar Dados" type="submit" value="Salvar">
                </div>
            </form>
        </section>
    </main>

    <?php require_once __DIR__ . '../../layouts/components/footer.php'; ?>

    <script type="text/javascript" src="https://kit.fontawesome.com/b0387bb217.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php Routers::asset('assets/js/funcoes.js') ?>"></script>

    <script type="text/javascript">
        oppenMenu();
        getFields();
    </script>

</body>
</html>