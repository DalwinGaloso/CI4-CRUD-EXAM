<?= $this->extend('layouts/main') ?>

<?= $this->section('breadcrumb') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<form action="<?= base_url('profile/update') ?>" method="post" enctype="multipart/form-data" id="profileForm">
    <?= csrf_field() ?>

    <?php if (session('errors')): ?>
        <div class="alert alert-danger d-flex align-items-start gap-2 mb-5 rounded-4 border-0 shadow-sm" style="background: #fef2f2; color: #991b1b;">
            <i class="bi bi-exclamation-triangle-fill mt-1 flex-shrink-0"></i>
            <div>
                <strong class="mb-1 d-block">Please fix the following errors:</strong>
                <ul class="mb-0 ps-3" style="font-size: 0.9rem;">
                    <?php foreach (session('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>

    <div class="pb-5">
        <!-- Cover Header -->
        <div class="glass-card mb-5 border-0 position-relative overflow-hidden" style="box-shadow: var(--shadow-lg);">
            <div style="height: 160px; background: linear-gradient(135deg, var(--primary), var(--secondary));"></div>
            <div class="px-4 px-md-5 pb-4 d-flex flex-column flex-md-row align-items-center align-items-md-end bg-white" style="margin-top: -65px;">
                <!-- Avatar -->
                <div class="position-relative me-md-4 mb-3 mb-md-0 flex-shrink-0">
                    <?php if (!empty($user['profile_image'])): ?>
                        <img id="preview" src="<?= base_url('uploads/profiles/' . esc($user['profile_image'])) ?>" alt="Profile"
                            style="width: 130px; height: 130px; border-radius: 50%; object-fit: cover; border: 4px solid #fff; box-shadow: var(--shadow-md); display: block; background: #fff;">
                    <?php else: ?>
                        <div id="preview" style="width: 130px; height: 130px; border-radius: 50%; background: var(--primary-light); color: var(--primary); display: flex; justify-content: center; align-items: center; border: 4px solid #fff; box-shadow: var(--shadow-md);">
                            <i class="bi bi-person-fill" style="font-size: 4.5rem;"></i>
                        </div>
                    <?php endif; ?>

                    <label for="profile_image" id="cameraBtn" title="Change photo"
                        class="position-absolute bottom-0 end-0 d-flex align-items-center justify-content-center rounded-circle"
                        style="width: 38px; height: 38px; cursor: pointer; background: var(--primary); color: #fff; border: 2px solid #fff; box-shadow: var(--shadow-sm); transition: transform 0.2s;">
                        <i class="bi bi-camera-fill" style="font-size: 0.95rem;"></i>
                    </label>
                    <input type="file" name="profile_image" id="profile_image" class="d-none" accept="image/jpeg,image/png,image/webp">
                </div>

                <div class="flex-grow-1 text-center text-md-start">
                    <h4 class="mb-1 fw-bold"><?= esc($user['fullname']) ?></h4>
                    <p class="mb-0 text-muted" style="font-size: 0.95rem;">
                        <i class="bi bi-pencil-square me-1"></i> Editing your profile
                    </p>
                    <p id="fileInfo" class="mb-0 mt-1 fw-bold text-primary" style="font-size: 0.8rem; display: none;"></p>
                </div>

                <div class="ms-md-auto d-flex gap-2 mt-4 mt-md-0">
                    <a href="<?= base_url('profile') ?>" class="btn-modern btn-modern-outline py-2 border">
                        Discard
                    </a>
                    <button type="submit" class="btn-modern btn-modern-primary py-2 px-4">
                        <i class="bi bi-check-lg me-1"></i> Save Changes
                    </button>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- Left Column: Personal Elements -->
            <div class="col-lg-6">
                <div class="glass-card h-100 overflow-hidden">
                    <div class="p-4 border-bottom d-flex align-items-center gap-2" style="background: var(--bg-page); border-color: var(--border-color) !important;">
                        <i class="bi bi-person-vcard-fill text-primary"></i>
                        <h6 class="mb-0 text-muted fw-bold text-uppercase" style="font-size: 0.85rem; letter-spacing: 0.05em;">Personal Details</h6>
                    </div>
                    
                    <div class="p-4 bg-white">
                        <div class="mb-4">
                            <label class="modern-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" name="fullname"
                                class="modern-input <?= session('errors.fullname') ? 'border-danger' : '' ?>"
                                value="<?= old('fullname', esc($user['fullname'])) ?>" required
                                placeholder="Your full name">
                            <?php if (session('errors.fullname')): ?>
                                <div class="mt-1 text-danger fw-semibold" style="font-size: 0.8rem;">
                                    <i class="bi bi-exclamation-circle-fill me-1"></i><?= session('errors.fullname') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <label class="modern-label">Email / Username <span class="text-danger">*</span></label>
                            <input type="text" name="username"
                                class="modern-input <?= session('errors.username') ? 'border-danger' : '' ?>"
                                value="<?= old('username', esc($user['username'])) ?>" required
                                placeholder="your@email.com">
                            <?php if (session('errors.username')): ?>
                                <div class="mt-1 text-danger fw-semibold" style="font-size: 0.8rem;">
                                    <i class="bi bi-exclamation-circle-fill me-1"></i><?= session('errors.username') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <label class="modern-label">Phone Number</label>
                            <div class="position-relative">
                                <span class="position-absolute d-flex align-items-center" style="left: 1.25rem; top: 0; bottom: 0; color: var(--text-muted); pointer-events: none;">
                                    <i class="bi bi-telephone"></i>
                                </span>
                                <input type="tel" name="phone" class="modern-input" style="padding-left: 3rem;"
                                    value="<?= old('phone', esc($user['phone'] ?? '')) ?>"
                                    placeholder="+63 9XX XXX XXXX">
                            </div>
                        </div>

                        <div class="mb-0">
                            <label class="modern-label d-flex justify-content-between">
                                <span>Home Address</span>
                                <span id="addrCount" class="text-muted fw-normal" style="font-size: 0.8rem;">0 / 255</span>
                            </label>
                            <textarea name="address" id="addressField" rows="3" class="modern-input" maxlength="255"
                                placeholder="Street, City, Province"><?= old('address', esc($user['address'] ?? '')) ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Academic & Password -->
            <div class="col-lg-6 d-flex flex-column gap-4">
                <div class="glass-card overflow-hidden">
                    <div class="p-4 border-bottom d-flex align-items-center gap-2" style="background: var(--bg-page); border-color: var(--border-color) !important;">
                        <i class="bi bi-mortarboard-fill text-success"></i>
                        <h6 class="mb-0 text-muted fw-bold text-uppercase" style="font-size: 0.85rem; letter-spacing: 0.05em;">Academic Record</h6>
                    </div>
                    <div class="p-4 bg-white">
                        <div class="mb-4">
                            <label class="modern-label">Student ID</label>
                            <input type="text" name="student_id" class="modern-input text-monospace fw-bold"
                                value="<?= old('student_id', esc($user['student_id'] ?? '')) ?>"
                                placeholder="e.g. 2024-00001">
                        </div>

                        <div class="mb-4">
                            <label class="modern-label">Course / Program</label>
                            <input type="text" name="course" class="modern-input"
                                value="<?= old('course', esc($user['course'] ?? '')) ?>"
                                placeholder="e.g. BS Computer Science">
                        </div>

                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label class="modern-label">Year Level</label>
                                <select name="year_level" class="modern-input">
                                    <option value="" class="text-muted">— Select —</option>
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <option value="<?= $i ?>" <?= old('year_level', $user['year_level'] ?? '') == $i ? 'selected' : '' ?>>
                                            Year <?= $i ?>
                                        </option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="modern-label">Section</label>
                                <input type="text" name="section" class="modern-input"
                                    value="<?= old('section', esc($user['section'] ?? '')) ?>"
                                    placeholder="e.g. A, B, C">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Password Secion -->
                <div class="glass-card overflow-hidden">
                    <div class="p-4 border-bottom d-flex align-items-center gap-2 flex-wrap" style="background: var(--bg-page); border-color: var(--border-color) !important;">
                        <i class="bi bi-shield-lock-fill text-warning"></i>
                        <h6 class="mb-0 text-muted fw-bold text-uppercase me-2" style="font-size: 0.85rem; letter-spacing: 0.05em;">Security</h6>
                        <span class="text-muted fw-normal fst-italic" style="font-size: 0.8rem;">Leave blank to keep current password</span>
                    </div>
                    
                    <div class="p-4 bg-white">
                        <div class="mb-4">
                            <label class="modern-label">New Password</label>
                            <div class="position-relative d-flex align-items-center">
                                <input type="password" name="new_password" id="newPassword" class="modern-input" style="padding-right: 3rem;"
                                    placeholder="Min. 8 characters" autocomplete="new-password">
                                <button type="button" class="btn position-absolute border-0 text-muted end-0 me-1 p-2 toggle-pw" data-target="newPassword">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-0">
                            <label class="modern-label">Confirm Password</label>
                            <div class="position-relative d-flex align-items-center">
                                <input type="password" name="confirm_password" id="confirmPassword" class="modern-input" style="padding-right: 3rem;"
                                    placeholder="Repeat new password" autocomplete="new-password">
                                <button type="button" class="btn position-absolute border-0 text-muted end-0 me-1 p-2 toggle-pw" data-target="confirmPassword">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                            <div id="pwMismatch" class="mt-2 text-danger fw-semibold d-none" style="font-size: 0.8rem;">
                                <i class="bi bi-exclamation-circle-fill me-1"></i>Passwords do not match
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
(function () {
    const fileInput = document.getElementById('profile_image');
    const fileInfo  = document.getElementById('fileInfo');

    fileInput.addEventListener('change', function () {
        const file = this.files[0];
        if (!file) return;
        if (file.size > 2 * 1024 * 1024) {
            alert('Image must be under 2 MB.');
            this.value = '';
            return;
        }
        fileInfo.textContent = file.name + ' (' + (file.size / 1024).toFixed(0) + ' KB)';
        fileInfo.style.display = 'block';

        const reader = new FileReader();
        reader.onload = (e) => {
            const prev = document.getElementById('preview');
            if (prev.tagName === 'IMG') {
                prev.src = e.target.result;
            } else {
                const img = document.createElement('img');
                img.id = 'preview';
                img.alt = 'Profile';
                img.src = e.target.result;
                img.style.cssText = prev.style.cssText;
                prev.parentNode.replaceChild(img, prev);
            }
        };
        reader.readAsDataURL(file);
    });

    const camBtn = document.getElementById('cameraBtn');
    camBtn.addEventListener('mouseenter', () => camBtn.style.transform = 'scale(1.1)');
    camBtn.addEventListener('mouseleave', () => camBtn.style.transform = 'scale(1)');

    const addr      = document.getElementById('addressField');
    const addrCount = document.getElementById('addrCount');
    const updateCount = () => { if(addr) addrCount.textContent = addr.value.length + ' / 255'; };
    if(addr) { addr.addEventListener('input', updateCount); updateCount(); }

    document.querySelectorAll('.toggle-pw').forEach(btn => {
        btn.addEventListener('click', function () {
            const input = document.getElementById(this.dataset.target);
            const icon  = this.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'bi bi-eye-slash text-primary';
            } else {
                input.type = 'password';
                icon.className = 'bi bi-eye text-muted';
            }
        });
    });

    const newPw  = document.getElementById('newPassword');
    const confPw = document.getElementById('confirmPassword');
    const mismatch = document.getElementById('pwMismatch');

    function checkPw() {
        if (confPw.value && newPw.value !== confPw.value) {
            mismatch.classList.remove('d-none');
            confPw.classList.add('border-danger');
        } else {
            mismatch.classList.add('d-none');
            confPw.classList.remove('border-danger');
        }
    }
    if(newPw) newPw.addEventListener('input', checkPw);
    if(confPw) confPw.addEventListener('input', checkPw);

    document.getElementById('profileForm').addEventListener('submit', function (e) {
        if (newPw.value && newPw.value !== confPw.value) {
            e.preventDefault();
            confPw.focus();
            mismatch.classList.remove('d-none');
        }
    });
})();
</script>
<?= $this->endSection() ?>
