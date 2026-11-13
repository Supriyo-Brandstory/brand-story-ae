<div class="page-builder-content">
    <?php
    if (!empty($page['content'])) {
        try {
            $content = $page['content'];

            // 1. Recover mangled PHP blocks (some editors/sanitizers turn <?php into <!--?php )
            $content = preg_replace('/<!--\s*\?php([\s\S]*?)\?-->/i', '<?php$1?>', $content);
            $content = preg_replace('/&lt;\?php([\s\S]*?)\?&gt;/i', '<?php$1?>', $content);

            // 2. Advanced Shortcode Parser for [influencer-list]
            // Supports:
            // a) [influencer-list]
            // b) [influencer-list title="Our Exclusive Creators" variant="black" titleColor="white"]
            // c) [influencer-list title="..." variant="black"][ {...}, {...} ][/influencer-list] (JSON dataset)
            $content = preg_replace_callback('/\[influencer-list(?:\s+([^\]]*))?\](?:([\s\S]*?)\[\/influencer-list\])?/i', function($matches) {
                $attrString = $matches[1] ?? '';
                $innerContent = trim($matches[2] ?? '');

                // Parse shortcode attributes
                $attrs = [];
                if (!empty($attrString)) {
                    preg_match_all('/([a-zA-Z0-9_\-]+)=(?:["\']([^"\']*)["\']|([^\s>]+))/', $attrString, $attrMatches, PREG_SET_ORDER);
                    foreach ($attrMatches as $m) {
                        $key = strtolower($m[1]);
                        $val = $m[2] !== '' ? $m[2] : ($m[3] ?? '');
                        $attrs[$key] = $val;
                    }
                }

                // Parse inner JSON if present
                $jsonData = null;
                if (!empty($innerContent)) {
                    $cleanInner = trim(strip_tags($innerContent));
                    $decoded = json_decode($cleanInner, true);
                    if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                        $jsonData = $decoded;
                    }
                }

                // Build PHP executable string
                $phpCode = '<?php ';
                if (isset($attrs['title'])) {
                    $phpCode .= '$title = ' . var_export($attrs['title'], true) . '; ';
                }
                if (isset($attrs['titlecolor'])) {
                    $phpCode .= '$titleColor = ' . var_export($attrs['titlecolor'], true) . '; ';
                }
                if (isset($attrs['variant'])) {
                    $phpCode .= '$variant = ' . var_export($attrs['variant'], true) . '; ';
                }
                if (isset($attrs['gridcol'])) {
                    $phpCode .= '$gridCol = ' . var_export($attrs['gridcol'], true) . '; ';
                }
                if (isset($attrs['limit'])) {
                    $phpCode .= '$limit = ' . (int)$attrs['limit'] . '; ';
                }
                if ($jsonData !== null) {
                    $phpCode .= '$influencers = ' . var_export($jsonData, true) . '; ';
                }
                $phpCode .= "include __DIR__ . '/../component/influencer_card.php'; ?>";

                return $phpCode;
            }, $content);

            // 3. Define Standard Shortcode Mapping
            $shortcodes = [
                '[contact-form]'          => "<?php include __DIR__ . '/../component/forms/contact-form.php'; ?>",
                '[clients-service]'       => "<?php include __DIR__ . '/../component/services/clients.php'; ?>",
                '[stats-service]'         => "<?php include __DIR__ . '/../component/services/stats.php'; ?>",
                '[new-service]'           => "<?php include __DIR__ . '/../component/services/new-service.php'; ?>",
                '[induestries-service]'   => "<?php include __DIR__ . '/../component/services/industries-service.php'; ?>",
            ];

            // 4. Apply Shortcode Replacements
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