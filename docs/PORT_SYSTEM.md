# Port System & Run Command

## Overview

The BrandStoryAE project now includes a flexible port system that allows you to run the development server on any port you choose.

## Configuration

The port is configured in `config/config.php`:

```php
// Port configuration for local development
$port = 8000;
$baseUrl = 'http://localhost';
```

To change the default port, simply modify the `$port` variable in this file.

## Running the Development Server

You have **three ways** to start the development server:

### 1. Using the `run` script (Easiest)

```bash
# Run on default port (8000)
./run

# Run on a custom port
./run 3000
./run 8080
```

### 2. Using the `command` CLI

```bash
# Run on default port (8000)
php command serve

# Run on a custom port
php command serve 3000
php command serve 8080
```

### 3. Direct PHP server command

```bash
# Run on port 8000
php -S localhost:8000 -t public

# Run on custom port
php -S localhost:3000 -t public
```

## How It Works

1. **Config File**: The `config/config.php` file stores the default port and constructs the base URL
2. **Serve Command**: The `ServeCommand` class reads the port from config and starts PHP's built-in server
3. **Run Script**: A convenient bash wrapper that calls the serve command

## Examples

```bash
# Start server on default port (8000)
./run
# Access at: http://localhost:8000

# Start server on port 3000
./run 3000
# Access at: http://localhost:3000

# Start server on port 9000
php command serve 9000
# Access at: http://localhost:9000
```

## Changing the Default Port

Edit `config/config.php` and change the `$port` value:

```php
// Change from 8000 to 3000
$port = 3000;
```

Now running `./run` without arguments will use port 3000.

## Stopping the Server

Press `Ctrl+C` in the terminal to stop the development server.

## Notes

- The server runs on `localhost` only (not accessible from other devices)
- The `public` directory is set as the document root
- PHP's built-in server is for development only, not for production use
