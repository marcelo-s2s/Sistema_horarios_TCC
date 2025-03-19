<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?? 'Sistema de horários' ?></title>

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

    <!-- SweetAlert -->
    <link rel="stylesheet" href="<?= base_url('assets/mazer/css/sweetalert2.min.css') ?>">


    <?= $this->renderSection('css') ?>

    <style>
        /* Splash screen ocupa a tela toda */
        #splash-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        /* Esconde o conteúdo até que a página carregue */
        #main-content {
            display: none;
        }
        
    </style>
</head>

<body>

    <!-- Splash Screen -->
    <div id="splash-screen">
        <div class="spinner-border text-success" role="status">
            <span class="visually-hidden">Carregando...</span>
        </div>
        <h2 class="mt-3 text-success">Carregando...</h2>
    </div>

    <div id="app" class="hidden">

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
                <p>2024 &copy; Mazer</p>
            </div>
            <div class="float-end">
                <p>
                    Criado por Marcelo
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

        // Aguarda o carregamento da página
        window.addEventListener("load", function() {
            setTimeout(() => {
                document.getElementById("splash-screen").style.display = "none"; // Esconde splash
                document.getElementById("main-content").style.display = "block"; // Mostra conteúdo
            }, 1); // Pequeno delay para suavizar a transição
        });
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

    <!-- SweetAlert -->
    <script src="<?= base_url('assets/mazer/js/sweetalert2.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/sweetalert2.js') ?>"></script>

    <!-- Certifique-se de incluir as bibliotecas no seu HTML -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

</body>

</html>