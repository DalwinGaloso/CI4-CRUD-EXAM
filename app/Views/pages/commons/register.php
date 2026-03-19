<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Account | EduPanel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/premium.css') ?>?v=<?= time() ?>">
</head>
<body class="auth-wrapper">

    <div class="auth-card text-center position-relative z-1" style="max-width: 520px;">
        
        <div class="mb-5">
            <div class="d-inline-flex align-items-center justify-content-center mb-4" style="width: 72px; height: 72px; border-radius: var(--radius-md); background: linear-gradient(135deg, var(--secondary), var(--accent)); color: #fff; box-shadow: 0 10px 25px rgba(236, 72, 153, 0.4);">
                <i class="bi bi-person-plus-fill fs-2"></i>
            </div>
            <h2 style="font-size: 1.75rem; font-weight: 800; letter-spacing: -0.05em;">Create Account</h2>
            <p class="text-muted" style="font-size: 0.95rem;">Join EduPanel and manage your academic profile</p>
        </div>

        <?php if (session()->getFlashdata('notif_error')): ?>
            <div class="alert alert-danger mb-4 text-start font-monospace text-sm p-3" style="border-radius: var(--radius-sm); font-size: 0.85rem;">
                <i class="bi bi-exclamation-octagon-fill me-2"></i> <?= session()->getFlashdata('notif_error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('register') ?>" method="POST" class="text-start">
            <div class="mb-3">
                <label class="modern-label">Full Name</label>
                <div class="position-relative">
                    <i class="bi bi-person position-absolute top-50 translate-middle-y text-muted" style="left: 1.25rem;"></i>
                    <input type="text" name="inputFullname" class="modern-input" style="padding-left: 3rem;" placeholder="Juan dela Cruz" value="<?= old('inputFullname') ?>" required>
                </div>
            </div>
            
            <div class="mb-3">
                <label class="modern-label">Email Address</label>
                <div class="position-relative">
                    <i class="bi bi-envelope position-absolute top-50 translate-middle-y text-muted" style="left: 1.25rem;"></i>
                    <input type="email" name="inputEmail" class="modern-input" style="padding-left: 3rem;" placeholder="name@school.edu" value="<?= old('inputEmail') ?>" required>
                </div>
            </div>
            
            <div class="row g-3 mb-4">
                <div class="col-sm-6">
                    <label class="modern-label">Password</label>
                    <div class="position-relative">
                        <i class="bi bi-shield-lock position-absolute top-50 translate-middle-y text-muted" style="left: 1.25rem;"></i>
                        <input type="password" name="inputPassword" class="modern-input" style="padding-left: 3rem;" placeholder="Min. 6 chars" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label class="modern-label">Confirm Password</label>
                    <div class="position-relative">
                        <i class="bi bi-shield-check position-absolute top-50 translate-middle-y text-muted" style="left: 1.25rem;"></i>
                        <input type="password" name="inputPassword2" class="modern-input" style="padding-left: 3rem;" placeholder="Repeat password" required>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn-modern w-100 py-3 mb-4 mt-2" style="background: linear-gradient(135deg, var(--secondary), var(--accent)); color: white; box-shadow: 0 4px 12px rgba(236, 72, 153, 0.4); font-size: 1.05rem;">
                <i class="bi bi-rocket-takeoff me-2"></i> Sign Up
            </button>
        </form>

        <p class="text-center text-muted m-0" style="font-size: 0.9rem;">
            Already have an account? <a href="<?= base_url('login') ?>" class="text-decoration-none fw-bold" style="color: var(--secondary);">Sign in</a>
        </p>
    </div>

    <!-- Decorative background blobs -->
    <div class="position-absolute top-0 start-0 w-100 h-100 overflow-hidden z-0 pointer-events-none">
        <div style="position: absolute; top: -10%; left: -5%; width: 50vw; height: 50vh; background: radial-gradient(circle, rgba(236, 72, 153, 0.1) 0%, transparent 70%); border-radius: 50%;"></div>
        <div style="position: absolute; bottom: -10%; right: -5%; width: 60vw; height: 60vh; background: radial-gradient(circle, rgba(6, 182, 212, 0.1) 0%, transparent 70%); border-radius: 50%;"></div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
