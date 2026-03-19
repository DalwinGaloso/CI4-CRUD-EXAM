<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-5 gap-3">
    <div>
        <h2 class="mb-2" style="font-size: 2rem;">Welcome back, <?= esc($user['fullname'] ?? 'Student') ?></h2>
        <p class="mb-0 text-muted" style="font-size: 1.05rem;">Manage your academic records and information seamlessly.</p>
    </div>
    <a href="<?= base_url('profile/edit') ?>" class="btn-modern btn-modern-primary">
        <i class="bi bi-pencil-square"></i> Edit Profile
    </a>
</div>

<div class="row g-4 mb-5">
    <div class="col-md-4">
        <div class="metric-box">
            <div class="metric-icon-wrap" style="background: rgba(79, 70, 229, 0.1); color: var(--primary);">
                <i class="bi bi-person-badge"></i>
            </div>
            <div>
                <p class="text-muted fw-bold mb-1" style="font-size: 0.75rem; text-transform: uppercase;">Student ID</p>
                <h4 class="mb-0 text-main" style="font-family: 'JetBrains Mono', monospace; font-size: 1.5rem;"><?= esc($user['student_id'] ?? '—') ?></h4>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="metric-box">
            <div class="metric-icon-wrap" style="background: rgba(16, 185, 129, 0.1); color: var(--success);">
                <i class="bi bi-journal-check"></i>
            </div>
            <div>
                <p class="text-muted fw-bold mb-1" style="font-size: 0.75rem; text-transform: uppercase;">Course Program</p>
                <h4 class="mb-0 text-main" style="font-size: 1.35rem;"><?= esc($user['course'] ?? '—') ?></h4>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="metric-box">
            <div class="metric-icon-wrap" style="background: rgba(245, 158, 11, 0.1); color: var(--warning);">
                <i class="bi bi-calendar-event"></i>
            </div>
            <div>
                <p class="text-muted fw-bold mb-1" style="font-size: 0.75rem; text-transform: uppercase;">Year & Section</p>
                <h4 class="mb-0 text-main" style="font-size: 1.35rem;">
                    <?= esc($user['year_level'] ?? '-') ?> &mdash; <?= esc($user['section'] ?? '-') ?>
                </h4>
            </div>
        </div>
    </div>
</div>

<div class="glass-card overflow-hidden">
    <div class="d-flex align-items-center gap-2 p-4 border-bottom" style="border-color: var(--border-color);">
        <i class="bi bi-person-lines-fill text-primary mt-1"></i>
        <h5 class="mb-0">Contact Details</h5>
    </div>
    <div class="table-responsive">
        <table class="modern-table">
            <tbody>
                <tr>
                    <td class="text-muted fw-semibold" style="width: 250px;">Email Address</td>
                    <td class="fw-bold" style="font-family: 'JetBrains Mono', monospace; "><?= esc($user['email'] ?? '—') ?></td>
                </tr>
                <tr>
                    <td class="text-muted fw-semibold">Phone Number</td>
                    <td class="fw-bold"><?= esc($user['phone'] ?? '—') ?></td>
                </tr>
                <tr>
                    <td class="text-muted fw-semibold">Home Address</td>
                    <td class="fw-bold"><?= esc($user['address'] ?? '—') ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
