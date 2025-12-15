   <main class="container-fluid py-4">
       <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
           <h1 class="h2">Dashboard</h1>
           <div class="btn-toolbar mb-2 mb-md-0">
               <button type="button" class="btn btn-sm btn-outline-secondary">
                   <i class="bi bi-download"></i> Export
               </button>
           </div>
       </div>

       <!-- Example Dashboard Cards -->
       <div class="row">
           <div class="col-xl-4 col-md-6 mb-4">
               <div class="card border-left-primary shadow h-100 py-2">
                   <div class="card-body">
                       <div class="row no-gutters align-items-center">
                           <div class="col me-2">
                               <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Blog Categories</div>
                               <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['blog_categories_count'] ?? 0 ?></div>
                           </div>
                           <div class="col-auto">
                               <i class="bi bi-tags fs-1 text-primary opacity-50"></i>
                           </div>
                       </div>
                   </div>
               </div>
           </div>

           <div class="col-xl-4 col-md-6 mb-4">
               <div class="card border-left-success shadow h-100 py-2">
                   <div class="card-body">
                       <div class="row no-gutters align-items-center">
                           <div class="col me-2">
                               <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Blogs</div>
                               <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['blogs_count'] ?? 0 ?></div>
                           </div>
                           <div class="col-auto">
                               <i class="bi bi-journal-text fs-1 text-success opacity-50"></i>
                           </div>
                       </div>
                   </div>
               </div>
           </div>

           <div class="col-xl-4 col-md-6 mb-4">
               <div class="card border-left-warning shadow h-100 py-2">
                   <div class="card-body">
                       <div class="row no-gutters align-items-center">
                           <div class="col me-2">
                               <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">SEO Pages</div>
                               <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['seo_count'] ?? 0 ?></div>
                           </div>
                           <div class="col-auto">
                               <i class="bi bi-google fs-1 text-warning opacity-50"></i>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>

       <!-- Place your <?= $data ?> here -->
       <div class="bg-white p-4 rounded shadow-sm">
           <p>Welcome, <?= e($data['admin_name'] ?? 'Admin') ?>!</p>
       </div>
   </main>