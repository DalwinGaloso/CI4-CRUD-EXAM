<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Profile</h3>
            </div>
            <form action="<?= base_url('profile/update') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <div class="form-group">
                                <label>Profile Picture</label>
                                <div class="mb-3">
                                    <?php if (!empty($user['profile_image'])): ?>
                                        <img id="preview" class="img-fluid img-circle" 
                                             src="<?= base_url('uploads/profiles/' . esc($user['profile_image'])) ?>" 
                                             alt="Profile" style="width: 200px; height: 200px; object-fit: cover;">
                                    <?php else: ?>
                                        <img id="preview" class="img-fluid img-circle" 
                                             src="<?= base_url('assets/images/avatar4.png') ?>" 
                                             alt="Profile" style="width: 200px; height: 200px; object-fit: cover;">
                                    <?php endif; ?>
                                </div>
                                <input type="file" name="profile_image" class="form-control <?= session('errors.profile_image') ? 'is-invalid' : '' ?>" 
                                       accept="image/*" id="profileImage">
                                <?php if (session('errors.profile_image')): ?>
                                    <div class="invalid-feedback"><?= session('errors.profile_image') ?></div>
                                <?php endif; ?>
                                <small class="form-text text-muted">Max 2MB (JPG, PNG, WEBP)</small>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Full Name *</label>
                                        <input type="text" name="fullname" class="form-control <?= session('errors.fullname') ? 'is-invalid' : '' ?>" 
                                               value="<?= old('fullname', esc($user['fullname'])) ?>">
                                        <?php if (session('errors.fullname')): ?>
                                            <div class="invalid-feedback"><?= session('errors.fullname') ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Username *</label>
                                        <input type="text" name="username" class="form-control <?= session('errors.username') ? 'is-invalid' : '' ?>" 
                                               value="<?= old('username', esc($user['username'])) ?>">
                                        <?php if (session('errors.username')): ?>
                                            <div class="invalid-feedback"><?= session('errors.username') ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Student ID</label>
                                        <input type="text" name="student_id" class="form-control <?= session('errors.student_id') ? 'is-invalid' : '' ?>" 
                                               value="<?= old('student_id', esc($user['student_id'] ?? '')) ?>">
                                        <?php if (session('errors.student_id')): ?>
                                            <div class="invalid-feedback"><?= session('errors.student_id') ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Course</label>
                                        <input type="text" name="course" class="form-control <?= session('errors.course') ? 'is-invalid' : '' ?>" 
                                               value="<?= old('course', esc($user['course'] ?? '')) ?>">
                                        <?php if (session('errors.course')): ?>
                                            <div class="invalid-feedback"><?= session('errors.course') ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Year Level</label>
                                        <select name="year_level" class="form-control <?= session('errors.year_level') ? 'is-invalid' : '' ?>">
                                            <option value="">Select Year</option>
                                            <option value="1" <?= old('year_level', $user['year_level'] ?? '') == '1' ? 'selected' : '' ?>>1st Year</option>
                                            <option value="2" <?= old('year_level', $user['year_level'] ?? '') == '2' ? 'selected' : '' ?>>2nd Year</option>
                                            <option value="3" <?= old('year_level', $user['year_level'] ?? '') == '3' ? 'selected' : '' ?>>3rd Year</option>
                                            <option value="4" <?= old('year_level', $user['year_level'] ?? '') == '4' ? 'selected' : '' ?>>4th Year</option>
                                            <option value="5" <?= old('year_level', $user['year_level'] ?? '') == '5' ? 'selected' : '' ?>>5th Year</option>
                                        </select>
                                        <?php if (session('errors.year_level')): ?>
                                            <div class="invalid-feedback"><?= session('errors.year_level') ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Section</label>
                                        <input type="text" name="section" class="form-control <?= session('errors.section') ? 'is-invalid' : '' ?>" 
                                               value="<?= old('section', esc($user['section'] ?? '')) ?>">
                                        <?php if (session('errors.section')): ?>
                                            <div class="invalid-feedback"><?= session('errors.section') ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control <?= session('errors.phone') ? 'is-invalid' : '' ?>" 
                                       value="<?= old('phone', esc($user['phone'] ?? '')) ?>">
                                <?php if (session('errors.phone')): ?>
                                    <div class="invalid-feedback"><?= session('errors.phone') ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" class="form-control <?= session('errors.address') ? 'is-invalid' : '' ?>" 
                                          rows="3"><?= old('address', esc($user['address'] ?? '')) ?></textarea>
                                <?php if (session('errors.address')): ?>
                                    <div class="invalid-feedback"><?= session('errors.address') ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                    <a href="<?= base_url('profile') ?>" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
document.getElementById('profileImage').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});
</script>
<?= $this->endSection() ?>
