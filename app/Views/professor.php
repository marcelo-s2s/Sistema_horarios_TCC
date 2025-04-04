<?= $this->extend('master'); ?>

<?= $this->section('content'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>Professor</h4>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav
                    aria-label="breadcrumb"
                    class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Professor</a>
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
                        <h3 class="card-title"><?= isset($professor) ? 'Atualizar' : 'Novo' ?> Professor</h3>
                    </div>

                    <div class="card-body">
                        <?= form_open(url_to('salvarUsuario'), ['role' => 'form']) ?>

                        <div class="form-body">

                            <input type="hidden" name="tipo_usuario" value="professor">
                            <?= isset($professor) ? "
                                <div class='mb-3'> 
                                    <label class='form-label'>ID</label> 
                                    <input name='id' type='text' class='form-control' value='" . esc($professor->id) . "' readonly> 
                                </div>" : "" ?>
                            <div class="mb-3">
                                <label class="form-label">Nome</label>
                                <input name="username" type="text" class="form-control" value="<?= $professor->username ?? '' ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">E-mail</label>
                                <input name="email" type="email" class="form-control" value="<?= $professor->email ?? '' ?>">
                            </div>
                            <?php if (!isset($professor)): ?>
                                <div class="mb-3">
                                    <label class="form-label">Senha</label>
                                    <input name="password" type="password" class="form-control" value="<?= $professor->password ?? '' ?>">
                                </div>
                            <?php endif; ?>
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
                        <h3 class="card-title">Todos os Professores</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>Data de Cadastro</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($professores as $professor): ?>
                                        <tr>
                                            <td><?= esc($professor['nome']) ?></td>
                                            <td><?= esc($professor['email']) ?></td>
                                            <td><?= esc($professor['data_cadastro']) ?></td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="<?= url_to('editarProfessor', esc($professor['id_usuario'])) ?>" class="btn btn-warning btn-sm">Editar</a>
                                                    <a href="#" class="btn btn-danger btn-sm"
                                                        onclick="confirmarDelecao('/usuario/deletar/<?= esc($professor['id_usuario']) ?>')">Deletar</a>
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