<?= $this->extend('master'); ?>

<?= $this->section('css'); ?>

<!-- CSS personalizado -->
<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

<?= $this->endSection() ?>

<?= $this->section('content'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>Relatório</h4>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav
                    aria-label="breadcrumb"
                    class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/logout">Logout</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Visão Geral
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="row">

            <div class="col-6 col-lg-3 col-md-6">
                <div class="card shadow">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div
                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <div class="stats-icon purple mb-2">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">
                                    Usuários
                                </h6>
                                <h6 class="font-extrabold mb-0"><?= $totalRegistros['totalUsuarios'] ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3 col-md-6">
                <div class="card shadow">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div
                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <div class="stats-icon green mb-2">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">
                                    Turmas
                                </h6>
                                <h6 class="font-extrabold mb-0"><?= $totalRegistros['totalTurmas'] ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3 col-md-6">
                <div class="card shadow">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div
                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <div class="stats-icon red mb-2">
                                    <i class="fa-solid fa-book"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">
                                    Disciplinas
                                </h6>
                                <h6 class="font-extrabold mb-0"><?= $totalRegistros['totalDisciplinas'] ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3 col-md-6">
                <div class="card shadow">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div
                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <div class="stats-icon blue mb-2">
                                    <i class="fa-solid fa-chalkboard"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">
                                    Salas
                                </h6>
                                <h6 class="font-extrabold mb-0"><?= $totalRegistros['totalSalas'] ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-3">

                    <?= form_open(url_to('index'), ['role' => 'form']) ?>

                    <!-- Filtro de horários -->
                    <div class="mb-3">
                        <label for="filtroHorarios" class="form-label me-2">Filtrar por turmas:</label>
                        <select id="filtroHorarios" name="turmas[]" class="form-select d-inline-block w-auto" multiple size="5">
                            <?php foreach ($horarios as $horario): ?>
                                <option value="<?= $horario['codigo_turma'] ?>"><?= $horario['nome_turma'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" class="btn btn-outline-primary btn-sm p-1" title="Filtrar">
                            <i class="bi bi-funnel-fill"></i>
                        </button>
                        <small class="form-text text-muted">Segure Ctrl para selecionar várias turmas.</small>
                    </div>
                    <?= form_close() ?>


                    <!-- Botão exportar PDF -->
                    <button class="btn btn-danger" id="exportarPDF">
                        Exportar para PDF
                    </button>
                </div>

                <div id="calendars-container">
                    <?php foreach ($horarios as $horario): ?>
                        <div class="card shadow turma-card">
                            <div class="card-body">
                                <h4 class="text-center mb-3"><?= $horario['nome_turma'] ?></h4>
                                <div id="calendar-<?= $horario['id_horario_aula'] ?>" class="calendar-wrapper" data-turma-id="<?= $horario['id_horario_aula'] ?>"></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
    </section>

</div>

<?= $this->endSection() ?>

<?= $this->section('js'); ?>

<script>
    const horarios = <?= json_encode($horarios) ?>;
    const salas = <?= json_encode($salas) ?>;
    const professores = <?= json_encode($professores) ?>;
</script>

<script src="<?= base_url('assets/js/todos_horarios.js') ?>"></script>

<!-- FullCalendar -->
<script src="<?= base_url('assets/vendor/fullcalendar/index.global.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/fullcalendar/core/locales-all.global.min.js') ?>"></script>

<!-- textfit -->
<script src="<?= base_url('assets/textfit/js/textFit.min.js') ?>"></script>

<?= $this->endSection() ?>