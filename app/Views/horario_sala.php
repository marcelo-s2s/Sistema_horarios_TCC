<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Turma</title>
    <link rel="icon" href="../img/favicon2.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->

    <link rel="stylesheet" href="<?= base_url('/assets/css/bootstrap.min.css') ?>">
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="<?= base_url('/assets/css/teste/font-awesome.min.css') ?>"> -->
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('/assets/css/teste/ionicons.min.css') ?>">

    <!-- <link rel="stylesheet" href="<?= base_url('/assets/css/teste/daterangepicker.css') ?>"> -->

    <link rel="stylesheet" href="<?= base_url('/assets/css/teste/dataTables.bootstrap.min.css') ?>">
    <!-- bootstrap datepicker -->
    <!-- <link rel="stylesheet" href="<?= base_url('/assets/css/teste/bootstrap-datepicker.min.css') ?>"> -->

    <link rel="stylesheet" href="<?= base_url('/assets/css/teste/select2.min.css') ?>">
    <!-- Theme style -->

    <link rel="stylesheet" href="<?= base_url('/assets/css/teste/AdminLTE.min.css') ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url('/assets/css/teste/_all-skins.min.css') ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

</head>

<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">

        <?php
        // Inclui o cabeçalho e a barra lateral
        echo view('layouts/header');
        echo view('layouts/sidebar');
        ?>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Horário de Aula <small>Editar</small></h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Horário de Aula</a></li>
                    <li class="active">Editar</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <div class="col-md-10">
                        <div id='calendar-wrap'>
                            <div id='calendar'></div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="row">
                            <form id="tools-form">

                                <div class="form-group">
                                    <label for="sala">Sala</label>
                                    <select class="form-control" id="sala" name="id_sala">
                                        <option value="" selected disabled>Selecione uma sala</option> <!-- Opção padrão -->
                                        <?php foreach ($salas as $sala): ?>
                                            <option value="<?= $sala['id_sala'] ?>"><?= $sala['nome_sala'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </div>

    <script src="<?= base_url('assets/js/script_sala.js') ?>"></script>

    <script src="<?= base_url('assets/vendor/fullcalendar/index.global.min.js') ?>"></script>

    <script src="<?= base_url('assets/vendor/fullcalendar/core/locales-all.global.min.js') ?>"></script>

    <script src="<?= base_url('/assets/js/bootstrap.bundle.min.js') ?>"></script>

    <script src="<?= base_url('/assets/js/bootstrap5/index.global.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('/assets/css/teste/adminlte.min.js') ?>"></script>

</body>

</html>