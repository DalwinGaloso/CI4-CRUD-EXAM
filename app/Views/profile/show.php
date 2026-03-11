<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-4">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <?php if (!empty($user['profile_image'])): ?>
                        <img class="profile-user-img img-fluid img-circle" 
                             src="<?= base_url('uploads/profiles/' . esc($user['profile_image'])) ?>" 
                             alt="User profile picture" style="width: 150px; height: 150px; object-fit: cover;">
                    <?php else: ?>
                        <img class="profile-user-img img-fluid img-circle" 
                             src="<?= base_url('assets/images/avatar4.png') ?>" 
                             alt="User profile picture">
                    <?php endif; ?>
                </div>
                <h3 class="profile-username text-center"><?= esc($user['fullname']) ?></h3>
                <p class="text-muted text-center"><?= esc($user['course'] ?? 'No Course') ?></p>
                <a href="<?= base_url('profile/edit') ?>" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Student Information</h3>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-4">Student ID</dt>
                    <dd class="col-sm-8"><?= esc($user['student_id'] ?? 'N/A') ?></dd>

                    <dt class="col-sm-4">Full Name</dt>
                    <dd class="col-sm-8"><?= esc($user['fullname']) ?></dd>

                    <dt class="col-sm-4">Username</dt>
                    <dd class="col-sm-8"><?= esc($user['username']) ?></dd>

                    <dt class="col-sm-4">Course</dt>
                    <dd class="col-sm-8"><?= esc($user['course'] ?? 'N/A') ?></dd>

                    <dt class="col-sm-4">Year Level</dt>
                    <dd class="col-sm-8"><?= esc($user['year_level'] ?? 'N/A') ?></dd>

                    <dt class="col-sm-4">Section</dt>
                    <dd class="col-sm-8"><?= esc($user['section'] ?? 'N/A') ?></dd>

                    <dt class="col-sm-4">Phone</dt>
                    <dd class="col-sm-8"><?= esc($user['phone'] ?? 'N/A') ?></dd>

                    <dt class="col-sm-4">Address</dt>
                    <dd class="col-sm-8"><?= esc($user['address'] ?? 'N/A') ?></dd>

                    <dt class="col-sm-4">Account Created</dt>
                    <dd class="col-sm-8"><?= esc($user['created_at'] ?? 'N/A') ?></dd>

                    <dt class="col-sm-4">Last Updated</dt>
                    <dd class="col-sm-8"><?= esc($user['updated_at'] ?? 'N/A') ?></dd>
                </dl>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
