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
                    <input required class="input" type="text" name="value_gain" id="value_gain">
                    <label class="input-label" for="value_gain">Valor ganho</label>
                    <span class="underline"></span>
                    <span class="error"></span>
                </div>

                <div class="inputs-group down">
                    <select class="input" name="type_gain" id="type_gain">
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
                    <input class="input" type="file" name="receipt_gain" id="receipt_gain">
                    <label class="input-label" for="receipt_gain">Imagem do comprovante</label>
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
        validSelect('type_gain');
    </script>

</body>
</html>