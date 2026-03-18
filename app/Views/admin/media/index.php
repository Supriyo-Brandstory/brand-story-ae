<div class="container-fluid py-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Media Manager</h1>
        <div class="btn-toolbar mb-2 mb-md-0 d-flex gap-2">
            <div class="input-group input-group-sm me-2" style="width: 200px;">
                <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                <input type="text" id="mediaSearch" class="form-control border-start-0" placeholder="Search files..." onkeyup="filterMedia(this.value)">
            </div>
            <button type="button" class="btn btn-sm btn-outline-primary" onclick="showCreateFolderModal()">
                <i class="bi bi-folder-plus"></i> New Folder
            </button>
            <button type="button" class="btn btn-sm btn-primary" onclick="document.getElementById('fileInput').click()">
                <i class="bi bi-upload"></i> Upload File
            </button>
            <input type="file" id="fileInput" class="d-none" onchange="uploadFile(this)">
        </div>
    </div>

    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb" id="mediaBreadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)" onclick="loadFolder('')"><i class="bi bi-house"></i> Root</a></li>
        </ol>
    </nav>

    <div class="row g-3" id="mediaGrid">
        <!-- Media items will be loaded here via JS -->
    </div>
</div>

<!-- Create Folder Modal -->
<div class="modal fade" id="createFolderModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Folder</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="text" id="newFolderName" class="form-control" placeholder="Folder Name">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="createFolder()">Create</button>
            </div>
        </div>
    </div>
</div>

<style>
    .media-item {
        transition: transform 0.2s;
        cursor: pointer;
    }

    .media-item:hover {
        transform: translateY(-5px);
    }

    .media-card {
        height: 100%;
        border: 1px solid #eee;
        border-radius: 8px;
        overflow: hidden;
        background: #fff;
    }

    .media-preview {
        height: 140px;
        background: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        /* background-image: linear-gradient(45deg, #f0f0f0 25%, transparent 25%, transparent 75%, #f0f0f0 75%, #f0f0f0),
            linear-gradient(45deg, #f0f0f0 25%, transparent 25%, transparent 75%, #f0f0f0 75%, #f0f0f0); */
        background-size: 20px 20px;
        background-position: 0 0, 10px 10px;
    }

    .media-preview img {
        max-width: 100%;
        height: 140px;
        object-fit: cover;
    }

    .media-preview i {
        font-size: 3.5rem;
        color: #ddd;
    }

    .media-info {
        padding: 10px;
        font-size: 0.8rem;
        border-top: 1px solid #eee;
    }

    .media-name {
        font-weight: 600;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 2px;
        color: #333;
    }

    .media-actions {
        position: absolute;
        top: 5px;
        right: 5px;
        display: none;
        z-index: 10;
        background: rgba(255, 255, 255, 0.9);
        padding: 3px;
        border-radius: 6px;
    }

    .media-item:hover .media-actions {
        display: flex;
        gap: 4px;
    }

    .media-actions .btn {
        padding: 2px 4px !important;
        font-size: 0.65rem !important;
        line-height: 1;
    }

    .media-actions .bi {
        font-size: 1rem !important;
    }

    .breadcrumb-item a {
        text-decoration: none;
        color: var(--bs-primary);
    }
</style>

<script>
    let currentFolder = '';
    let allItems = [];
    let mediaGrid, breadcrumb, searchInput, createFolderModal;

    function initMediaManager() {
        mediaGrid = document.getElementById('mediaGrid');
        breadcrumb = document.getElementById('mediaBreadcrumb');
        searchInput = document.getElementById('mediaSearch');

        if (typeof bootstrap !== 'undefined') {
            createFolderModal = new bootstrap.Modal(document.getElementById('createFolderModal'));
        } else {
            console.error('Bootstrap is not loaded');
        }

        loadFolder('');
    }

    function loadFolder(folder) {
        currentFolder = folder;
        if (mediaGrid) {
            mediaGrid.innerHTML = '<div class="col-12 text-center py-5"><div class="spinner-border text-primary" role="status"></div><p class="mt-2">Loading items...</p></div>';
        }
        if (searchInput) searchInput.value = '';

        fetch(`<?= route('admin.media.list') ?>?folder=${encodeURIComponent(folder)}`)
            .then(res => res.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                    return;
                }
                allItems = data.items;
                renderMedia(allItems);
                renderBreadcrumb(folder);
            })
            .catch(err => {
                console.error('Fetch error:', err);
                if (mediaGrid) mediaGrid.innerHTML = '<div class="col-12 text-center py-5 text-danger">Failed to load media</div>';
            });
    }

    function renderMedia(items) {
        mediaGrid.innerHTML = '';
        if (items.length === 0) {
            mediaGrid.innerHTML = '<div class="col-12 text-center py-5 text-muted"><h4>No items found</h4></div>';
            return;
        }

        items.forEach(item => {
            const col = document.createElement('div');
            col.className = 'col-6 col-md-4 col-lg-3 col-xl-2 media-item';

            let preview = '';
            const ext = item.extension;

            if (item.isDir) {
                preview = '<i class="bi bi-folder-fill text-warning"></i>';
            } else if (['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'].includes(ext)) {
                preview = `<img src="${item.url}" alt="${item.name}" loading="lazy">`;
            } else if (['mp4', 'webm', 'ogg', 'avi', 'mov'].includes(ext)) {
                preview = '<i class="bi bi-file-earmark-play text-primary"></i>';
            } else if (ext === 'pdf') {
                preview = '<i class="bi bi-file-earmark-pdf text-danger"></i>';
            } else if (['zip', 'rar', '7z', 'tar', 'gz'].includes(ext)) {
                preview = '<i class="bi bi-file-earmark-zip text-warning"></i>';
            } else if (['doc', 'docx'].includes(ext)) {
                preview = '<i class="bi bi-file-earmark-word text-info"></i>';
            } else if (['xls', 'xlsx'].includes(ext)) {
                preview = '<i class="bi bi-file-earmark-excel text-success"></i>';
            } else {
                preview = '<i class="bi bi-file-earmark text-secondary"></i>';
            }

            col.innerHTML = `
                <div class="media-card shadow-sm" onclick="${item.isDir ? `loadFolder('${item.relativePath}')` : `previewItem('${item.url}')`}">
                    <div class="media-preview">
                        ${preview}
                        <div class="media-actions">
                             ${!item.isDir ? `
                            <button class="btn btn-sm btn-primary px-2 py-1" onclick="event.stopPropagation(); copyLink('${item.url}')" title="Copy URL">
                                <i class="bi bi-link-45deg"></i>
                            </button>
                            ` : ''}
                            <button class="btn btn-sm btn-danger px-2 py-1" onclick="event.stopPropagation(); deleteItem('${item.relativePath}')" title="Delete">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="media-info">
                        <div class="media-name" title="${item.name}">${item.name}</div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted">${item.size}</span>
                            ${!item.isDir ? `<span class="badge bg-light text-dark text-uppercase" style="font-size: 0.65rem;">${ext}</span>` : ''}
                        </div>
                    </div>
                </div>
            `;
            mediaGrid.appendChild(col);
        });
    }

    function filterMedia(query) {
        query = query.toLowerCase();
        const filtered = allItems.filter(item => item.name.toLowerCase().includes(query));
        renderMedia(filtered);
    }

    function renderBreadcrumb(folder) {
        breadcrumb.innerHTML = '<li class="breadcrumb-item"><a href="javascript:void(0)" onclick="loadFolder(\'\')"><i class="bi bi-house"></i> Root</a></li>';
        if (!folder) return;

        const parts = folder.split('/');
        let path = '';
        parts.forEach((part, index) => {
            path += (index > 0 ? '/' : '') + part;
            if (index === parts.length - 1) {
                breadcrumb.innerHTML += `<li class="breadcrumb-item active">${part}</li>`;
            } else {
                breadcrumb.innerHTML += `<li class="breadcrumb-item"><a href="javascript:void(0)" onclick="loadFolder('${path}')">${part}</a></li>`;
            }
        });
    }

    function showCreateFolderModal() {
        document.getElementById('newFolderName').value = '';
        createFolderModal.show();
    }

    function createFolder() {
        const name = document.getElementById('newFolderName').value.trim();
        if (!name) return;

        fetch('<?= route('admin.media.createFolder') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    parent: currentFolder,
                    name: name
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    createFolderModal.hide();
                    loadFolder(currentFolder);
                } else {
                    alert(data.message);
                }
            });
    }

    function uploadFile(input) {
        if (!input.files || !input.files[0]) return;

        const formData = new FormData();
        formData.append('file', input.files[0]);
        formData.append('folder', currentFolder);

        fetch('<?= route('admin.media.upload') ?>', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    loadFolder(currentFolder);
                } else {
                    alert(data.message);
                }
                input.value = '';
            });
    }

    function deleteItem(path) {
        if (!confirm('Are you sure you want to delete this item?')) return;

        fetch('<?= route('admin.media.delete') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    path: path
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    loadFolder(currentFolder);
                } else {
                    alert(data.message);
                }
            });
    }

    function copyLink(url) {
        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(url).then(() => {
                alert('Link copied to clipboard');
            }).catch(err => {
                console.error('Clipboard error:', err);
                fallbackCopy(url);
            });
        } else {
            fallbackCopy(url);
        }
    }

    function fallbackCopy(text) {
        const textArea = document.createElement("textarea");
        textArea.value = text;
        textArea.style.position = "fixed";
        textArea.style.left = "-999999px";
        textArea.style.top = "-999999px";
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();
        try {
            document.execCommand('copy');
            alert('Link copied to clipboard');
        } catch (err) {
            console.error('Fallback copy failed', err);
            prompt("Could not copy automatically. Please copy this URL manually:", text);
        }
        document.body.removeChild(textArea);
    }

    function previewItem(url) {
        window.open(url, '_blank');
    }

    // Initial load
    document.addEventListener('DOMContentLoaded', () => {
        initMediaManager();
    });
</script>