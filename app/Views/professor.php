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

                <?php if ($alerta = session()->getFlashdata('alerta')): ?>
                    <div class="alert alert-<?= esc($alerta['tipo']) ?> alert-dismissible fade show" role="alert">
                        <strong><i class="fa fa-<?= $alerta['tipo'] === 'success' ? 'check' : 'ban' ?>"></i> <?= ucfirst($alerta['titulo']) ?>:</strong>
                        <?= esc($alerta['mensagem']) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="card-title"><?= isset($usuario) ? 'Atualizar' : 'Novo' ?> Professor</h3>
                    </div>

                    <?= form_open(url_to('salvarUsuario'), ['role' => 'form']) ?>

                    <div class="card-body">
                        <?php if (isset($usuario)): ?>
                            <div class="mb-3">
                                <label class="form-label">ID</label>
                                <input name="id_usuario" type="text" class="form-control" value="<?= esc($usuario['id_usuario']) ?>" readonly>
                            </div>
                        <?php endif; ?>

                        <div class="mb-3">
                            <label class="form-label">Nome</label>
                            <input name="nome" type="text" class="form-control" value="<?= $usuario['nome'] ?? '' ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">E-mail</label>
                            <input name="email" type="email" class="form-control" value="<?= $usuario['email'] ?? '' ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Senha</label>
                            <input name="senha" type="password" class="form-control" value="<?= $usuario['senha'] ?? '' ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tipo de Usuário</label>
                            <select name="tipo_usuario" class="form-select">
                                <option value="professor" selected>Professor</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                    <?= form_close() ?>
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
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>Senha</th>
                                        <th>Data de Cadastro</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($usuarios as $usuario): ?>
                                        <tr>
                                            <td><?= esc($usuario['id_usuario']) ?></td>
                                            <td><?= esc($usuario['nome']) ?></td>
                                            <td><?= esc($usuario['email']) ?></td>
                                            <td><?= esc($usuario['senha']) ?></td>
                                            <td><?= esc($usuario['data_cadastro']) ?></td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="<?= url_to('editarUsuario', esc($usuario['id_usuario'])) ?>" class="btn btn-warning btn-sm">Editar</a>
                                                    <a href="#" class="btn btn-danger btn-sm"
                                                        onclick="confirmarDelecao('/usuario/deletar/<?= esc($usuario['id_usuario']) ?>')">Deletar</a>
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