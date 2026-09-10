<div class="container-fluid py-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Bulk Upload Pages</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="<?= route('admin.pages.index') ?>" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Back to Pages
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto">
            <div class="card shadow-sm mt-4">
                <div class="card-body p-4">
                    <h5 class="card-title mb-4">Upload ZIP File</h5>
                    
                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $_SESSION['error'] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($_SESSION['error']); ?>
                    <?php endif; ?>

                    <form action="<?= route('admin.pages.process_bulk_upload') ?>" method="POST" enctype="multipart/form-data" id="bulkUploadForm">
                        <div class="mb-4">
                            <label for="zip_file" class="form-label text-muted">Select a ZIP file containing HTML landing pages</label>
                            <input class="form-control form-control-lg" type="file" id="zip_file" name="zip_file" accept=".zip" required>
                            <div class="form-text">Ensure the ZIP file contains `.html` files. Images and assets should be in folders within the ZIP. Processing may take a few moments.</div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg" id="submitBtn">
                                <span class="normal-state"><i class="bi bi-cloud-upload"></i> Upload & Process</span>
                                <span class="loading-state d-none">
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    Processing... Please wait
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('bulkUploadForm').addEventListener('submit', function() {
    const btn = document.getElementById('submitBtn');
    btn.disabled = true;
    btn.querySelector('.normal-state').classList.add('d-none');
    btn.querySelector('.loading-state').classList.remove('d-none');
});
</script>
