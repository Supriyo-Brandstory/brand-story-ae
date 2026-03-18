<!-- Media Picker Modal -->
<div class="modal fade" id="mediaPickerModal" tabindex="-1" aria-labelledby="mediaPickerModalLabel" aria-hidden="true" style="z-index: 1060;">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="mediaPickerModalLabel">
                    <i class="bi bi-images me-2"></i> Select Media
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="container-fluid p-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0" id="pickerBreadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)" onclick="loadPickerFolder('')">Root</a></li>
                            </ol>
                        </nav>
                        <div class="d-flex gap-2">
                            <div class="input-group input-group-sm w-auto">
                                <input type="text" class="form-control" id="pickerSearch" placeholder="Search..." onkeyup="filterPickerMedia(this.value)">
                            </div>
                            <button type="button" class="btn btn-sm btn-primary" onclick="document.getElementById('pickerFileInput').click()">
                                <i class="bi bi-upload"></i> Upload
                            </button>
                            <input type="file" id="pickerFileInput" class="d-none" onchange="uploadPickerFile(this)">
                        </div>
                    </div>
                    <div class="row g-2" id="pickerGrid">
                        <!-- Items loaded via JS -->
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<style>
    #pickerGrid .media-item-card {
        border: 1px solid #dee2e6;
        border-radius: 8px;
        overflow: hidden;
        cursor: pointer;
        transition: all 0.2s;
        height: 100%;
        background: #fff;
    }

    #pickerGrid .media-item-card:hover {
        border-color: var(--bs-primary);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }

    #pickerGrid .media-preview {
        height: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8f9fa;
        overflow: hidden;
    }

    #pickerGrid .media-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    #pickerGrid .media-preview i {
        font-size: 2.5rem;
    }

    #pickerGrid .media-name {
        font-size: 0.75rem;
        padding: 5px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        text-align: center;
        background: #fff;
    }
</style>

<script>
    let pickerCurrentFolder = '';
    let pickerAllItems = [];
    let onMediaSelectedCallback = null;

    function openMediaPicker(callback) {
        onMediaSelectedCallback = callback;
        const modal = new bootstrap.Modal(document.getElementById('mediaPickerModal'));
        modal.show();
        loadPickerFolder('');
    }

    function loadPickerFolder(folder) {
        pickerCurrentFolder = folder;
        const grid = document.getElementById('pickerGrid');
        grid.innerHTML = '<div class="col-12 text-center py-5"><div class="spinner-border text-primary"></div></div>';

        fetch(`<?= route('admin.media.list') ?>?folder=${encodeURIComponent(folder)}`)
            .then(res => res.json())
            .then(data => {
                pickerAllItems = data.items;
                renderPickerMedia(pickerAllItems);
                renderPickerBreadcrumb(folder);
            });
    }

    function renderPickerMedia(items) {
        const grid = document.getElementById('pickerGrid');
        grid.innerHTML = '';

        items.forEach(item => {
            const col = document.createElement('div');
            col.className = 'col-4 col-md-3 col-lg-2 mb-2';

            let preview = '';
            if (item.isDir) {
                preview = '<i class="bi bi-folder-fill text-warning"></i>';
            } else if (['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'].includes(item.extension)) {
                preview = `<img src="${item.url}" alt="${item.name}">`;
            } else {
                preview = '<i class="bi bi-file-earmark text-secondary"></i>';
            }

            col.innerHTML = `
                <div class="media-item-card" onclick="${item.isDir ? `loadPickerFolder('${item.relativePath}')` : `selectMediaItem('${item.url}')`}">
                    <div class="media-preview">${preview}</div>
                    <div class="media-name" title="${item.name}">${item.name}</div>
                </div>
            `;
            grid.appendChild(col);
        });
    }

    function selectMediaItem(url) {
        if (onMediaSelectedCallback) {
            onMediaSelectedCallback(url);
        }
        bootstrap.Modal.getInstance(document.getElementById('mediaPickerModal')).hide();
    }

    function renderPickerBreadcrumb(folder) {
        const bc = document.getElementById('pickerBreadcrumb');
        bc.innerHTML = '<li class="breadcrumb-item"><a href="javascript:void(0)" onclick="loadPickerFolder(\'\')">Root</a></li>';
        if (!folder) return;

        const parts = folder.split('/');
        let path = '';
        parts.forEach((part, index) => {
            path += (index > 0 ? '/' : '') + part;
            bc.innerHTML += `<li class="breadcrumb-item ${index === parts.length - 1 ? 'active' : ''}">
                ${index === parts.length - 1 ? part : `<a href="javascript:void(0)" onclick="loadPickerFolder('${path}')">${part}</a>`}
            </li>`;
        });
    }

    function filterPickerMedia(query) {
        query = query.toLowerCase();
        const filtered = pickerAllItems.filter(item => item.name.toLowerCase().includes(query));
        renderPickerMedia(filtered);
    }

    function uploadPickerFile(input) {
        if (!input.files || !input.files[0]) return;
        const formData = new FormData();
        formData.append('file', input.files[0]);
        formData.append('folder', pickerCurrentFolder);
        const grid = document.getElementById('pickerGrid');
        grid.innerHTML = '<div class="col-12 text-center py-5"><div class="spinner-border text-primary"></div><p>Uploading...</p></div>';
        fetch('<?= route('admin.media.upload') ?>', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    loadPickerFolder(pickerCurrentFolder);
                } else {
                    alert(data.message);
                    loadPickerFolder(pickerCurrentFolder);
                }
                input.value = '';
            }).catch(err => {
                alert('An error occurred during upload.');
                loadPickerFolder(pickerCurrentFolder);
            });
    }
</script>