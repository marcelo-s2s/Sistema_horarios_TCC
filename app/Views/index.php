<?= $this->extend('master'); ?>

<?= $this->section('content'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>Relatório</h4>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav
                    aria-label="breadcrumb"
                    class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/logout">Logout</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Visão Geral
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="row">

            <div class="col-6 col-lg-3 col-md-6">
                <div class="card shadow">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div
                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <div class="stats-icon purple mb-2">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">
                                    Usuários
                                </h6>
                                <h6 class="font-extrabold mb-0"><?= $totalRegistros['totalUsuarios'] ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3 col-md-6">
                <div class="card shadow">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div
                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <div class="stats-icon green mb-2">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">
                                    Turmas
                                </h6>
                                <h6 class="font-extrabold mb-0"><?= $totalRegistros['totalTurmas'] ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3 col-md-6">
                <div class="card shadow">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div
                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <div class="stats-icon red mb-2">
                                    <i class="fa-solid fa-book"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">
                                    Disciplinas
                                </h6>
                                <h6 class="font-extrabold mb-0"><?= $totalRegistros['totalDisciplinas'] ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3 col-md-6">
                <div class="card shadow">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div
                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <div class="stats-icon blue mb-2">
                                    <i class="fa-solid fa-chalkboard"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">
                                    Salas
                                </h6>
                                <h6 class="font-extrabold mb-0"><?= $totalRegistros['totalSalas'] ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>

<?= $this->endSection() ?>