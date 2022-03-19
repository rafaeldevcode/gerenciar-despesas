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
                <i class="fa-solid fa-building-columns"></i>
            </div>

            <div class="title">
                <h1>Adicionar uma nova conta bancária</h1>
            </div>

            <?php require_once __DIR__ . '/../layouts/components/message.php' ?>

            <form action="/save-bank" method="POST" enctype="multipart/form-data">

                <div class="inputs-group down">
                    <input required class="input" type="text" name="name" id="name">
                    <label class="input-label" for="name">Nome do banco</label>
                    <span class="underline"></span>
                    <span class="error"></span>
                </div>

                <div class="inputs-group down">
                    <input required class="input" type="text" name="balance" id="balance">
                    <label class="input-label" for="balance">Saldo na conta</label>
                    <span class="underline"></span>
                    <span class="error"></span>
                </div>

                <div class="inputs-group down">
                    <input class="input" type="file" name="logo_bank" id="logo_bank">
                    <label class="input-label" for="logo_bank">Imagem do banco</label>
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