<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="<?= url_to('index') ?>">
                        <img src="<?= base_url('images/logo_IF.png'); ?>" alt="Logo" />
                    </a>
                </div>
                <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
                    <div class="form-check form-switch fs-6">
                        <input class="form-check-input me-0" type="checkbox" id="toggle-dark" style="cursor: pointer" />
                        <label class="form-check-label"></label>
                    </div>
                </div>
                <div class="sidebar-toggler x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>

        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= url_to('horarioAulaPublico') ?>">
                        <i class="fa-solid fa-people-roof fa-lg"></i>
                        <span>Horário de Aula</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Rodapé da sidebar com período letivo e botão de login -->
        <div class="sidebar-footer position-absolute bottom-0 w-100 p-3">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Período Letivo Ativo -->
                <div class="text-muted">
                    <small>Período:</small>
                    <strong><?= getPeriodoAtivo() ?></strong>
                </div>

                <!-- Botão de Login ou Logout -->
                <?php if (auth()->loggedIn()): ?>
                    <a href="<?= url_to('logout') ?>" class="sidebar-item">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </a>
                <?php else: ?>
                    <a href="<?= url_to('login') ?>" class="sidebar-item">
                        <i class="fa-solid fa-right-to-bracket fa-lg"></i> Login
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>