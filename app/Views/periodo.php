<?= $this->extend('master'); ?>

<?= $this->section('content'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>Período Letivo</h4>
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

                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="card-title"><?= isset($periodo) ? 'Atualizar' : 'Novo' ?> Período Letivo</h3>
                    </div>
                    <div class="card-body">

                        <?= form_open(url_to('salvarPeriodo'), ['role' => 'form']) ?>

                        <div class="form-body">

                            <div class="mb-3">
                                <label for="periodo" class="form-label">Período</label>
                                <input name="periodo" type="text" class="form-control" value="<?= $periodo['periodo'] ?? '' ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="ano" class="form-label">Ano</label>
                                <input name="ano" type="number" class="form-control" value="<?= $periodo['ano'] ?? '' ?>" required>
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
                        <h3 class="card-title">Todos os Períodos</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Período</th>
                                        <th>Ano</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($periodos as $periodo): ?>
                                        <tr class="<?= $periodo['ativo'] ? 'table-success' : '' ?>"> <!-- Destaque para o período ativo -->
                                            <td><?= esc($periodo['periodo']) ?></td>
                                            <td><?= esc($periodo['ano']) ?></td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="<?= url_to('editarPeriodo', esc($periodo['periodo'])) ?>" class="btn btn-warning btn-sm">
                                                        Editar
                                                    </a>
                                                    <a href="#" class="btn btn-danger btn-sm" onclick="confirmarDelecao('/periodo/deletar/<?= esc($periodo['periodo']) ?>')">
                                                        Deletar
                                                    </a>

                                                    <!-- Botão para ativar período -->
                                                    <?php if (!$periodo['ativo']): ?>
                                                        <a href="<?= url_to('ativarPeriodo', esc($periodo['periodo'])) ?>" class="btn btn-success btn-sm">
                                                            Ativar
                                                        </a>
                                                    <?php else: ?>
                                                        <!-- <span class="badge bg-success">Ativo</span> -->
                                                        <button class="btn btn-success btn-sm" disabled>Ativo</button>
                                                    <?php endif; ?>
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