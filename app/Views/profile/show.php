<?= $this->extend('layouts/main') ?>

<?= $this->section('breadcrumb') ?>
<!-- Handled by topbar -->
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row g-4 pb-5">
    <!-- Left Column: Quick Profile Info -->
    <div class="col-lg-4">
        <div class="glass-card mb-4 overflow-hidden">
            <div class="p-4 d-flex flex-column align-items-center text-center">
                <?php if (!empty($user['profile_image'])): ?>
                    <img src="<?= base_url('uploads/profiles/' . esc($user['profile_image'])) ?>" alt="Profile" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 4px solid var(--primary-light); box-shadow: var(--shadow-md); margin-bottom: 1.25rem;">
                <?php else: ?>
                    <div class="shadow-sm" style="width: 120px; height: 120px; border-radius: 50%; background-color: var(--primary-light); color: var(--primary); display: flex; justify-content: center; align-items: center; border: 4px solid #fff; margin-bottom: 1.25rem;">
                        <i class="bi bi-person-fill" style="font-size: 3.5rem;"></i>
                    </div>
                <?php endif; ?>
                
                <h5 style="font-size: 1.35rem; font-weight: 800; color: var(--text-main); margin-bottom: 0.25rem; letter-spacing: -0.02em;"><?= esc($user['fullname']) ?></h5>
                <p style="font-size: 0.95rem; color: var(--text-muted); font-weight: 500; margin-bottom: 1.25rem; font-family: 'JetBrains Mono', monospace;">@<?= esc($user['username']) ?></p>
                
                <div class="mb-4">
                    <span class="badge-pill student shadow-sm">
                        <?= esc(session('user')['role'] ?? 'Student') ?>
                    </span>
                </div>
                
                <a href="<?= base_url('profile/edit') ?>" class="btn-modern btn-modern-primary w-100 text-decoration-none text-center">
                    <i class="bi bi-pencil-square me-2"></i> Edit Profile
                </a>
            </div>
            
            <div class="p-4 bg-light border-top" style="border-color: var(--border-color);">
                <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3" style="border-color: var(--border-color) !important;">
                    <span class="text-muted fw-semibold" style="font-size: 0.85rem;">Joined Date</span>
                    <span class="text-main fw-bold" style="font-size: 0.9rem;"><?= isset($user['created_at']) ? date('M Y', strtotime($user['created_at'])) : 'Unknown' ?></span>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-muted fw-semibold" style="font-size: 0.85rem;">Status</span>
                    <span class="text-success fw-bold d-flex align-items-center gap-2" style="font-size: 0.85rem;">
                        <span style="width: 8px; height: 8px; border-radius: 50%; background: var(--success); box-shadow: 0 0 8px var(--success);"></span> Active
                    </span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Right Column: Data Tables -->
    <div class="col-lg-8">
        <div class="glass-card mb-4 overflow-hidden">
            <div class="p-4 border-bottom d-flex align-items-center gap-2" style="background: var(--bg-page); border-color: var(--border-color) !important;">
                <i class="bi bi-mortarboard-fill text-primary"></i>
                <h6 class="mb-0 text-muted fw-bold" style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em;">Academic Record</h6>
            </div>
            <div class="table-responsive">
                <table class="modern-table">
                    <tbody>
                        <tr>
                            <td class="text-muted fw-semibold" style="width: 30%;">Student ID</td>
                            <td class="fw-bold" style="font-family: 'JetBrains Mono', monospace; font-size: 0.95rem;"><?= esc($user['student_id'] ?? 'Not Set') ?></td>
                        </tr>
                        <tr>
                            <td class="text-muted fw-semibold">Course/Program</td>
                            <td class="fw-bold fs-6"><?= esc($user['course'] ?? 'Not Set') ?></td>
                        </tr>
                        <tr>
                            <td class="text-muted fw-semibold">Year Level</td>
                            <td class="fw-bold fs-6"><?= esc($user['year_level'] ?? 'Not Set') ?></td>
                        </tr>
                        <tr>
                            <td class="text-muted fw-semibold border-bottom-0">Section</td>
                            <td class="fw-bold fs-6 border-bottom-0"><?= esc($user['section'] ?? 'Not Set') ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="glass-card mb-4 overflow-hidden">
            <div class="p-4 border-bottom d-flex align-items-center gap-2" style="background: var(--bg-page); border-color: var(--border-color) !important;">
                <i class="bi bi-person-vcard-fill text-secondary"></i>
                <h6 class="mb-0 text-muted fw-bold" style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em;">Contact Details</h6>
            </div>
            <div class="table-responsive">
                <table class="modern-table">
                    <tbody>
                        <tr>
                            <td class="text-muted fw-semibold" style="width: 30%;">Email Address</td>
                            <td class="fw-bold" style="font-family: 'JetBrains Mono', monospace; font-size: 0.95rem;"><?= esc($user['username'] ?? 'Not Set') ?></td>
                        </tr>
                        <tr>
                            <td class="text-muted fw-semibold">Phone Number</td>
                            <td class="fw-bold font-monospace" style="font-size: 0.95rem;"><?= esc($user['phone'] ?? 'Not Set') ?></td>
                        </tr>
                        <tr>
                            <td class="text-muted fw-semibold border-bottom-0">Home Address</td>
                            <td class="fw-bold border-bottom-0" style="font-size: 0.95rem;"><?= nl2br(esc($user['address'] ?? 'Not Set')) ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
