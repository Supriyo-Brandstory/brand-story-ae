<main class="container-fluid py-4">

    <!-- Page Title -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
        <h1 class="h2"><i class="bi bi-person-circle me-2"></i> Admin Profile</h1>
    </div>

    <!-- Success Message -->
    <?php if (isset($_SESSION['profile_success'])): ?>
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            <?php echo htmlspecialchars($_SESSION['profile_success']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['profile_success']); ?>
    <?php endif; ?>

    <!-- Profile Form Card -->
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white py-3">
                    <h5 class="mb-0"><i class="bi bi-person-lines-fill me-2"></i> Update Profile</h5>
                </div>

                <div class="card-body p-4">

                    <form action="<?php echo route('admin.updateProfile'); ?>" method="post">
                                        <?= csrf_token() ?>


                        <!-- Name Field -->
                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold text-dark">
                                <i class="bi bi-person me-2 text-primary"></i> Name
                            </label>
                            <input type="text" 
                                   class="form-control form-control-lg" 
                                   id="name" 
                                   name="name" 
                                   value="<?php echo htmlspecialchars($admin['name']); ?>" 
                                   required>
                        </div>

                        <!-- Email Field -->
                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold text-dark">
                                <i class="bi bi-envelope me-2 text-primary"></i> Email
                            </label>
                            <input type="email" 
                                   class="form-control form-control-lg" 
                                   id="email" 
                                   name="email" 
                                   value="<?php echo htmlspecialchars($admin['email']); ?>" 
                                   required>
                        </div>

                        <!-- Password Field -->
                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold text-dark">
                                <i class="bi bi-lock me-2 text-primary"></i> Password 
                                <small class="text-muted">(leave blank to keep current)</small>
                            </label>
                            <input type="password" 
                                   class="form-control form-control-lg" 
                                   id="password" 
                                   name="password" 
                                   placeholder="Enter new password only if changing">
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-check2-circle me-2"></i> Update Profile
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</main>