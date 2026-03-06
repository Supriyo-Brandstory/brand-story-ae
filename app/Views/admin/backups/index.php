<?php
// Layout is usually handled by AdminBaseController, assuming adminView wraps it.
?>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Database Backups</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="<?= route('admin.backups.run') ?>" class="btn btn-sm btn-primary">
                <i class="bi bi-play-fill"></i> Run Manual Backup
            </a>
        </div>
    </div>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $_SESSION['success'];
            unset($_SESSION['success']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $_SESSION['error'];
            unset($_SESSION['error']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="row">
        <!-- Settings Section -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">Backup Email Settings</h5>
                </div>
                <div class="card-body">
                    <form action="<?= route('admin.backups.settings') ?>" method="POST">
                        <?= csrf_token() ?>
                        <div class="mb-3">
                            <label for="emails" class="form-label">Email Addresses (Comma separated)</label>
                            <textarea name="emails" id="emails" class="form-control" rows="3" placeholder="email1@example.com, email2@example.com"><?= implode(', ', $data['emails'] ?? []) ?></textarea>
                            <div class="form-text">Backup files will be sent to these addresses automatically at the end of the day if changes occur.</div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Save Settings</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- History Section -->
        <div class="col-md-8 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">Backup History</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Date & Time</th>
                                    <th>Filename</th>
                                    <th>Status</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($data['backups'])): ?>
                                    <tr>
                                        <td colspan="4" class="text-center py-4">No backups found.</td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($data['backups'] as $backup): ?>
                                        <tr>
                                            <td><?= date('M d, Y H:i', strtotime($backup['created_at'])) ?></td>
                                            <td><code><?= e($backup['filename']) ?></code></td>
                                            <td>
                                                <?php if ($backup['status'] === 'success'): ?>
                                                    <span class="badge bg-success">Success</span>
                                                <?php else: ?>
                                                    <span class="badge bg-danger">Failed</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-end">
                                                <?php if ($backup['status'] === 'success'): ?>
                                                    <div class="btn-group">
                                                        <a href="<?= route('admin.backups.download', ['id' => $backup['id']]) ?>" class="btn btn-sm btn-outline-primary" title="Download">
                                                            <i class="bi bi-download"></i>
                                                        </a>
                                                        <a href="<?= route('admin.backups.send', ['id' => $backup['id']]) ?>" class="btn btn-sm btn-outline-info" title="Send Email" onclick="return confirm('Send this backup to configured email addresses?')">
                                                            <i class="bi bi-envelope"></i>
                                                        </a>
                                                        <form action="<?= route('admin.backups.delete', ['id' => $backup['id']]) ?>" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this backup file permanentely?')">
                                                            <?= csrf_token() ?>
                                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                <?php else: ?>
                                                    <form action="<?= route('admin.backups.delete', ['id' => $backup['id']]) ?>" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this record?')">
                                                        <?= csrf_token() ?>
                                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <?php if (isset($data['pagination']) && $data['pagination']['last_page'] > 1): ?>
                        <nav aria-label="Page navigation" class="mt-3">
                            <ul class="pagination justify-content-center">
                                <?php for ($i = 1; $i <= $data['pagination']['last_page']; $i++): ?>
                                    <li class="page-item <?= $i == $data['pagination']['current_page'] ? 'active' : '' ?>">
                                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                        </nav>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>