<main class="container-fluid py-4">

    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($_SESSION['success']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">
            <i class="bi bi-envelope-paper text-primary me-2"></i> Enquiries / Leads
        </h1>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Company</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($enquiries)): ?>
                            <?php foreach ($enquiries as $enquiry): ?>
                                <tr>
                                    <td><?= $enquiry['id'] ?></td>
                                    <td><?= date('d M Y, H:i', strtotime($enquiry['created_at'])) ?></td>
                                    <td>
                                        <span class="badge <?= $enquiry['type'] == 'seo_calculator' ? 'bg-info' : 'bg-primary' ?>">
                                            <?= ucfirst(str_replace('_', ' ', $enquiry['type'])) ?>
                                        </span>
                                    </td>
                                    <td><?= htmlspecialchars($enquiry['name']) ?></td>
                                    <td><?= htmlspecialchars($enquiry['email']) ?></td>
                                    <td><?= htmlspecialchars($enquiry['phone']) ?></td>
                                    <td><?= htmlspecialchars($enquiry['company']) ?></td>
                                    <td class="text-center">
                                        <a href="<?= route('admin.enquiries.show', ['id' => $enquiry['id']]) ?>"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <form action="<?= route('admin.enquiries.destroy', ['id' => $enquiry['id']]) ?>"
                                            method="POST"
                                            style="display:inline-block;"
                                            onsubmit="return confirm('Are you sure you want to delete this enquiry?');">
                                            <?= csrf_token() ?>
                                            <button type="submit" class="btn btn-sm btn-outline-danger ms-1">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center text-muted py-5">
                                    No enquiries found.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</main>