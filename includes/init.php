<?php

// DO NOT MODIFY THIS FILE

// Load Dependencies with Composer
require_once(__DIR__ . '/../vendor/autoload.php');

// Initialize "Whoops"
$whoops = new Whoops\Run;
$whoops->pushHandler(new Whoops\Handler\PrettyPageHandler);
$whoops->register();

// Read ".env" file
try {
    $dotenv = new Dotenv\Dotenv(__DIR__.'/..');
    $dotenv->load();
} catch (Exception $e) {
    // No .env file found.
}