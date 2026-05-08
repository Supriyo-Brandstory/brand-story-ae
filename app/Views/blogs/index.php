<section class="blogs-common-banner blogs-listing-banner sp-50">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<h1 class="text-white mt-4 text-center text-md-start">Blogs</h1>
			</div>
		</div>
	</div>
</section>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<!-- Category Filter Bar -->
<section class="blog-category-filter mt-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php if (empty($subCategories)): ?>
					<!-- Only show main categories if no subcategories are present (No category selected) -->
					<div class="d-flex flex-wrap justify-content-center gap-2">
						<a href="<?= base_url('blog') ?>" class="cat-btn <?= !$currentCategorySlug ? 'active' : '' ?>">All</a>
						<?php if (!empty($categories)): ?>
							<?php foreach ($categories as $category): ?>
								<a href="<?= base_url('blog/' . $category['slug']) ?>" class="cat-btn <?= ($currentCategorySlug == $category['slug']) ? 'active' : '' ?>">
									<?= htmlspecialchars($category['name']) ?>
								</a>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				<?php else: ?>
					<!-- Show subcategories when a category is selected, using the main category button style -->
					<div class="mt-5 text-center">
						<div class="d-flex flex-wrap justify-content-center gap-2">
							<a href="<?= base_url('blog') ?>" class="cat-btn">Back to All</a>
							<a href="<?= base_url('blog/' . $currentCategorySlug) ?>" class="cat-btn <?= !$currentSubCategorySlug ? 'active' : '' ?>"><?= htmlspecialchars($currentCategorySlug) ?></a>
							<?php foreach ($subCategories as $sub): ?>
								<a href="<?= base_url('blog/' . $currentCategorySlug . '/' . $sub['slug']) ?>" class="cat-btn <?= ($currentSubCategorySlug == $sub['slug']) ? 'active' : '' ?>">
									<?= htmlspecialchars($sub['name']) ?>
								</a>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<section class="latest--blogs blog-listings sp-50">
	<div class="container"><!--Container Start-->
		<div class="row gy-4 gy-md-5 gx-lg-5 align-items-stretch"><!--Row Start-->
			<?php if (!empty($blogs)): ?>
				<?php foreach ($blogs as $blog): ?>
					<div class="col-md-4 d-flex align-items-stretch"> <!--col start-->
						<div class="blog-box">
							<div class="blog-box-img">
								<?php if (!empty($blog['image'])): ?>
									<img src="<?= base_url($blog['image']) ?>" class="img-fluid" alt="<?= htmlspecialchars($blog['title']) ?>">
								<?php else: ?>
									<img src="<?= base_url('assets/images/blog/default.jpg') ?>" class="img-fluid" alt="Default Blog Image">
								<?php endif; ?>
							</div>
							<div class="blog-box-txt">
								<div class="blog-date"><?= date('F d, Y', strtotime($blog['created_at'])) ?></div>
								<h6>
									<?php
									$blogUrl = base_url('blog/');
									if (!empty($blog['category_slug'])) $blogUrl .= $blog['category_slug'] . '/';
									if (!empty($blog['sub_category_slug'])) $blogUrl .= $blog['sub_category_slug'] . '/';
									$blogUrl .= $blog['slug'];
									?>
									<a href="<?= $blogUrl ?>" style="text-decoration:none;color:#000">
										<?= htmlspecialchars($blog['title']) ?>
									</a>
								</h6>
								<p><?= htmlspecialchars(substr(strip_tags($blog['description']), 0, 150)) ?>...</p>
								<div class="blog-box-link">
									<a href="<?= $blogUrl ?>">Read more</a>
								</div>
							</div>
						</div><!--box end-->
					</div>
				<?php endforeach; ?>
			<?php else: ?>
				<div class="col-12 text-center">
					<p>No blogs found.</p>
				</div>
			<?php endif; ?>
		</div>

		<!-- Pagination -->
		<?php if (isset($totalPages) && $totalPages > 1): ?>
			<div class="row mt-5">
				<div class="col-12">
					<nav aria-label="Blog pagination">
						<ul class="pagination justify-content-center gap-3">
							<li class="page-item <?= ($currentPage <= 1) ? 'disabled' : '' ?>">
								<a class="page-link prev-next" href="<?= ($currentPage > 1) ? pagination_url($currentPage - 1) : 'javascript:;' ?>" aria-label="Previous">
									<i class="bi bi-arrow-left me-2"></i> Previous
								</a>
							</li>

							<div class="d-flex gap-2">
								<?php for ($i = 1; $i <= $totalPages; $i++): ?>
									<li class="page-item <?= ($i == $currentPage) ? 'active' : '' ?>">
										<a class="page-link" href="<?= pagination_url($i) ?>"><?= $i ?></a>
									</li>
								<?php endfor; ?>
							</div>

							<li class="page-item <?= ($currentPage >= $totalPages) ? 'disabled' : '' ?>">
								<a class="page-link prev-next" href="<?= ($currentPage < $totalPages) ? pagination_url($currentPage + 1) : 'javascript:;' ?>" aria-label="Next">
									Next <i class="bi bi-arrow-right ms-2"></i>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>

<style>
	.blog-box-img img {
		width: 100%;
		height: 270px;
		object-fit: cover;
	}

	a.cat-btn {
		color: #fff;
		background: #2e63d8;
		padding: 10px 30px;
		border-radius: 9px;
		text-transform: uppercase;
		font-weight: 500;
		text-decoration: none;
	}

	a.cat-btn.active {
		background: white;
		color: #2e63d8;
		border: 1px solid #2e63d8;
	}

	a.cat-btn:hover {
		background: white;
		color: #2e63d8;
		border: 1px solid #2e63d8;
	}

	/* Pagination Styles */
	.pagination .page-link {
		color: #2e63d8;
		border: 1px solid #2e63d8;
		border-radius: 8px !important;
		padding: 10px 18px;
		font-weight: 600;
		transition: 0.3s;
		display: flex;
		align-items: center;
		justify-content: center;
		text-decoration: none;
	}

	.pagination .page-item.active .page-link {
		background-color: #2e63d8;
		border-color: #2e63d8;
		color: #fff;
	}

	.pagination .page-link:hover:not(.disabled) {
		background-color: #f0f4ff;
		color: #2e63d8;
	}

	.pagination .page-link.prev-next {
		padding: 10px 25px;
		background-color: #fff;
	}

	.pagination .page-item.disabled .page-link {
		color: #ccc;
		border-color: #eee;
		cursor: not-allowed;
		background-color: #fafafa;
	}

	.pagination .page-item.disabled .page-link i {
		color: #ccc;
	}
</style>