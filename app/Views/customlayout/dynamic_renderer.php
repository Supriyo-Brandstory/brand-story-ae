<div class="page-builder-content">
    <?php
    if (!empty($page['content'])) {
        try {
            $content = $page['content'];

            // 1. Recover mangled PHP includes (some editors/sanitizers turn <?php into <!--?php )
            // This ensures existing saved pages work without manual database updates.
            $content = preg_replace(
                '/<!--\s*\?php\s+include\s+__DIR__\s+\.\s+[\'"]\/..\/(component\/[^\'"]+)[\'"];?\s*\?-->/i',
                '<?php include __DIR__ . "/../$1"; ?>',
                $content
            );


            // 2. Define Shortcode Mapping
            $shortcodes = [
                '[contact-form]'          => "<?php include __DIR__ . '/../component/forms/contact-form.php'; ?>",
                '[clients-service]'       => "<?php include __DIR__ . '/../component/services/clients.php'; ?>",
                '[stats-service]'         => "<?php include __DIR__ . '/../component/services/stats.php'; ?>",
                '[new-service]'           => "<?php include __DIR__ . '/../component/services/new-service.php'; ?>",
                '[induestries-service]'   => "<?php include __DIR__ . '/../component/services/industries-service.php'; ?>",
            ];

            // 3. Apply Shortcode Replacements
            foreach ($shortcodes as $code => $replacement) {
                $content = str_replace($code, $replacement, $content);
            }

            // 4. Performance Optimizations (CSS minification & lazy loading)
            $content = str_replace(['assets/css/home-2.css', 'home-2.css'], 'assets/css/home-2.min.css?v=2.0', $content);
            $content = preg_replace_callback('/<img\s+([^>]+)>/i', function($matches) {
                $imgTag = $matches[0];
                $attributes = $matches[1];
                if (stripos($attributes, 'loading=') === false) {
                    $imgTag = str_replace('<img ', '<img loading="lazy" decoding="async" ', $imgTag);
                }
                return $imgTag;
            }, $content);

            // 5. Evaluate PHP Content
            eval('?>' . $content);
        } catch (\Throwable $e) {
            echo "Error processing page content: " . $e->getMessage();
        }
    }
    ?>
</div>