<?= $this->extend('master'); ?>

<?= $this->section('content'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>Turma</h4>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav
                    aria-label="breadcrumb"
                    class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Turma</a>
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
            <!-- Formulário de inserção ou atualização -->
            <div class="col-md-4">

                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="card-title"><?= isset($turma) ? 'Atualizar' : 'Nova' ?> Turma</h3>
                    </div>

                    <div class="card-body">
                        <?= form_open(url_to('salvarTurma'), ['role' => 'form']) ?>

                        <div class="form-body">
                            <div class="mb-3">
                                <label class="form-label">Código</label>
                                <input name="codigo_turma" type="text" class="form-control" value="<?= $turma['codigo_turma'] ?? '' ?>" required>
                                <input type="hidden" name="codigo_turma_original" value="<?= $turma['codigo_turma'] ?? '' ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nome</label>
                                <input name="nome_turma" type="text" class="form-control" value="<?= $turma['nome_turma'] ?? '' ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nível de ensino</label>
                                <input name="nivel_ensino" type="text" class="form-control" value="<?= $turma['nivel_ensino'] ?? '' ?>" required>
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
                        <h3 class="card-title">Todas as Turmas</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nome</th>
                                        <th>Nível de Ensino</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($turmas as $turma): ?>
                                        <tr>
                                            <td><?= esc($turma['codigo_turma']) ?></td>
                                            <td><?= esc($turma['nome_turma']) ?></td>
                                            <td><?= esc($turma['nivel_ensino']) ?></td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="<?= url_to('editarTurma', esc($turma['codigo_turma'])) ?>" class="btn btn-warning btn-sm">Editar</a>
                                                    <a href="#" class="btn btn-danger btn-sm"
                                                        onclick="confirmarDelecao('/turma/deletar/<?= esc($turma['codigo_turma']) ?>')">Deletar</a>
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