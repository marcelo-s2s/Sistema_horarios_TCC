<?= $this->extend('master'); ?>

<?= $this->section('css'); ?>

<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

<?= $this->endSection() ?>

<?= $this->section('content'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>Horário de Aula</h4>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav
                    aria-label="breadcrumb"
                    class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= url_to('listaHorarioAula') ?>">Horário de Aula</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Editar
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
                <div id='external-events'>
                    <h4>Draggable Events</h4>

                    <div id='external-events-list'>

                        <?php foreach ($disciplinas as $disciplina): ?>

                            <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                                <div class='fc-event'
                                    data-color="<?= $disciplina['cor'] ?>"
                                    id-disciplina="<?= $disciplina['id_disciplina'] ?>"
                                    data-duration="<?= $disciplina['ch_semanal'] ?>"> <!-- Adiciona o campo de duração -->
                                    <div class='fc-event-title'><?= $disciplina['nome_disciplina'] ?></div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="row">
                    <form id="tools-form">

                        <div class="form-group">
                            <label for="turma">Turma</label>
                            <select class="form-control" id="turma" name="id_turma">
                                <?php foreach ($turmas as $turma): ?>
                                    <option value="<?= $turma['codigo_turma'] ?>"><?= $turma['nome_turma'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="ativo">Ativo</option>
                                <option value="inativo">Inativo</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="periodo_letivo">Período Letivo</label>
                            <input type="text" class="form-control" id="periodo_letivo" name="periodo_letivo" value="<?= esc($periodoAtivo['periodo'] ?? $periodoLetivo[0]) ?>" disabled>
                        </div>

                        <button type="button" id="save-events" class="btn btn-primary mt-3">Salvar Horários</button>
                    </form>
                </div>
            </div>

            <div class="offcanvas offcanvas-end" data-bs-backdrop="false" tabindex="-1" id="offcanvasDisciplina" aria-labelledby="offcanvasTitle">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNomeDisciplina">Nome</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body" id='contentDisciplinas'>
                    <form id="tools-disciplina">

                        <p><strong>Id da disciplina:</strong> <span id="idDisciplina"></span></p>
                        <p><strong>Inicio:</strong> <span id="eventDateStart"></span></p>
                        <p><strong>Fim:</strong> <span id="eventDateEnd"></span></p>

                        <div class="mb-3">
                            <label for="eventColor" class="form-label">Cor do Evento</label>
                            <input type="color" class="form-control form-control-color" id="eventColor" title="Escolha a cor do evento">
                        </div>
                        <!-- Formulário para opções -->
                        <div class="form-group">
                            <label for="sala">Sala</label>
                            <select class="form-control" id="sala" name="id_sala" display='none'>
                                <?php foreach ($salas as $sala): ?>
                                    <option value="<?= $sala['id_sala'] ?>"><?= $sala['nome_sala'] ?></option>
                                <?php endforeach; ?>
                                <option value="Sem sala">Sem sala</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="professor">Professor</label>
                            <select class="form-control" id="professor" name="id_professor">
                                <?php foreach ($professores as $professor): ?>
                                    <option value="<?= $professor['id_usuario'] ?>"><?= $professor['nome'] ?></option>
                                <?php endforeach; ?>
                                <option value="Sem professor">Sem professor</option>
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

<script src="<?= base_url('assets/js/javascript.js') ?>"></script>
<script src="<?= base_url('assets/vendor/fullcalendar/index.global.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/fullcalendar/core/locales-all.global.min.js') ?>"></script>

<script>
    const isEditing = <?= json_encode($editando ?? false) ?>; // Define a variável no JS
    const idHorarioAula = <?= json_encode($idHorarioAula ?? false) ?>;
    const salas = <?= json_encode($salas) ?>;
    const professores = <?= json_encode($professores) ?>;
</script>

<?= $this->endSection() ?>