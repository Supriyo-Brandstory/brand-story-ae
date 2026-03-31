<?php

/**
 * Live Preview & Editor Template
 * This view renders the frontend layout and injects the live editing bridge.
 */

// Enable error reporting for debugging preview issues
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 1. Prepare data for the frontend layout
$title = $title ?? 'Page Preview';
$content = $content ?? '';
$custom_class = $custom_class ?? '';
$template = $template ?? 'default';

// 2. Render the frontend layout into a buffer
ob_start();
try {
    include __DIR__ . '/../../layouts/frontend/layout.php';
} catch (Exception $e) {
    echo "Preview Rendering Error: " . $e->getMessage();
}
$html = ob_get_clean();

// 2.1 Fix relative paths and inject custom CSS
$baseUrl = base_url();
if (strpos($html, '<head>') !== false) {
    $injections = "<base href=\"{$baseUrl}/\">";
    if (!empty($custom_css)) {
        $injections .= "\n    <style id=\"live-editor-custom-css\">{$custom_css}</style>";
    }
    $html = str_replace('<head>', "<head>\n    " . $injections, $html);
}

// 3. If live editor mode is active, inject the bridge and media picker
if (isset($is_live_editor) && $is_live_editor):
    // Capture Media Picker
    ob_start();
    include __DIR__ . '/../components/media_picker.php';
    $mediaPickerHtml = ob_get_clean();

    // The Bridge Script
    $bridgeScript = <<<'JS'
    <script>
        (function() {
            /**
             * Live Editor Bridge
             */
            console.log('Live Editor Bridge: Initializing...');
            
            // --- UI Injection ---
            const style = document.createElement('style');
            style.innerHTML = `
                .live-edit-outline { outline: 2px dashed #a15bff !important; transition: outline 0.2s; cursor: pointer !important; position: relative !important; }
                .live-edit-outline-img { outline: 2px solid #0dcaf0 !important; }
                .live-edit-outline-bg { outline: 2px solid #ffc107 !important; }
                
                /* Persistent Edit Icons */
                /* Persistent Edit Icons */
                .editable-marker { position: absolute; top: 5px; right: 5px; background: #a15bff; color: white !important; width: 24px; height: 24px; border-radius: 4px; display: flex; align-items: center; justify-content: center; z-index: 1000; font-size: 14px; box-shadow: 0 2px 5px rgba(0,0,0,0.3); cursor: pointer !important; }
                .editable-marker-bg { background: #ffc107; color: black !important; }
                .editable-marker-img { background: #0dcaf0; }

                [contenteditable="true"] { cursor: text !important; background: rgba(161, 91, 191, 0.1) !important; outline: 3px solid #a15bff !important; }
                .live-editor-toolbar { position: fixed; top: 20px; right: 20px; z-index: 2000000; display: flex; gap: 10px; }
                .live-editor-btn { border: none; padding: 10px 20px; border-radius: 8px; cursor: pointer; box-shadow: 0 4px 15px rgba(0,0,0,0.3); font-weight: bold; transition: all 0.2s; font-size: 14px; color: white !important; display: flex; align-items: center; gap: 8px; font-family: sans-serif; text-decoration: none !important; }
                .live-editor-btn-save { background: #198754; }
                .live-editor-btn-close { background: #dc3545; }
                #mediaPickerModal { z-index: 2000005 !important; }
                .modal-backdrop { z-index: 2000004 !important; }
            `;
            document.head.appendChild(style);

            // Load Icons
            const iconLink = document.createElement('link');
            iconLink.rel = 'stylesheet';
            iconLink.href = 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css';
            document.head.appendChild(iconLink);
            
            // Load BS5 CSS for Media Picker
            const bsLink = document.createElement('link');
            bsLink.rel = 'stylesheet';
            bsLink.href = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css';
            document.head.appendChild(bsLink);

            // Function to load BS5 JS if needed but avoiding conflicts
            function ensureBootstrap() {
                if (typeof bootstrap === 'undefined' || !bootstrap.Modal) {
                    const script = document.createElement('script');
                    script.src = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js';
                    document.head.appendChild(script);
                }
            }
            ensureBootstrap();

            // --- Tracking Functions ---
            function relativizeUrl(url) {
                if (!url || typeof url !== 'string') return url;
                if (url.startsWith('data:')) return url;
                try {
                    const origin = window.location.origin;
                    if (url.startsWith(origin)) {
                        return url.substring(origin.length);
                    }
                    // Handle cases where the origin is not prefixing but it's still absolute
                    if (url.startsWith('http://') || url.startsWith('https://')) {
                        const urlObj = new URL(url);
                        if (urlObj.origin === origin) {
                            return urlObj.pathname + urlObj.search + urlObj.hash;
                        }
                    }
                } catch(e) {}
                return url;
            }

            function getBgUrl(el) {
                try {
                    // Try to get raw attribute first for exact editor matching
                    const styleAttr = el.getAttribute('style');
                    if (styleAttr) {
                        // More robust match for url() anywhere in the background property
                        const match = styleAttr.match(/(?:background-image|background)\s*:\s*([^;]*url\(['\"]?([^'\"]+)['\"]?\)[^;]*)/i);
                        if (match) {
                           let urlRaw = match[2]; // match[2] is the URL, match[1] is the whole value
                           // If path was distorted, it'll look like " assets="" images="" ... banner.webp"
                           if (urlRaw.includes('=""')) {
                               urlRaw = urlRaw.replace(/\s*[a-z0-9-_]+=""\s*/gi, '/').replace(/^\/+/, '/');
                           }
                           return relativizeUrl(urlRaw.trim());
                        }
                    }
                    // Fallback to computed style (always returns absolute URL)
                    const style = window.getComputedStyle(el);
                    const bg = style.backgroundImage;
                    if (bg && bg !== 'none') {
                        const match = bg.match(/url\(['\"]?([^'\"]+)['\"]?\)/);
                        return match ? relativizeUrl(match[1]) : null;
                    }
                } catch(e) {}
                return null;
            }

            function tagElements() {
                // Image markers (Outline only)
                document.querySelectorAll('img').forEach(img => {
                    if (!img.dataset.originalSrc) {
                        img.dataset.originalSrc = relativizeUrl(img.getAttribute('src') || img.src);
                        img.classList.add('live-edit-outline-img');
                    }
                });
                // Background markers
                document.querySelectorAll('*').forEach(el => {
                    if (el.tagName === 'SCRIPT' || el.tagName === 'STYLE' || el.closest('.live-editor-toolbar') || el.classList.contains('editable-marker')) return;
                    
                    const bg = getBgUrl(el);
                    if (bg && !el.dataset.originalBg) {
                        el.dataset.originalBg = bg;
                        el.classList.add('live-edit-outline-bg');
                        // Add marker if not already present
                        if (!el.querySelector('.editable-marker-bg')) {
                            const marker = document.createElement('div');
                            marker.className = 'editable-marker editable-marker-bg';
                            marker.innerHTML = '<i class="bi bi-brush"></i>';
                            if (window.getComputedStyle(el).position === 'static') {
                                el.style.position = 'relative';
                            }
                            el.appendChild(marker);
                        }
                    }
                });
            }
            tagElements();
            setInterval(tagElements, 2000); 

            function applyUpdate(url, originalSrc, isBg) {
                console.log('Bridge: Applying update to', originalSrc, '->', url);
                const selector = isBg ? '*' : 'img';
                const normOriginal = relativizeUrl(originalSrc);
                const normUrl = relativizeUrl(url);

                document.querySelectorAll(selector).forEach(el => {
                    if (isBg) {
                        const currentBg = getBgUrl(el);
                        if (el.dataset.originalBg === originalSrc || el.dataset.originalBg === normOriginal || currentBg === originalSrc || currentBg === normOriginal) {
                            el.style.backgroundImage = `url('${url}')`;
                            el.style.backgroundSize = 'cover';
                            el.dataset.originalBg = normUrl;
                        }
                    } else {
                        const currentSrc = relativizeUrl(el.getAttribute('src'));
                        if (el.dataset.originalSrc === originalSrc || el.dataset.originalSrc === normOriginal || currentSrc === originalSrc || currentSrc === normOriginal) {
                            el.src = url;
                            el.dataset.originalSrc = normUrl;
                        }
                    }
                });
            }

            // --- Event Listeners ---
            document.addEventListener('mouseover', function(e) {
                const target = e.target;
                if (target.closest('.live-editor-toolbar') || target.closest('#mediaPickerModal')) return;
                
                const bgEl = (function findBg(el) {
                    let cur = el;
                    while(cur && cur !== document.body) { if(getBgUrl(cur)) return cur; cur = cur.parentElement; }
                    return null;
                })(target);

                if (target.tagName === 'IMG') {
                    target.classList.add('live-edit-outline', 'live-edit-outline-img');
                }
                
                if (bgEl) {
                    bgEl.classList.add('live-edit-outline', 'live-edit-outline-bg');
                }
                
                if (!['SCRIPT', 'STYLE', 'SVG', 'VIDEO', 'IFRAME', 'CANVAS', 'IMG'].includes(target.tagName) && target.innerText.trim() !== '') {
                    target.classList.add('live-edit-outline', 'live-text-editable');
                }
            });

            document.addEventListener('mouseout', function(e) {
                e.target.classList.remove('live-edit-outline', 'live-edit-outline-img', 'live-edit-outline-bg');
                // Also clean up parents because of findBg
                let p = e.target;
                while(p && p !== document.body) {
                    p.classList.remove('live-edit-outline', 'live-edit-outline-bg');
                    p = p.parentElement;
                }
            });

            document.addEventListener('click', function(e) {
                const target = e.target;
                if (target.closest('.live-editor-toolbar') || target.closest('#mediaPickerModal')) return;

                const bgEl = (function findBg(el) {
                    let cur = el;
                    while(cur && cur !== document.body) { if(getBgUrl(cur)) return cur; cur = cur.parentElement; }
                    return null;
                })(target);

                const opener = window.opener || window.parent;
                
                if (target.tagName === 'A' || target.closest('a')) {
                   e.preventDefault(); e.stopPropagation();
                }

                let src = null;
                let typeAttr = null;

                const marker = target.closest('.editable-marker');

                if (target.tagName === 'IMG') {
                    // standard image editing on click anywhere on image
                    e.preventDefault();
                    e.stopPropagation();
                    src = target.dataset.originalSrc || target.getAttribute('src');
                    typeAttr = 'img';
                } else if (marker) {
                    // Only open background media picker if the marker was clicked
                    e.preventDefault();
                    e.stopPropagation();
                    const bgEl = marker.parentElement;
                    if (bgEl.dataset.originalBg || getBgUrl(bgEl)) {
                        src = bgEl.dataset.originalBg || getBgUrl(bgEl);
                        typeAttr = 'bg';
                    }
                }

                if (src) {
                    if (typeof openMediaPicker === 'function') {
                        openMediaPicker(function(url) {
                            applyUpdate(url, src, typeAttr === 'bg');
                            if (opener && opener !== window) {
                                opener.postMessage({
                                    type: 'updateContent',
                                    action: 'changeImage',
                                    typeAttr: typeAttr,
                                    src: src,
                                    newValue: url
                                }, '*');
                            }
                        });
                    }
                } else if (target.classList.contains('live-text-editable')) {
                    const oldHtml = target.innerHTML.trim();
                    target.contentEditable = "true";
                    target.focus();
                    target.onblur = function() {
                        target.contentEditable = "false";
                        const newHtml = target.innerHTML.trim();
                        if (oldHtml !== newHtml && opener && opener !== window) {
                            opener.postMessage({
                                type: 'updateContent',
                                action: 'changeHtml', 
                                oldHtml: oldHtml, 
                                newHtml: newHtml
                            }, '*');
                        }
                    };
                }
            }, true);

            // Add Toolbar
            const tb = document.createElement('div');
            tb.className = 'live-editor-toolbar';
            tb.innerHTML = `
                <button class="live-editor-btn live-editor-btn-close" onclick="window.close()"><i class="bi bi-x-circle"></i> Close</button>
                <button class="live-editor-btn live-editor-btn-save" id="btn-save-bridge"><i class="bi bi-save2"></i> Save</button>
            `;
            document.body.appendChild(tb);
            document.getElementById('btn-save-bridge').onclick = () => {
                const opener = window.opener || window.parent;
                if (opener && opener !== window) {
                   opener.postMessage({ type: 'saveChanges' }, '*');
                   
                   // Temporary feedback on button to allow multiple saves
                   const btn = document.getElementById('btn-save-bridge');
                   const originalHtml = btn.innerHTML;
                   btn.innerHTML = '<i class="bi bi-check-circle-fill"></i> Saved!';
                   btn.classList.add('btn-success');
                   
                   setTimeout(() => {
                       btn.innerHTML = originalHtml;
                       btn.classList.remove('btn-success');
                   }, 3000);
                   
                   // Temporary status message
                   const status = document.createElement('div');
                   status.style = 'position:fixed; bottom:20px; right:20px; background:rgba(0,0,0,0.8); color:white; padding:12px 24px; border-radius:30px; font-weight:bold; z-index:2100000; animation: bounceIn 0.5s;';
                   status.innerHTML = '<i class="bi bi-cloud-upload"></i> Save Command Sent to Dashboard...';
                   document.body.appendChild(status);
                   setTimeout(() => status.remove(), 4000);
                }
            };

            console.log('Live Editor Bridge: Ready.');
        })();
    </script>
JS;

    // Final Assembly
    if (strpos($html, '</body>') !== false) {
        $html = str_replace('</body>', $mediaPickerHtml . $bridgeScript . '</body>', $html);
    } else {
        $html .= $mediaPickerHtml . $bridgeScript;
    }
endif;

// Out to browser
echo $html;
