<main class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">
            <i class="bi bi-file-earmark-plus text-primary me-2"></i> Create New Page
        </h1>
        <a href="<?= route('admin.pages.index') ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back
        </a>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0">Page Details</h5>
                </div>

                <form id="mainPageForm" action="<?= route('admin.pages.store') ?>" method="POST">
                    <?= csrf_token() ?>

                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label fw-semibold">Page Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter page title" required onkeyup="generateSlug(this.value)">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="slug" class="form-label fw-semibold">URL Slug</label>
                                <div class="input-group">
                                    <span class="input-group-text"><?= base_url() ?>/</span>
                                    <input type="text" class="form-control" id="slug" name="slug" placeholder="page-url-slug" required>
                                </div>
                                <small class="text-muted">Unique identifier for the page URL.</small>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="template" class="form-label fw-semibold">Choose Template</label>
                                <select class="form-select" id="template" name="template" required onchange="loadTemplate(this.value)">
                                    <option value="">-- Select Template --</option>
                                    <?php foreach ($templates as $tmpl): ?>
                                        <option value="<?= htmlspecialchars($tmpl) ?>"><?= htmlspecialchars($tmpl) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="text-muted">Templates are loaded from <code>app/Views/customlayout/</code></small>
                            </div>
                            <div class="col-md-6 mb-3" id="customClassWrapper">
                                <label for="custom_class" class="form-label fw-semibold">Custom CSS Class (Optional)</label>
                                <input type="text" class="form-control" id="custom_class" name="custom_class" placeholder="e.g. dm-agency-dubai">
                                <small class="text-muted">Overrides the class name defined in the template file.</small>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <label for="content" class="form-label fw-semibold mb-0">Page Content (HTML/Code)</label>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-info" onclick="toggleFullScreen()">
                                        <i class="bi bi-fullscreen"></i> Fullscreen Editor
                                    </button>
                                    <button type="button" class="btn btn-sm btn-info text-white" onclick="openPreview()">
                                        <i class="bi bi-eye"></i> Live Preview
                                    </button>
                                </div>
                            </div>
                            <div id="ace-editor" style="height: 600px; border: 1px solid #ced4da; border-radius: 0.375rem;"></div>
                            <textarea name="content" id="content-hidden" style="display:none;"></textarea>
                        </div>
                    </div>

                    <div class="card-footer bg-light d-flex justify-content-between py-3">
                        <a href="<?= route('admin.pages.index') ?>" class="btn btn-secondary px-4">Cancel</a>
                        <button type="submit" class="btn btn-primary px-5">Save Page</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>



<form id="previewForm" action="<?= route('admin.pages.preview') ?>" method="POST" target="previewWindow">
    <?= csrf_token() ?>
    <input type="hidden" name="title" id="preview-title">
    <input type="hidden" name="template" id="preview-template">
    <input type="hidden" name="custom_class" id="preview-custom_class">
    <input type="hidden" name="content" id="preview-content">
    <input type="hidden" name="is_live_editor" value="true">
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.32.2/ace.js"></script>
<script>
    // Handle messages from the preview window for live editing
    window.addEventListener('message', function(event) {
        if (!event.data) return;
        
        const previewWin = event.source;
        console.log('Parent received message:', event.data.type, event.data.action);

        if (event.data.type === 'saveChanges') {
            saveFromPreview();
            return;
        }

        if (event.data.type === 'updateContent') {
            if (event.data.action === 'changeImage') {
                console.log('Image change requested for:', event.data.src);
                
                // If newValue is provided, the preview tab picked it locally
                if (event.data.newValue) {
                    let currentContent = editor.getValue();
                    let newContent;
                    
                    if (event.data.typeAttr === 'bg') {
                        const escaped = event.data.src.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
                        const re = new RegExp('url\\(\\s*[\'"]?' + escaped + '[\'"]?\\s*\\)', 'g');
                        newContent = currentContent.replace(re, 'url("' + event.data.newValue + '")');
                    } else {
                        newContent = currentContent.replace(event.data.src, event.data.newValue);
                    }
                    
                    if (newContent !== currentContent) {
                        editor.setValue(newContent, -1);
                    }
                    return;
                }

                if (typeof openMediaPicker === 'function') {
                    openMediaPicker(function(url) {
                        console.log('Media selected:', url);
                        
                        // Use captured previewWin reference instead of event.source
                        if (previewWin) {
                            previewWin.postMessage({ 
                                type: 'applyImage', 
                                url: url, 
                                originalSrc: event.data.src,
                                isBg: event.data.typeAttr === 'bg'
                            }, '*');
                        }
                        
                        let currentContent = editor.getValue();
                        // Replace the exact string found in the bridge script
                        const newContent = currentContent.replace(event.data.src, url);
                        if (newContent !== currentContent) {
                            editor.setValue(newContent, -1);
                        }
                    });
                } else {
                    console.error('openMediaPicker is not defined');
                    alert('Critical Error: Media Picker is missing.');
                }
            }
            
            if (event.data.action === 'changeText') {
                 let currentContent = editor.getValue();
                 const oldText = event.data.oldValue;
                 const newText = event.data.newValue;
                 
                 if (oldText && newText && oldText !== newText) {
                     const escaped = oldText.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
                     const re = new RegExp(escaped, 'g');
                     const newContent = currentContent.replace(re, newText);
                     
                     if (newContent !== currentContent) {
                         editor.setValue(newContent, -1);
                     }
                 }
            }
        }
    });

    // Initialize Ace Editor
    const editor = ace.edit("ace-editor");
    editor.setTheme("ace/theme/monokai");
    editor.session.setMode("ace/mode/html");
    editor.setOptions({
        fontSize: "14px",
        showPrintMargin: false,
        enableBasicAutocompletion: true,
        enableLiveAutocompletion: true,
        useWorker: false 
    });

    // Sync editor to hidden field on change
    const hiddenTextarea = document.getElementById('content-hidden');
    editor.getSession().on('change', function() {
        hiddenTextarea.value = editor.getValue();
    });

    function generateSlug(text) {
        if (!text) return;
        const slug = text.toLowerCase()
            .replace(/[^\w ]+/g, '')
            .replace(/ +/g, '-');
        document.getElementById('slug').value = slug;
    }

    let lastTemplate = '';

    function loadTemplate(template) {
        if (!template) return;

        if (template === 'blank.php' || confirm('Choosing a template will overwrite current content. Continue?')) {
            fetch('<?= route('admin.pages.get_template_content') ?>?template=' + template)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        editor.setValue(data.content, -1);
                        lastTemplate = template;
                    } else {
                        alert(data.message);
                    }
                })
                .catch(err => {
                    console.error('Error loading template:', err);
                    alert('Error loading template content.');
                });
        } else {
            document.getElementById('template').value = lastTemplate;
        }
    }

    function openPreview() {
        document.getElementById('preview-title').value = document.getElementById('title').value;
        document.getElementById('preview-template').value = document.getElementById('template').value;
        document.getElementById('preview-custom_class').value = document.getElementById('custom_class').value;
        document.getElementById('preview-content').value = editor.getValue();
        
        const previewWin = window.open('', 'previewWindow');
        const form = document.getElementById('previewForm');
        form.target = 'previewWindow';
        form.submit();
    }

    function saveFromPreview() {
        try {
            console.log('Starting save (create) from preview...');
            const hiddenTextarea = document.getElementById('content-hidden');
            const editorValue = typeof editor !== 'undefined' ? editor.getValue() : '';
            if (hiddenTextarea) hiddenTextarea.value = editorValue;

            let mainForm = document.getElementById('mainPageForm') || document.querySelector('form[action*="store"]');
            
            if (mainForm) {
                const existingRedir = mainForm.querySelector('input[name="redirect_edit"]');
                if (existingRedir) existingRedir.remove();

                let redir = document.createElement('input');
                redir.type = 'hidden';
                redir.name = 'redirect_edit';
                redir.value = '1';
                mainForm.appendChild(redir);
                
                window.focus();
                
                mainForm.submit();
            } else {
                console.error('CRITICAL: mainPageForm/store form not found');
                alert('Internal Error: Could not find the save form.');
            }
        } catch (err) {
            console.error('Error in saveFromPreview:', err);
            alert('Error during save: ' + err.message);
        }
    }

    function setPreviewSize(width) {
        document.getElementById('previewIframe').style.width = width;
        const btns = document.querySelectorAll('.btn-group-sm .btn');
        btns.forEach(btn => btn.classList.remove('active'));
        event.currentTarget.classList.add('active');
    }

    function toggleFullScreen() {
        const editorDiv = document.getElementById('ace-editor');
        if (!document.fullscreenElement) {
            editorDiv.requestFullscreen().catch(err => {
                alert(`Error: ${err.message}`);
            });
        } else {
            document.exitFullscreen();
        }
    }


</script>