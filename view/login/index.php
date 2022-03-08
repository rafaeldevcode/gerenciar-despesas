<?php use Manage\Expenses\Services\Routers; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php require_once __DIR__ . '/../layouts/components/head.php'; ?>
</head>
<body>

    <?php require_once __DIR__ . '/../layouts/components/header.php'; ?>

    <main class="content">
        <?php require_once __DIR__ . '/../layouts/components/menu-aside.php'; ?>

        <section class="section-form">
            <div class="form-avatar">
                <i class="fa-solid fa-user-lock" id="avatar"></i>
                <!-- <i class="fa-solid fa-user-unlock"></i> -->
            </div>

            <?php require_once __DIR__ . '/../layouts/components/message.php' ?>

            <form action="/login-to" method="POST">
                <div class="inputs-group down">
                    <input required class="input" type="email" name="email" id="email">
                    <label class="input-label" for="email">Email</label>
                    <span class="underline"></span>
                    <span class="error"></span>
                </div>

                <div class="inputs-group down">
                    <input required class="input" type="password" name="password" id="password" autocomplete="FALSE">
                    <label class="input-label" for="password">Password</label>
                    <span class="underline"></span>
                    <span class="error"></span>

                    <button type="button" title="Ver Senha" class="btn-eyes" id="btn-eyes">
                        <i class="fa-solid fa-eye" id="eyes"></i>
                    </button>
                </div>

                <div class="inputs-group-btn down">
                    <span>
                        <input class="input-check" type="checkbox" id="remember" name="remember">
                        <label class="label-check" for="remember">Lembre-me</label>
                    </span>

                    <input class="inputs-btn" title="Fazer Login" type="submit" value="Logar">
                </div>
            </form>

            <span class="link-group">
                <a href="#">Esqueci minha senha</a>
                <a href="/register">Registrar</a>
            </span>
        </section>
    </main>

    <?php require_once __DIR__ . '/../layouts/components/footer.php'; ?>

    <script type="text/javascript" src="https://kit.fontawesome.com/b0387bb217.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php Routers::asset('assets/js/funcoes.js') ?>"></script>

    <script type="text/javascript">
        oppenMenu();
        exibirPass();
        getFields();
    </script>
</body>
</html>