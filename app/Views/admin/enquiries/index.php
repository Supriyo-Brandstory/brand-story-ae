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

    <!-- Search Form -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <form action="<?= route('admin.enquiries.index') ?>" method="GET" class="row g-2">
                <div class="col-md-10">
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                        <input type="text" name="search" class="form-control border-start-0" 
                               placeholder="Search name, email, phone, or company..." 
                               value="<?= htmlspecialchars($search ?? '') ?>">
                        <?php if (!empty($search)): ?>
                            <a href="<?= route('admin.enquiries.index') ?>" class="btn btn-outline-secondary">Clear</a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Search</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 60px;">S.N.</th>
                            <th style="width: 150px;">Date</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($enquiries)): ?>
                            <?php 
                            $snOffset = ($currentPage - 1) * $perPage;
                            foreach ($enquiries as $index => $enquiry): 
                            ?>
                                <tr>
                                    <td><?= $snOffset + $index + 1 ?></td>
                                    <td>
                                        <div class="small fw-bold"><?= date('d M Y', strtotime($enquiry['created_at'])) ?></div>
                                        <div class="text-muted small"><?= date('H:i', strtotime($enquiry['created_at'])) ?></div>
                                    </td>
                                    <td>
                                        <span class="badge <?= $enquiry['type'] == 'seo_calculator' ? 'bg-info' : 'bg-primary' ?>">
                                            <?= ucfirst(str_replace('_', ' ', $enquiry['type'])) ?>
                                        </span>
                                    </td>
                                    <td><?= htmlspecialchars($enquiry['name']) ?></td>
                                    <td><small><?= htmlspecialchars($enquiry['email']) ?></small></td>
                                    <td><small><?= htmlspecialchars($enquiry['phone']) ?></small></td>
                                    <td class="text-center" style="white-space: nowrap;">
                                        <a href="<?= route('admin.enquiries.show', ['id' => $enquiry['id']]) ?>"
                                            class="btn btn-sm btn-outline-primary" title="View Enquiry">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <form action="<?= route('admin.enquiries.destroy', ['id' => $enquiry['id']]) ?>"
                                            method="POST"
                                            style="display:inline-block;"
                                            onsubmit="return confirm('Are you sure you want to delete this enquiry?');">
                                            <?= csrf_token() ?>
                                            <button type="submit" class="btn btn-sm btn-outline-danger ms-1" title="Delete">
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

    <!-- Pagination -->
    <?php if ($totalPages > 1): ?>
        <nav aria-label="Page navigation" class="mt-4">
            <ul class="pagination justify-content-center">
                <?php 
                $queryParams = $_GET;
                ?>
                <li class="page-item <?= ($currentPage <= 1) ? 'disabled' : '' ?>">
                    <?php $queryParams['page'] = $currentPage - 1; ?>
                    <a class="page-link" href="<?= route('admin.enquiries.index') . '?' . http_build_query($queryParams) ?>">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                </li>

                <!-- Page Numbers -->
                <?php 
                $range = 2;
                $showEllipsis = true;
                for ($i = 1; $i <= $totalPages; $i++):
                    if ($i == 1 || $i == $totalPages || ($i >= $currentPage - $range && $i <= $currentPage + $range)):
                        $showEllipsis = true;
                        $queryParams['page'] = $i;
                ?>
                        <li class="page-item <?= ($i === $currentPage) ? 'active' : '' ?>">
                            <a class="page-link" href="<?= route('admin.enquiries.index') . '?' . http_build_query($queryParams) ?>"><?= $i ?></a>
                        </li>
                <?php 
                    elseif ($showEllipsis): 
                        $showEllipsis = false;
                ?>
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                <?php 
                    endif;
                endfor; 
                ?>

                <li class="page-item <?= ($currentPage >= $totalPages) ? 'disabled' : '' ?>">
                    <?php $queryParams['page'] = $currentPage + 1; ?>
                    <a class="page-link" href="<?= route('admin.enquiries.index') . '?' . http_build_query($queryParams) ?>">
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
    <?php endif; ?>

</main>