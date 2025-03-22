<?= $this->extend('master'); ?>

<?= $this->section('content'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>Sala</h4>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav
                    aria-label="breadcrumb"
                    class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Sala</a>
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
                        <h3 class="card-title"><?= isset($sala) ? 'Atualizar' : 'Nova' ?> Sala</h3>
                    </div>

                    <div class="card-body">
                        <?= form_open(url_to('salvarSala'), ['role' => 'form']) ?>

                        <div class="form-body">
                            <?= isset($sala) ? "
                                <div class='mb-3'> 
                                    <label class='form-label'>ID</label> 
                                    <input name='id_sala' type='text' class='form-control' value='" . esc($sala['id_sala']) . "' readonly> 
                                </div>" : ""?>

                            <div class="mb-3">
                                <label class="form-label">Nome</label>
                                <input name="nome_sala" type="text" class="form-control" value="<?= $sala['nome_sala'] ?? '' ?>" required>
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
                        <h3 class="card-title">Todas as Salas</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($salas as $sala): ?>
                                        <tr>
                                            <td><?= esc($sala['nome_sala']) ?></td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="<?= url_to('editarSala', esc($sala['id_sala'])) ?>" class="btn btn-warning btn-sm">Editar</a>
                                                    <a href="#" class="btn btn-danger btn-sm"
                                                        onclick="confirmarDelecao('/sala/deletar/<?= esc($sala['id_sala']) ?>')">Deletar</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="<?= url_to('horarioSala') ?>" class="btn btn-primary">Ver Horários de Sala</a>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>