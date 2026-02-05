<main class="container-fluid py-4">

    <div class="mb-4">
        <a href="<?= route('admin.enquiries.index') ?>" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to List
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">Enquiry Details</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">Type</th>
                            <td>
                                <span class="badge <?= $enquiry['type'] == 'seo_calculator' ? 'bg-info' : 'bg-primary' ?>">
                                    <?= ucfirst(str_replace('_', ' ', $enquiry['type'])) ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Date Received</th>
                            <td><?= date('d F Y, H:i:s', strtotime($enquiry['created_at'])) ?></td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td><?= htmlspecialchars($enquiry['name']) ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?= htmlspecialchars($enquiry['email']) ?></td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td><?= htmlspecialchars($enquiry['phone']) ?></td>
                        </tr>
                        <tr>
                            <th>Company / Website</th>
                            <td><?= htmlspecialchars($enquiry['company']) ?></td>
                        </tr>
                        <?php if (!empty($enquiry['designation'])): ?>
                            <tr>
                                <th>Designation</th>
                                <td><?= htmlspecialchars($enquiry['designation']) ?></td>
                            </tr>
                        <?php endif; ?>
                        <?php if (!empty($enquiry['services'])): ?>
                            <tr>
                                <th>Services Interested</th>
                                <td><?= htmlspecialchars($enquiry['services']) ?></td>
                            </tr>
                        <?php endif; ?>
                        <?php if (!empty($enquiry['budget'])): ?>
                            <tr>
                                <th>Budget</th>
                                <td><?= htmlspecialchars($enquiry['budget']) ?></td>
                            </tr>
                        <?php endif; ?>
                    </table>

                    <?php if (!empty($enquiry['message'])): ?>
                        <div class="mt-4">
                            <h6>Message:</h6>
                            <div class="p-3 bg-light radius-10 border text-dark">
                                <?= nl2br(htmlspecialchars($enquiry['message'])) ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($enquiry['type'] == 'seo_calculator' && !empty($enquiry['calculator_data'])): ?>
                        <?php $calc = json_decode($enquiry['calculator_data'], true); ?>
                        <div class="mt-4">
                            <h6>SEO Cost Calculator Data:</h6>
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered bg-light">
                                    <?php if (isset($calc['est_price_range'])): ?>
                                        <tr>
                                            <th class="bg-white">Est. Investment</th>
                                            <td class="fw-bold text-success"><?= $calc['est_price_range'] ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <th class="bg-white" width="40%">Target Audience</th>
                                        <td><?= $calc['target_audience'] ?? 'N/A' ?></td>
                                    </tr>
                                    <tr>
                                        <th class="bg-white">Pages to Optimize</th>
                                        <td><?= $calc['pages_to_optimize'] ?? 'N/A' ?></td>
                                    </tr>
                                    <tr>
                                        <th class="bg-white">Website Age</th>
                                        <td><?= $calc['website_age'] ?? 'N/A' ?></td>
                                    </tr>
                                    <tr>
                                        <th class="bg-white">Physical Locations</th>
                                        <td><?= $calc['locations'] ?? 'N/A' ?></td>
                                    </tr>
                                    <tr>
                                        <th class="bg-white">Aggressiveness</th>
                                        <td><?= $calc['aggressiveness'] ?? 'N/A' ?></td>
                                    </tr>
                                    <tr>
                                        <th class="bg-white">Competition Level</th>
                                        <td><?= $calc['competition_level'] ?? 'N/A' ?></td>
                                    </tr>
                                    <tr>
                                        <th class="bg-white">Keyword Ranking</th>
                                        <td><?= $calc['keyword_rank'] ?? 'N/A' ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">Actions</h5>
                </div>
                <div class="card-body">
                    <form action="<?= route('admin.enquiries.destroy', ['id' => $enquiry['id']]) ?>"
                        method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this enquiry?');">
                        <?= csrf_token() ?>
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="bi bi-trash me-1"></i> Delete Enquiry
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</main>