<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In | EduPanel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/premium.css') ?>?v=<?= time() ?>">
</head>
<body class="auth-wrapper">

    <div class="auth-card text-center position-relative z-1">
        
        <div class="mb-5">
            <div class="d-inline-flex align-items-center justify-content-center mb-4" style="width: 72px; height: 72px; border-radius: var(--radius-md); background: linear-gradient(135deg, var(--primary), var(--secondary)); color: #fff; box-shadow: 0 10px 25px rgba(79, 70, 229, 0.4);">
                <i class="bi bi-hexagon-fill fs-2"></i>
            </div>
            <h2 style="font-size: 1.75rem; font-weight: 800; letter-spacing: -0.05em;">Welcome back</h2>
            <p class="text-muted" style="font-size: 0.95rem;">Enter your credentials to access your account</p>
        </div>

        <?php if (session()->getFlashdata('notif_error')): ?>
            <div class="alert alert-danger mb-4 text-start font-monospace text-sm p-3" style="border-radius: var(--radius-sm); font-size: 0.85rem;">
                <i class="bi bi-exclamation-octagon-fill me-2"></i> <?= session()->getFlashdata('notif_error') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('notif_success')): ?>
            <div class="alert alert-success mb-4 text-start font-monospace text-sm p-3" style="border-radius: var(--radius-sm); font-size: 0.85rem;">
                <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('notif_success') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('login') ?>" method="POST" class="text-start">
            <div class="mb-4">
                <label class="modern-label">Email Address</label>
                <div class="position-relative">
                    <i class="bi bi-envelope position-absolute top-50 translate-middle-y text-muted" style="left: 1.25rem;"></i>
                    <input type="email" name="inputEmail" class="modern-input" style="padding-left: 3rem;" placeholder="name@school.edu" required>
                </div>
            </div>
            
            <div class="mb-4">
                <label class="modern-label d-flex justify-content-between">
                    <span>Password</span>
                    <a href="#" class="text-decoration-none" style="color: var(--primary);">Forgot?</a>
                </label>
                <div class="position-relative">
                    <i class="bi bi-shield-lock position-absolute top-50 translate-middle-y text-muted" style="left: 1.25rem;"></i>
                    <input type="password" name="inputPassword" id="inputPassword" class="modern-input" style="padding-left: 3rem; padding-right: 3rem;" placeholder="••••••••" required>
                    <button type="button" class="btn position-absolute top-50 translate-middle-y end-0 p-0 me-3 text-muted border-0" onclick="togglePwd()">
                        <i class="bi bi-eye" id="eyeIcon"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn-modern btn-modern-primary w-100 py-3 mb-4 mt-2" style="font-size: 1.05rem;">
                Sign In <i class="bi bi-arrow-right ms-2"></i>
            </button>
        </form>

        <p class="text-center text-muted m-0" style="font-size: 0.9rem;">
            Don't have an account? <a href="<?= base_url('register') ?>" class="text-decoration-none fw-bold" style="color: var(--primary);">Create an account</a>
        </p>
    </div>

    <!-- Decorative background blobs -->
    <div class="position-absolute top-0 start-0 w-100 h-100 overflow-hidden z-0 pointer-events-none">
        <div style="position: absolute; top: -10%; left: -5%; width: 50vw; height: 50vh; background: radial-gradient(circle, rgba(79, 70, 229, 0.1) 0%, transparent 70%); border-radius: 50%;"></div>
        <div style="position: absolute; bottom: -10%; right: -5%; width: 60vw; height: 60vh; background: radial-gradient(circle, rgba(236, 72, 153, 0.1) 0%, transparent 70%); border-radius: 50%;"></div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script>
function togglePwd() {
    const inp = document.getElementById('inputPassword');
    const ico = document.getElementById('eyeIcon');
    if (inp.type === 'password') { inp.type = 'text'; ico.className = 'bi bi-eye-slash'; }
    else { inp.type = 'password'; ico.className = 'bi bi-eye'; }
}
</script>
</body>
</html>
