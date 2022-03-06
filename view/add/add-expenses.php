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
                <i class="fa-solid fa-file-invoice-dollar"></i>
            </div>

            <div class="title">
                <h1>Adicionar uma nova despesa</h1>
            </div>

            <?php require_once __DIR__ . '/../layouts/components/message.php' ?>

            <form action="/salvar-despesa" method="POST">

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
                    <input required class="input" type="text" name="name" id="name">
                    <label class="input-label" for="name">Nome para esta despesa</label>
                    <span class="underline"></span>
                    <span class="error"></span>
                </div>

                <div class="inputs-group down">
                    <input required class="input" type="text" name="value" id="value">
                    <label class="input-label" for="value">Valor da despesa</label>
                    <span class="underline"></span>
                    <span class="error"></span>
                </div>

                <div class="inputs-group down">
                    <select class="input" name="month" id="month">
                        <option value="defaut">Selecione o mês da despesa</option>
                        <option value="Janeiro">Janeiro</option>
                        <option value="Fevereiro">Fevereiro</option>
                        <option value="Marco">Marco</option>
                        <option value="Abril">Abril</option>
                        <option value="Maio">Maio</option>
                        <option value="Junho">Junho</option>
                        <option value="Julho">Julho</option>
                        <option value="Agosto">Agosto</option>
                        <option value="Setembro">Setembro</option>
                        <option value="Outubro">Outubro</option>
                        <option value="Novembro">Novembro</option>
                        <option value="Dezembro">Dezembro</option>
                    </select>
                    <span class="underline"></span>
                    <span class="error"></span>
                </div>

                <div class="inputs-group down">
                    <select class="input" name="typeExpenses" id="typeExpenses">
                        <option value="defaut">Selecione o tipo de depsesas</option>
                        <option value="Lazer">Lazer</option>
                        <option value="Saude">Saúde</option>
                        <option value="Educacao">Educação</option>
                        <option value="Bens">Aquisição de bens</option>
                        <option value="Outros">Outros</option>
                    </select>
                    <span class="underline"></span>
                    <span class="error"></span>
                </div>

                <div class="inputs-group down">
                    <input required class="input" type="number" name="year" id="year" maxlength="4">
                    <label class="input-label" for="year">Ano da despesa</label>
                    <span class="underline"></span>
                    <span class="error"></span>
                </div>

                <div class="inputs-group down">
                    <input class="input" type="file" name="tax-coupon" id="tax-coupon">
                    <label class="input-label" for="tax-coupon">Imagem do cupom fiscal</label>
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
        validSelect('company');
        validSelect('month');
        validSelect('typeExpenses');
    </script>

</body>
</html>