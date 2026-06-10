<?php

// ============================================================
// Serverless entry point for Vercel (vercel-php runtime)
// Buat semua direktori storage yang dibutuhkan Laravel di /tmp
// (karena filesystem Vercel read-only, kecuali /tmp)
// ============================================================

$dirs = [
    '/tmp/storage/app/public',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/testing',
    '/tmp/storage/logs',
    '/tmp/database',
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

// Set environment variables yang dibutuhkan Laravel jika belum ada
if (!getenv('DB_DATABASE')) {
    putenv('DB_DATABASE=/tmp/database/database.sqlite');
}

require __DIR__ . '/../public/index.php';
