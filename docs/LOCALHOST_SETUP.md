# Running BrandStoryAE on Localhost

You can now run the project directly via `http://localhost/brandstoryae` without any special port commands.

## ✅ Configuration Updated

The configuration has been updated to support subdirectory installation:

**`config/config.php`**:

```php
return [
    'app_name' => 'BrandStoryAE',
    'base_url' => 'http://localhost/brandstoryae',
];
```

## 🚀 How to Run

1. **Start your Web Server** (Apache/Nginx via XAMPP, MAMP, or native).
2. **Ensure the project is in your web root** (e.g., `htdocs` or `www`).
   - If you are using Herd/Valet, you can still access it via `http://brandstoryae.test` (just update `base_url` in config).
3. **Access the site**:
   - Open browser to: **[http://localhost/brandstoryae](http://localhost/brandstoryae)**

## 🔧 Troubleshooting

If you see a "404 Not Found" or broken links:

1. **Check `.htaccess`**:

   - We have updated `public/.htaccess` to handle subdirectories correctly.
   - We have a root `.htaccess` that forwards requests to `public/`.

2. **Check `base_url`**:

   - Ensure `config/config.php` has the correct URL matching your browser address.

3. **Restart Web Server**:
   - Sometimes Apache/Nginx needs a restart to pick up changes.
