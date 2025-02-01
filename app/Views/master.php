<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Usuário</title>
    <!-- <title><?= $title ?? 'Sistema de horários' ?></title> -->

    <link rel="stylesheet" href="<?= base_url('assets/datatables/css/dataTables.bootstrap5.min.css') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/datatables/css/datatables.css') ?>">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">

    <!-- DataTables -->
    <!-- <link rel="stylesheet" href="<?= base_url('/assets/css/teste/dataTables.bootstrap.min.css') ?>"> -->

    <!-- Mazer -->
    <link rel="stylesheet" href="<?= base_url('assets/mazer/css/app.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/mazer/css/app-dark.css'); ?>">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css'); ?>">

    <!-- Toastify -->
    <link rel="stylesheet" href="<?= base_url('assets/mazer/css/toastify.css') ?>">


    <?= $this->renderSection('css') ?>
</head>

<body>

    <div id="app">

        <?php
        $user = auth()->user();
        $sidebar = 'layouts/sidebar'; // Padrão para usuários comuns

        // Verifica se o usuário está logado e é administrador
        if ($user !== null && $user->inGroup('admin')) {
            $sidebar = 'layouts/sidebar_admin'; // Se for admin, muda para a sidebar de admin
        }
        ?>

        <?= $this->include($sidebar) ?>

        <div id="main">

            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="fa-solid fa-bars"></i>
                </a>
            </header>

            <?= $this->renderSection('content') ?>

        </div>
    </div>

    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2021 &copy; Mazer</p>
            </div>
            <div class="float-end">
                <p>
                    Crafted with
                    <span class="text-danger"><i class="bi bi-heart"></i></span> by
                    <a href="https://saugi.me">Saugi</a>
                </p>
            </div>
        </div>
    </footer>

    <?= $this->renderSection('js') ?>

    <script>
        // Incorporar os dados da flashdata em uma variável JS
        const flashdata = {
            success: <?= json_encode(session()->getFlashdata('success')); ?>,
            error: <?= json_encode(session()->getFlashdata('error')); ?>
        };
    </script>

    <!-- Alterna entre tema escuro e claro -->
    <script src="<?= base_url('assets/mazer/js/initTheme.js') ?>"></script>

    <!-- Tema Mazer -->
    <script src="<?= base_url('assets/mazer/js/app.js') ?>"></script>
    <script src="<?= base_url('assets/mazer/js/bootstrap.js') ?>"></script>

    <script src="<?= base_url('/assets/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- <script src="<?= base_url('/assets/js/bootstrap5/index.global.min.js') ?>"></script> -->

    <!-- JQuerry -->
    <!-- Bib necessária para o funcionamento de Datatables -->
    <script src="<?= base_url('assets/jquerry/js/jquery.min.js') ?>"></script>

    <!-- DataTables -->
    <script src="<?= base_url('assets/datatables/js/datatables.min.js') ?>"></script>

    <!-- Configuração local de DataTables -->
    <script src="<?= base_url('assets/datatables/js/datatables.js') ?>"></script>

    <!-- Toastify -->
    <script src="<?= base_url('assets/js/toastify.js') ?>"></script>
    <script src="<?= base_url('assets/mazer/js/toastify.js') ?>"></script>

</body>

</html>