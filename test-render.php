<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
try {
    $response = $kernel->handle(Illuminate\Http\Request::capture());
    file_put_contents('test-render.html', $response->getContent());
    echo "Saved. Status: " . $response->getStatusCode();
} catch (\Throwable $e) {
    echo "ERROR: " . $e->getMessage() . " in " . $e->getFile() . " on line " . $e->getLine();
}
