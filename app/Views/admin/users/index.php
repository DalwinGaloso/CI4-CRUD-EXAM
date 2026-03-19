<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-5 gap-3">
    <div>
        <h2 class="mb-2" style="font-size: 2rem;">User Identities & Access</h2>
        <p class="mb-0 text-muted" style="font-size: 1.05rem;">Oversee system privileges and enforce the RBAC topology.</p>
    </div>
    <a href="<?= base_url('/admin/roles') ?>" class="btn-modern btn-modern-outline">
        <i class="bi bi-sliders"></i> Role Configuration
    </a>
</div>

<div class="metric-box bg-white mb-5" style="border: 2px solid var(--primary-light);">
    <div class="metric-icon-wrap" style="background: var(--primary-light); color: var(--primary);">
        <i class="bi bi-shield-check"></i>
    </div>
    <div>
        <h5 class="fw-bold mb-1">Privilege Distribution Center</h5>
        <p class="mb-0 text-muted" style="font-size: 0.9rem;">
            Changes executed here directly manipulate user session tokens. Active sessions will adapt upon the target's next login cycle.
        </p>
    </div>
</div>

<div class="glass-card overflow-hidden">
    <div class="d-flex align-items-center justify-content-between p-4 border-bottom" style="border-color: var(--border-color);">
        <div class="d-flex align-items-center gap-2">
            <i class="bi bi-people-fill text-primary"></i>
            <h5 class="mb-0">System Directory</h5>
        </div>
        <span class="badge-pill" style="background: var(--bg-page); border: 1px solid var(--border-color); color: var(--text-muted);">
            <?= count($users) ?> DETECTED
        </span>
    </div>
    
    <div class="table-responsive">
        <table class="modern-table">
            <thead>
                <tr>
                    <th style="width: 80px;">ID</th>
                    <th>Identity Root</th>
                    <th>Email Vector</th>
                    <th>Clearance Level</th>
                    <th class="text-end" style="width: 300px;">Topology Assignment</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $i => $u): ?>
                <?php
                    $isSelf = ($u['id'] == (session('user')['id'] ?? 0));
                    $badgeClass = 'student';
                    if ($u['role_name'] === 'admin') {
                        $badgeClass = 'admin';
                    } elseif ($u['role_name'] === 'teacher') {
                        $badgeClass = 'teacher';
                    }
                ?>
                <tr>
                    <td class="text-muted fw-bold" style="font-family: 'JetBrains Mono', monospace;">#<?= sprintf('%04d', $u['id']) ?></td>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <?php if (!empty($u['profile_image'])): ?>
                                <img src="<?= base_url('uploads/profiles/' . esc($u['profile_image'])) ?>"
                                     class="rounded-circle shadow-sm" style="width: 44px; height: 44px; object-fit: cover; border: 2px solid var(--primary-light);" alt="">
                            <?php else: ?>
                                <div class="rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 44px; height: 44px; background: var(--bg-page); border: 1px solid var(--border-color); color: var(--text-muted); font-size: 1.25rem;">
                                    <i class="bi bi-person"></i>
                                </div>
                            <?php endif; ?>
                            <div>
                                <div class="fw-bold" style="font-size: 1.05rem;"><?= esc($u['name']) ?></div>
                                <?php if ($isSelf): ?>
                                    <div class="text-warning mt-1 fw-bold" style="font-size: 0.65rem; text-transform: uppercase;">Active Root (You)</div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </td>
                    <td class="text-muted fw-semibold" style="font-family: 'JetBrains Mono', monospace; font-size: 0.85rem;"><?= esc($u['email']) ?></td>
                    <td>
                        <span class="badge-pill <?= $badgeClass ?>">
                            <?= esc($u['role_label'] ?? 'UNASSIGNED') ?>
                        </span>
                    </td>
                    <td class="text-end">
                        <?php if ($isSelf): ?>
                            <span class="badge-pill bg-light text-muted border d-inline-flex gap-2 align-items-center">
                                <i class="bi bi-lock-fill"></i> Override Locked
                            </span>
                        <?php else: ?>
                        <form action="<?= base_url('/admin/users/assign-role/' . $u['id']) ?>" method="POST" class="d-flex align-items-center justify-content-end gap-2 m-0">
                            <?= csrf_field() ?>
                            <select name="role_id" class="modern-input py-2 px-3 m-0 bg-white" style="height: auto; width: auto; max-width: 140px;">
                                <?php foreach ($roles as $roleId => $roleLabel): ?>
                                    <option value="<?= $roleId ?>" <?= $u['role_id'] == $roleId ? 'selected' : '' ?>>
                                        <?= esc($roleLabel) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <button type="submit" class="btn-modern btn-modern-primary py-2 px-3 shadow-sm border-0" style="font-size: 0.85rem;">
                                Commit
                            </button>
                        </form>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
