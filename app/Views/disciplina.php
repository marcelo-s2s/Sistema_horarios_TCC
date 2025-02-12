<?= $this->extend('master'); ?>

<?= $this->section('css'); ?>

<style>
    #cor {
        width: 100px;
    }
</style>

<?= $this->endSection() ?>

<?= $this->section('content'); ?>


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>Disciplina</h4>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav
                    aria-label="breadcrumb"
                    class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Disciplina</a>
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

                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="card-title"><?= isset($disciplina) ? 'Atualizar' : 'Nova' ?> Disciplina</h3>
                    </div>
                    <div class="card-body">

                        <?= form_open(url_to('salvarDisciplina'), ['role' => 'form']) ?>

                        <div class="form-body">

                            <?= isset($disciplina) ? "
                                <div class='mb-3'>
                                    <label for='id_disciplina' class='form-label'>ID</label>
                                    <input name='id_disciplina' type='text' class='form-control' value='" . esc($disciplina['id_disciplina']) . "' readonly>
                                </div>" : "" ?>

                            <div class="mb-3">
                                <label for="nome_disciplina" class="form-label">Nome</label>
                                <input name="nome_disciplina" type="text" class="form-control" value="<?= $disciplina['nome_disciplina'] ?? '' ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="carga_horaria" class="form-label">Carga Horária</label>
                                <input name="carga_horaria" type="number" class="form-control" value="<?= $disciplina['carga_horaria'] ?? '' ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="nivel_ensino" class="form-label">Nível de Ensino</label>
                                <input name="nivel_ensino" type="text" class="form-control" value="<?= $disciplina['nivel_ensino'] ?? '' ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="tipo" class="form-label">Tipo de Disciplina</label>
                                <select name="tipo" class="form-select">
                                    <option value="semestral" <?= (isset($disciplina) && $disciplina['tipo'] === 'semestral') ? 'selected' : '' ?>>Semestral</option>
                                    <option value="anual" <?= (isset($disciplina) && $disciplina['tipo'] === 'anual') ? 'selected' : '' ?>>Anual</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="ch_semanal" class="form-label">CH Semanal</label>
                                <input name="ch_semanal" type="number" class="form-control" value="<?= $disciplina['ch_semanal'] ?? '' ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="cor" class="form-label">Cor do Evento</label>
                                <input type="color" name="cor" class="form-control form-control-color" id="cor" title="Escolha a cor do evento" value="<?= $disciplina['cor'] ?? '' ?>" required>
                            </div>

                        </div>
                        <div class="form-actions d-flex justify-content-end">

                            <button type="submit" class="btn btn-primary">Salvar</button>

                        </div>

                        <?= form_close() ?>
                    </div>
                </div>
            </div>

            <!-- Tabela de registros -->
            <div class="col-md-8">
                <div class="card shadow">
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
                                    <?php foreach ($disciplinas as $disciplina): ?>
                                        <tr>
                                            <td><?= esc($disciplina['id_disciplina']) ?></td>
                                            <td><?= esc($disciplina['nome_disciplina']) ?></td>
                                            <td><?= esc($disciplina['carga_horaria']) ?></td>
                                            <td><?= esc($disciplina['nivel_ensino']) ?></td>
                                            <td><?= esc($disciplina['tipo']) ?></td>
                                            <td><?= esc($disciplina['ch_semanal']) ?></td>
                                            <td>
                                                <div style="background-color: <?= esc($disciplina['cor']) ?>; width: 20px; height: 20px; border-radius: 50%;"></div>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="<?= url_to('editarDisciplina', esc($disciplina['id_disciplina'])) ?>" class="btn btn-warning btn-sm">Editar</a>
                                                    <a href="#" class="btn btn-danger btn-sm"
                                                        onclick="confirmarDelecao('/disciplina/deletar/<?= esc($disciplina['id_disciplina']) ?>')">Deletar</a>
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