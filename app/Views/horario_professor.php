<?= $this->extend('master'); ?>

<?= $this->section('css'); ?>

<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

<?= $this->endSection() ?>

<?= $this->section('content'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row mb-4">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>Horário de Professor</h4>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav
                    aria-label="breadcrumb"
                    class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Horário</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Professor
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">

            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-3">

                    <!-- Formulário com select -->
                    <form class="d-flex align-items-center">
                        <select class="form-select me-2 w-auto" id="professor" name="id_professor">
                            <option></option>
                            <?php foreach ($professores as $professor): ?>
                                <option value="<?= $professor['id_usuario'] ?>"><?= $professor['nome'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </form>

                    <!-- Botão exportar PDF -->
                    <button class="btn btn-danger" id="exportarPDF">
                        Exportar para PDF
                    </button>
                </div>

                <div class="card shadow">
                    <div class="card-body">
                        <div id='calendar-wrap'>
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>

<?= $this->section('js'); ?>

<script src="<?= base_url('assets/js/script_professor.js') ?>"></script>
<script src="<?= base_url('assets/vendor/fullcalendar/index.global.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/fullcalendar/core/locales-all.global.min.js') ?>"></script>

<!-- textfit -->
<script src="<?= base_url('assets/textfit/js/textFit.min.js') ?>"></script>

<?= $this->endSection() ?>