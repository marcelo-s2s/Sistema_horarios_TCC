<?= $this->extend('master'); ?>

<?php helper('form'); ?>

<?= $this->section('content'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Horário de Aula</h3>
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
            <!-- Tabela de registros -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Todos os Horários de Aula</h3>
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
                                                    <a href="<?= url_to('editarHorarioAula', esc($turma['codigo_turma'])) ?>" class="btn btn-warning btn-sm">Editar</a>
                                                    <a href="<?= url_to('deletarTurma', esc($turma['codigo_turma'])) ?>" class="btn btn-danger btn-sm">Deletar</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <a href="<?= url_to('horarioAula') ?>" class="btn btn-primary mt-3">Novo horário de aula</a>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

<?= $this->endSection() ?>