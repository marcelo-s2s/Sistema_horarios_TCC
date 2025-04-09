<?= $this->extend('master'); ?>

<?= $this->section('content'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row mb-4">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>Horário de Aula</h4>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav
                    aria-label="breadcrumb"
                    class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Horário de Aula</a>
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
        </div>

    </section>
</div>

<?= $this->endSection() ?>