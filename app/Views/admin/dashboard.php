   <main class="container-fluid py-4">
       <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
           <h1 class="h2">Dashboard</h1>
           <div class="btn-toolbar mb-2 mb-md-0">
               <div class="text-muted small me-3 align-self-center">
                   <i class="bi bi-info-circle" title="Export to download full backup. Import to restore database and files."></i>
               </div>
               <a href="<?= route('admin.backup.export') ?>" class="btn btn-sm btn-outline-secondary me-2">
                   <i class="bi bi-download"></i> Export
               </a>

               <form action="<?= route('admin.backup.import') ?>" method="post" enctype="multipart/form-data" id="importForm" onsubmit="handleImport(event)">
                   <?= csrf_token() ?>
                   <input type="file" name="backup_file" id="backupFile" style="display: none;" accept=".zip" onchange="document.getElementById('importForm').dispatchEvent(new Event('submit'))">
                   <button type="button" class="btn btn-sm btn-outline-primary" onclick="document.getElementById('backupFile').click()">
                       <i class="bi bi-upload"></i> Import
                   </button>
               </form>
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

   <!-- Loading Overlay -->
   <div id="loadingOverlay" class="d-none position-fixed top-0 start-0 w-100 h-100 bg-white bg-opacity-95 d-flex justify-content-center align-items-center" style="z-index: 1050;">
       <div class="text-center w-50">
           <h4 class="mb-3 text-dark fw-bold">Importing Backup</h4>

           <div class="progress mb-3" style="height: 25px;">
               <div id="importProgressBar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%">0%</div>
           </div>

           <p id="importStatusText" class="text-muted fw-bold">Initializing...</p>

           <div id="importFinalAction" class="mt-4 d-none">
               <button class="btn btn-success" onclick="window.location.reload()">Refresh Dashboard</button>
           </div>
       </div>
   </div>

   <script>
       function handleImport(e) {
           e.preventDefault();

           const form = document.getElementById('importForm');
           const formData = new FormData(form);
           const overlay = document.getElementById('loadingOverlay');
           const statusText = document.getElementById('importStatusText');
           const progressBar = document.getElementById('importProgressBar');
           const finalAction = document.getElementById('importFinalAction');

           // Show Overlay
           overlay.classList.remove('d-none');
           finalAction.classList.add('d-none');
           progressBar.style.width = '0%';
           progressBar.innerText = '0%';
           progressBar.classList.remove('bg-success', 'bg-danger');

           // Start Polling for Progress
           let pollInterval = setInterval(() => {
               fetch('<?= route('admin.backup.progress') ?>')
                   .then(r => r.json())
                   .then(data => {
                       if (data.message) {
                           statusText.innerText = data.message;
                           if (data.percent) {
                               progressBar.style.width = data.percent + '%';
                               progressBar.innerText = data.percent + '%';
                           }
                       }
                   })
                   .catch(err => console.error(err));
           }, 1000); // Poll every 1s

           // Send File
           fetch(form.action, {
                   method: 'POST',
                   body: formData
               })
               .then(response => response.json())
               .then(data => {
                   clearInterval(pollInterval);

                   // Final Update
                   statusText.innerText = data.message;
                   progressBar.style.width = '100%';
                   progressBar.innerText = '100%';

                   if (data.status === 'success') {
                       progressBar.classList.add('bg-success');
                       statusText.classList.remove('text-muted');
                       statusText.classList.add('text-success');

                       // Show Stats
                       if (data.details) {
                           const statsHtml = `
                                <div class="mt-3 text-start d-inline-block border p-3 rounded bg-light">
                                    <h6 class="border-bottom pb-2 mb-2"><i class="bi bi-info-circle me-2"></i>Import Summary</h6>
                                    <div class="mb-1"><i class="bi bi-file-earmark-image me-2 text-primary"></i> Files Restored: <strong>${data.details.files}</strong></div>
                                    <div><i class="bi bi-database me-2 text-primary"></i> Database Queries: <strong>${data.details.queries}</strong></div>
                                </div>
                            `;
                           statusText.insertAdjacentHTML('afterend', statsHtml);
                       }

                   } else {
                       progressBar.classList.add('bg-danger');
                       statusText.classList.remove('text-muted');
                       statusText.classList.add('text-danger');
                   }

                   finalAction.classList.remove('d-none');

                   // Cleanup temp logs
                   // fetch('<?= route('admin.backup.cleanup') ?>', { method: 'POST' });
               })
               .catch(error => {
                   clearInterval(pollInterval);
                   statusText.innerText = "An unexpected error occurred.";
                   progressBar.classList.add('bg-danger');
                   finalAction.classList.remove('d-none');
                   console.error('Error:', error);
               });
       }
   </script>