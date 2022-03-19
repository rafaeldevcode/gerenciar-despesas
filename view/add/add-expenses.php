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
                <i class="fa-solid fa-file-invoice-dollar"></i>
            </div>

            <div class="title">
                <h1>Adicionar uma nova despesa</h1>
            </div>

            <?php require_once __DIR__ . '/../layouts/components/message.php' ?>

            <form action="/save-expenses" method="POST">

                <div class="inputs-group down">
                    <select class="input" name="company" id="company">
                        <option value="defaut">Selecione uma empresa</option>

                        <?php
                            foreach($company as $item){ ?>
                                <option value="<?php echo $item->getId() ?>"><?php echo $item->getName() ?></option>
                            <?php }
                        ?>
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
                    <input required class="input" type="text" name="value_gain" id="value_gain">
                    <label class="input-label" for="value_gain">Valor da despesa</label>
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
                    <input required class="input" type="number" name="year" id="year" maxlength="4">
                    <label class="input-label" for="year">Ano da despesa</label>
                    <span class="underline"></span>
                    <span class="error"></span>
                </div>

                <div class="inputs-group down">
                    <select class="input" name="type_expenses" id="type_expenses">
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

                <div class="inputs-group-radio down">
                    <div>
                        <label for="payment_credit">Crédito</label>
                        <input checked type="radio" id="payment_credit" name="form_payment" value="credit">
                    </div>

                    <div>
                        <label for="payment_debit">Débito</label>
                        <input type="radio" id="payment_debit" name="form_payment" value="debit">
                    </div>
                </div>

                <div class="inputs-group hidden-select down">
                    <select class="input" name="payment_credit" id="payment_credit">
                        <option value="cartao_1">Cartão 1</option>
                        <option value="cartao_2">Cartão 2</option>
                        <option value="cartao_3">Cartão 3</option>
                        <option value="cartao_4">Cartão 4</option>
                    </select>
                    <span class="underline"></span>
                    <span class="error"></span>
                </div>

                <div class="inputs-group down">
                    <select class="input" name="payment_debit" id="payment_debit">
                        <option value="cartao_1">Banco 1</option>
                        <option value="cartao_2">Banco 2</option>
                        <option value="cartao_3">Banco 3</option>
                        <option value="cartao_4">Banco 4</option>
                    </select>
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
        validSelect('type_expenses');
    </script>

</body>
</html>