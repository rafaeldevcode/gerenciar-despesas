<?php use Controle\Contas\Services\Routers; ?>

<!DOCTYPE html>
<html lang="pt-br">
    <?php require_once __DIR__ . '../../layouts/components/head.php'; ?>
<body>

    <?php require_once __DIR__ . '../../layouts/components/header.php'; ?>

    <main class="content">
        <?php require_once __DIR__ . '../../layouts/components/menu-aside.php'; ?>

        <section class="section-form form-fluid">
            <div class="form-avatar">
                <i class="fa-solid fa-hand-holding-dollar"></i>
            </div>

            <div class="title">
                <h1>Adicionar um novo ganho</h1>
            </div>

            <?php require_once __DIR__ . '/../layouts/components/message.php' ?>

            <form action="/save-gain" method="POST">
                <div class="inputs-group down">
                    <select class="input" name="company" id="company">
                        <option value="defaut">Selecione uma empresa</option>
                        <option value="item-2">Item 2</option>
                        <option value="item-3">Item 3</option>
                        <option value="item-4">Item 4</option>
                    </select>
                    <span class="underline"></span>
                    <span class="error"></span>
                </div>

                <div class="inputs-group down">
                    <input required class="input" type="text" name="value" id="value">
                    <label class="input-label" for="value">Valor ganho</label>
                    <span class="underline"></span>
                    <span class="error"></span>
                </div>

                <div class="inputs-group down">
                    <select class="input" name="typeGain" id="typeGain">
                        <option value="defaut">Selecione o tipo de ganho</option>
                        <option value="Servicos">Serviços prestados</option>
                        <option value="Bonificacao">Bonificação</option>
                        <option value="Doacao">Doação</option>
                        <option value="Outros">Outros</option>
                    </select>
                    <span class="underline"></span>
                    <span class="error"></span>
                </div>

                <div class="inputs-group down">
                    <input class="input" type="file" name="receipt" id="receipt">
                    <label class="input-label" for="receipt">Imagem do comprovante</label>
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
        validSelect('comapny')
        validSelect('typeGain');
    </script>

</body>
</html>