<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>EduPanel | Modern Web App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" crossorigin="anonymous">
    <!-- Our New Modern Light/Glassy UI CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/premium.css') ?>?v=<?= time() ?>" />
</head>
<body>
    <!-- Complete Top Nav Hub -->
    <?= $this->include('layouts/header') ?>

    <main class="app-container my-5">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success d-flex align-items-center mb-5 rounded-4 border-0" style="background: #ecfdf5; color: #065f46; box-shadow: var(--shadow-sm); padding: 1.25rem;">
                <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 36px; height: 36px;">
                    <i class="bi bi-check2-circle fs-5"></i>
                </div>
                <div class="fw-semibold" style="font-size: 0.95rem;"><?= session()->getFlashdata('success') ?></div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" style="filter: invert(1);"></button>
            </div>
        <?php endif; ?>

        <!-- Main Inner Content -->
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="app-container pb-5 text-center text-muted" style="font-size: 0.875rem; font-weight: 500;">
        &copy; <?= date('Y') ?> <span class="text-gradient">EduPanel Modern App</span>. Built specifically for your enterprise.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <?= $this->renderSection('javascript') ?>
</body>
</html>
