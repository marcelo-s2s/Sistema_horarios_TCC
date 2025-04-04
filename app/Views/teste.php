<?= $this->extend('master'); ?>

<?= $this->section('css'); ?>
<style>
    /* Estiliza a manhã (01:00 - 07:00) */
    .fc-timegrid-slot[data-time^="01:00"],
    .fc-timegrid-slot[data-time^="02:00"],
    .fc-timegrid-slot[data-time^="03:00"],
    .fc-timegrid-slot[data-time^="04:00"],
    .fc-timegrid-slot[data-time^="05:00"],
    .fc-timegrid-slot[data-time^="06:00"] {
        background-color: rgba(255, 223, 186, 0.3);
        /* Laranja claro */
    }

    /* Estiliza a tarde (07:00 - 13:00) */
    .fc-timegrid-slot[data-time^="07:00"],
    .fc-timegrid-slot[data-time^="08:00"],
    .fc-timegrid-slot[data-time^="09:00"],
    .fc-timegrid-slot[data-time^="10:00"],
    .fc-timegrid-slot[data-time^="11:00"],
    .fc-timegrid-slot[data-time^="12:00"] {
        background-color: rgba(173, 216, 230, 0.3);
        /* Azul claro */
    }

    /* Estiliza a noite (13:00 - 18:00) */
    .fc-timegrid-slot[data-time^="13:00"],
    .fc-timegrid-slot[data-time^="14:00"],
    .fc-timegrid-slot[data-time^="15:00"],
    .fc-timegrid-slot[data-time^="16:00"],
    .fc-timegrid-slot[data-time^="17:00"] {
        background-color: rgba(203, 207, 209, 0.3);
        /* Cinza claro */
    }

    /* Adiciona bordas para separar períodos */
    .fc-timegrid-slot {
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    /* Adiciona uma sombra leve para diferenciar os períodos */
    .fc-timegrid-slot[data-time^="06:00"],
    .fc-timegrid-slot[data-time^="12:00"] {
        box-shadow: 0px 4px 0px rgba(0, 0, 0, 0.2);
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content'); ?>


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>Usuário</h4>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav
                    aria-label="breadcrumb"
                    class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Usuário</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Detalhes
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">

            <div id="calendars-container">
                <?php foreach ($horarios as $horario): ?>
                    <h4 class="text-center mb-3"><?= $horario['nome_turma'] ?></h4>
                    <div id="calendar-<?= $horario['id_horario_aula'] ?>" class="calendar-wrapper">
                        <!-- Cada container terá uma altura definida, por exemplo: -->
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
</script>

<script src="<?= base_url('assets/js/teste.js') ?>"></script>

<!-- FullCalendar -->
<script src="<?= base_url('assets/vendor/fullcalendar/index.global.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/fullcalendar/core/locales-all.global.min.js') ?>"></script>

<?= $this->endSection() ?>