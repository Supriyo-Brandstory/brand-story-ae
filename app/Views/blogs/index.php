<section class="blogs-common-banner blogs-listing-banner sp-50">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<h1 class="text-white mt-4 text-center text-md-start">Blogs</h1>
			</div>
		</div>
	</div>
</section>

<!-- Category Filter Bar -->
<section class="blog-category-filter mt-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="d-flex flex-wrap justify-content-center gap-2">
					<a href="<?= route('blogs') ?>" class="cat-btn <?= !isset($_GET['category']) ? 'active' : '' ?>">All</a>
					<?php if (!empty($categories)): ?>
						<?php foreach ($categories as $category): ?>
							<a href="<?= route('blogs') ?>?category=<?= $category['slug'] ?>" class="cat-btn <?= (isset($_GET['category']) && $_GET['category'] == $category['slug']) ? 'active' : '' ?>">
								<?= htmlspecialchars($category['name']) ?>
							</a>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
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
									<a href="<?= route('blogs.show', ['slug' => $blog['slug']]) ?>" style="text-decoration:none;color:#000">
										<?= htmlspecialchars($blog['title']) ?>
									</a>
								</h6>
								<p><?= htmlspecialchars(substr(strip_tags($blog['description']), 0, 150)) ?>...</p>
								<div class="blog-box-link">
									<a href="<?= route('blogs.show', ['slug' => $blog['slug']]) ?>">Read more</a>
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
	}

	a.cat-btn.active {
		background: white;
		color: #2e63d8;
	}

	a.cat-btn:hover {
		background: white;
		color: #2e63d8;
	}
</style>