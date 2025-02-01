<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações - Mazer Dashboard</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>

<body>
    <div id="app">
        <div id="main" class='layout-navbar'>
            <!-- Inclua aqui seu menu lateral e navbar -->
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-list"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Configurações</h3>
                <p class="text-subtitle text-muted">Gerencie as configurações do sistema e preferências do usuário.</p>
            </div>

            <div class="page-content">

            </div>
        </div>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>



<?= $this->extend('master'); ?>

<?= $this->section('content'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Usuário</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav
                    aria-label="breadcrumb"
                    class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Usuário</a>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Change Password</h5>
                    </div>
                    <div class="card-body">
                        <form action="#" method="get">
                            <div class="form-group my-2">
                                <label for="current_password" class="form-label">Current Password</label>
                                <input type="password" name="current_password" id="current_password"
                                    class="form-control" placeholder="Enter your current password"
                                    value="1L0V3Indonesia">
                            </div>
                            <div class="form-group my-2">
                                <label for="password" class="form-label">New Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Enter new password" value="">
                            </div>
                            <div class="form-group my-2">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" name="confirm_password" id="confirm_password"
                                    class="form-control" placeholder="Enter confirm password" value="">
                            </div>

                            <div class="form-group my-2 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Two Factor Authentication</h5>
                    </div>
                    <div class="card-body">
                        <form action="#" method="get">
                            <div class="form-group my-2">
                                <label for="email" class="form-label">Current Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Enter your current email" value="john.doe@example.net">
                            </div>

                            <div class="form-group my-2 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Delete Account</h5>
                    </div>
                    <div class="card-body">
                        <form action="#" method="get">
                            <p>Your account will be permanently deleted and cannot be restored, click "Touch me!" to continue</p>
                            <div class="form-check">
                                <div class="checkbox">
                                    <input type="checkbox" id="iaggree" class="form-check-input">
                                    <label for="iaggree">Touch me! If you agree to delete permanently</label>
                                </div>
                            </div>
                            <div class="form-group my-2 d-flex justify-content-end">
                                <button type="submit" class="btn btn-danger" id="btn-delete-account" disabled>Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>

<?= $this->section('js'); ?>

<script>
    const checkbox = document.getElementById("iaggree")
    const buttonDeleteAccount = document.getElementById("btn-delete-account")
    checkbox.addEventListener("change", function() {
        const checked = checkbox.checked
        if (checked) {
            buttonDeleteAccount.removeAttribute("disabled")
        } else {
            buttonDeleteAccount.setAttribute("disabled", true)
        }
    })
</script>

<?= $this->endSection() ?>