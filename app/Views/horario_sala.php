<?= $this->extend('master'); ?>

<?= $this->section('css'); ?>

<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

<?= $this->endSection() ?>

<?= $this->section('content'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Horário de Sala</h3>
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
                            Sala
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
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

<?= $this->endSection() ?>

<?= $this->section('js'); ?>

<script src="<?= base_url('assets/js/script_sala.js') ?>"></script>
<script src="<?= base_url('assets/vendor/fullcalendar/index.global.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/fullcalendar/core/locales-all.global.min.js') ?>"></script>

<?= $this->endSection() ?>