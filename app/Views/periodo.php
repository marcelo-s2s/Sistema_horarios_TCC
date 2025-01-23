<?= $this->extend('master'); ?>

<?php helper('form'); ?>

<?= $this->section('content'); ?>


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Período Letivo</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav
                    aria-label="breadcrumb"
                    class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Período Letivo</a>
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

            <div class="col-md-4">

                <?php if ($alerta = session()->getFlashdata('alerta')): ?>
                    <div class="alert alert-<?= esc($alerta['tipo']) ?> alert-dismissible fade show" role="alert">
                        <strong><?= ucfirst($alerta['titulo']) ?>:</strong> <?= esc($alerta['mensagem']) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h4 class="card-title"><?= isset($periodo) ? 'Atualizar' : 'Novo' ?> Período</h4>

                            <?= form_open(url_to('salvarDisciplina'), ['role' => 'form']) ?>

                            <div class="form-body">

                                <?= isset($periodo) ? "
                                        <div class='mb-3'>
                                            <label for='id_disciplina' class='form-label'>ID</label>
                                            <input name='id_disciplina' type='text' class='form-control' value='" . esc($periodo['id_disciplina']) . "' readonly>
                                        </div>" : "" ?>

                                <div class="mb-3">
                                    <label for="nome_disciplina" class="form-label">Nome</label>
                                    <input name="nome_disciplina" type="text" class="form-control" value="<?= $periodo['nome_disciplina'] ?? '' ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="carga_horaria" class="form-label">Carga Horária</label>
                                    <input name="carga_horaria" type="number" class="form-control" value="<?= $periodo['carga_horaria'] ?? '' ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nivel_ensino" class="form-label">Nível de Ensino</label>
                                    <input name="nivel_ensino" type="text" class="form-control" value="<?= $periodo['nivel_ensino'] ?? '' ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tipo" class="form-label">Tipo de Disciplina</label>
                                    <select name="tipo" class="form-select">
                                        <option value="semestral" <?= (isset($periodo) && $periodo['tipo'] === 'semestral') ? 'selected' : '' ?>>Semestral</option>
                                        <option value="anual" <?= (isset($periodo) && $periodo['tipo'] === 'anual') ? 'selected' : '' ?>>Anual</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="ch_semanal" class="form-label">CH Semanal</label>
                                    <input name="ch_semanal" type="number" class="form-control" value="<?= $periodo['ch_semanal'] ?? '' ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="cor" class="form-label">Cor do Evento</label>
                                    <input type="color" name="cor" class="form-control form-control-color" id="cor" title="Escolha a cor do evento" value="<?= $periodo['cor'] ?? '' ?>" required>
                                </div>

                            </div>
                            <div class="form-actions d-flex justify-content-end">

                                <button type="submit" class="btn btn-primary">Salvar</button>

                            </div>

                            <?= form_close() ?>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabela de registros -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Todas as Disciplinas</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Carga Horária</th>
                                        <th>Nível de Ensino</th>
                                        <th>Tipo de Disciplina</th>
                                        <th>CH Semanal</th>
                                        <th>Cor</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($periodos as $periodo): ?>
                                        <tr>
                                            <td><?= esc($periodo['id_disciplina']) ?></td>
                                            <td><?= esc($periodo['nome_disciplina']) ?></td>
                                            <td><?= esc($periodo['carga_horaria']) ?></td>
                                            <td><?= esc($periodo['nivel_ensino']) ?></td>
                                            <td><?= esc($periodo['tipo']) ?></td>
                                            <td><?= esc($periodo['ch_semanal']) ?></td>
                                            <td>
                                                <div style="background-color: <?= esc($periodo['cor']) ?>; width: 20px; height: 20px; border-radius: 50%;"></div>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="<?= url_to('editarDisciplina', esc($periodo['id_disciplina'])) ?>" class="btn btn-warning btn-sm">Editar</a>
                                                    <a href="<?= url_to('deletarDisciplina', esc($periodo['id_disciplina'])) ?>" class="btn btn-danger btn-sm">Deletar</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?= $this->endSection() ?>