<div class="page-builder-content">
    <?php
    if (!empty($page['content'])) {
        try {
            // Handle [contact-form] shortcode
            $content = str_replace(
                '[contact-form]',
                "<?php include __DIR__ . '/../component/forms/contact-form.php'; ?>",
                $page['content']
            );
            // Evaluate PHP
            eval('?>' . $content);
        } catch (\Throwable $e) {
            echo "Error processing page content: " . $e->getMessage();
        }
    }
    ?>
</div>