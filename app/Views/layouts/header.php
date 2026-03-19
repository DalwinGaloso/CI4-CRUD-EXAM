<?php 
$role = session('user')['role'] ?? 'guest'; 
$segment = service('uri')->getSegment(1); 
$subsegment = service('uri')->getSegment(2);
?>
<header class="glass-nav">
    <div class="app-container d-flex align-items-center justify-content-between">
        <!-- Logo Area -->
        <a href="<?= base_url() ?>" class="d-flex align-items-center gap-3 text-decoration-none">
            <div style="background: linear-gradient(135deg, var(--primary), var(--secondary)); width: 44px; height: 44px; border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(79, 70, 229, 0.4);">
                <i class="bi bi-hexagon-fill text-white fs-5"></i>
            </div>
            <div>
                <h1 class="m-0" style="font-size: 1.25rem; font-weight: 800; letter-spacing: -0.05em; color: var(--text-main);">EduPanel</h1>
            </div>
        </a>

        <!-- Central Navigation Links -->
        <nav class="d-none d-lg-flex align-items-center gap-2 p-1" style="background: var(--bg-page); border-radius: var(--radius-full); border: 1px solid var(--border-color);">
            <?php if ($role === 'admin'): ?>
                <a href="<?= base_url('dashboard') ?>" class="nav-link-custom <?= ($segment === 'dashboard') ? 'active' : '' ?>">Dashboard</a>
                <a href="<?= base_url('students') ?>" class="nav-link-custom <?= ($segment === 'students') ? 'active' : '' ?>">Students</a>
                <a href="<?= base_url('admin/roles') ?>" class="nav-link-custom <?= ($segment === 'admin' && $subsegment === 'roles') ? 'active' : '' ?>">Roles</a>
                <a href="<?= base_url('admin/users') ?>" class="nav-link-custom <?= ($segment === 'admin' && $subsegment === 'users') ? 'active' : '' ?>">Users</a>
            <?php elseif ($role === 'teacher'): ?>
                <a href="<?= base_url('dashboard') ?>" class="nav-link-custom <?= ($segment === 'dashboard') ? 'active' : '' ?>">Dashboard</a>
                <a href="<?= base_url('students') ?>" class="nav-link-custom <?= ($segment === 'students') ? 'active' : '' ?>">Class Roster</a>
            <?php else: ?>
                <a href="<?= base_url('student/dashboard') ?>" class="nav-link-custom <?= ($segment === 'student' || $segment === 'dashboard') ? 'active' : '' ?>">Dashboard</a>
                <a href="<?= base_url('profile') ?>" class="nav-link-custom <?= ($segment === 'profile' && empty($subsegment)) ? 'active' : '' ?>">Profile</a>
            <?php endif; ?>
        </nav>

        <!-- User Options Dropdown -->
        <div class="d-flex align-items-center gap-3">
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center gap-3 text-decoration-none dropdown-toggle" id="userMenuDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="background: var(--bg-page); padding: 0.5rem 0.5rem 0.5rem 1rem; border-radius: var(--radius-full); border: 1px solid var(--border-color);">
                    <div class="d-none d-md-block text-end">
                        <div style="font-size: 0.8rem; font-weight: 700; color: var(--text-main); line-height: 1.2;"><?= esc(session('user')['fullname'] ?? 'User Profile') ?></div>
                        <div style="font-size: 0.7rem; font-weight: 600; color: var(--primary); text-transform: uppercase; letter-spacing: 0.05em;"><?= esc($role) ?></div>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold shadow-sm" style="width: 36px; height: 36px; background: var(--primary);">
                        <?= strtoupper(substr(esc(session('user')['fullname'] ?? 'U'), 0, 1)) ?>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end border-0 p-3" aria-labelledby="userMenuDropdown" style="box-shadow: var(--shadow-float); border-radius: var(--radius-lg); margin-top: 1rem; min-width: 240px;">
                    <li><h6 class="dropdown-header px-2 text-muted fw-bold">My Account</h6></li>
                    <li><a class="dropdown-item py-2 px-3 rounded-3 fw-semibold text-main mb-1" href="<?= base_url('profile') ?>" style="transition: background 0.2s;"><i class="bi bi-person-circle text-primary me-2"></i> User Profile</a></li>
                    <li><a class="dropdown-item py-2 px-3 rounded-3 fw-semibold text-main mb-1" href="<?= base_url('profile/edit') ?>"><i class="bi bi-gear-fill text-muted me-2"></i> Settings</a></li>
                    <li><hr class="dropdown-divider border-color my-2"></li>
                    <li><a class="dropdown-item py-2 px-3 rounded-3 fw-bold text-danger" href="<?= base_url('logout') ?>" style="background: #fee2e2;"><i class="bi bi-box-arrow-right text-danger me-2"></i> Log Out</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
