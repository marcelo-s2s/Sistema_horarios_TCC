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
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body">
                        <div id='calendar-wrap'>
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
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

        <div class="modal fade text-left" id="modalSalvarHorario" tabindex="-1" role="dialog"
            aria-labelledby="modalSalvarHorarioLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modalSalvarHorarioLabel">Salvar Horário de Aula</h4>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Fechar">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form id="formSalvarHorario">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="turma" class="form-label">Turma</label>
                                <select class="form-control" id="turma" name="id_turma">
                                    <?php foreach ($turmas as $turma): ?>
                                        <option value="<?= $turma['codigo_turma'] ?>"><?= $turma['nome_turma'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="ativo">Ativo</option>
                                    <option value="inativo">Inativo</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="periodo_letivo" class="form-label">Período Letivo</label>
                                <input type="text" class="form-control" id="periodo_letivo" name="periodo_letivo" value="<?= esc($periodoAtivo['periodo'] ?? $periodoLetivo[0]) ?>" disabled>
                            </div>
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-light-secondar"
                                data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Cancelar</span>
                            </button>
                            <button type="button" class="btn btn-primary ms-1" id="salvarHorario"
                                data-bs-dismiss="modal">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Salvar</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="container-disciplinas" class="container-disciplinas card bg-white border-top shadow-sm py-2 px-3">
            <div class="d-flex align-items-start external-events" id="external-events">

                <!-- Lista de disciplinas com scroll horizontal -->
                <div id="external-events-list" class="external-events-list d-flex flex-nowrap gap-2 flex-grow-1">
                    <?php foreach ($disciplinas as $disciplina): ?>
                        <div class="fc-event card text-white mb-0"
                            style="background-color: <?= $disciplina['cor'] ?>; min-width: 150px;"
                            data-color="<?= $disciplina['cor'] ?>"
                            id-disciplina="<?= $disciplina['id_disciplina'] ?>"
                            data-nome="<?= esc($disciplina['nome_disciplina']) ?>"
                            data-duration="<?= $disciplina['ch_semanal'] ?>">
                            <div class="card-body p-2 text-center">
                                <strong><?= $disciplina['nome_disciplina'] ?></strong>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Área lateral fixa -->
                <div class="painel-lateral d-flex flex-column gap-2 ms-3 flex-shrink-0">
                    <input type="text" id="busca-disciplinas" class="form-control" placeholder="Buscar disciplina...">
                    <button id="exportarPDF" class="btn btn-secondary w-100">Gerar PDF</button>
                    <button id="abrirModel" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#modalSalvarHorario">
                        Salvar
                    </button>
                </div>
            </div>

            <!-- Área de exclusão visível apenas durante o drag -->
            <div id="area-remocao" class="area-remocao text-center text-white d-none">
                <strong>Solte a disciplina aqui para remover</strong>
            </div>
        </div>


    </section>
</div>

<?= $this->endSection() ?>

<?= $this->section('js'); ?>

<!-- JavaScript personalizado -->
<script src="<?= base_url('assets/js/javascript.js') ?>"></script>

<!-- Script para buscar disciplinas -->
<script src="<?= base_url('assets/js/buscar_disciplina.js') ?>"></script>

<!-- FullCalendar -->
<script src="<?= base_url('assets/vendor/fullcalendar/index.global.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/fullcalendar/core/locales-all.global.min.js') ?>"></script>

<!-- textfit -->
<script src="<?= base_url('assets/textfit/js/textFit.min.js') ?>"></script>

<script>
    const isEditing = <?= json_encode($editando ?? false) ?>;
    const idHorarioAula = <?= json_encode($idHorarioAula ?? false) ?>;
    const salas = <?= json_encode($salas) ?>;
    const professores = <?= json_encode($professores) ?>;
</script>

<?= $this->endSection() ?>