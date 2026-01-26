#!/usr/bin/env php
<?php

/**
 * Laravel Blade Template Generator for Business Module
 * This script generates all remaining blade templates from HTML files
 */

$modules = [
    'staff' => ['index', 'create', 'edit', 'view'],
    'services' => ['index', 'create', 'edit', 'view'],
    'products' => ['index', 'create', 'edit', 'view'],
    'inventory' => ['index', 'create', 'edit', 'view'],
    'branches' => ['index', 'create', 'edit', 'view'],
    'expenses' => ['index', 'create', 'edit', 'view'],
    'sales' => ['index'],
    'analytics' => ['index'],
    'pos' => ['index'],
    'settings' => ['index'],
];

$baseDir = __DIR__ . '/resources/views/business/';

foreach ($modules as $module => $pages) {
    $moduleDir = $baseDir . $module;
    
    if (!is_dir($moduleDir)) {
        mkdir($moduleDir, 0755, true);
        echo "Created directory: $moduleDir\n";
    }
    
    foreach ($pages as $page) {
        $file = $moduleDir . '/' . $page . '.blade.php';
        
        if (file_exists($file)) {
            echo "Skipped (exists): $file\n";
            continue;
        }
        
        $title = ucfirst($module) . ' - ' . ucfirst($page);
        $pageTitle = ucfirst($module);
        $pageSubtitle = ucfirst($page);
        
        $template = <<<EOT
@extends('layouts.business')

@section('title', '$title')

@php
    \$pageTitle = '$pageTitle';
    \$pageSubtitle = '$pageSubtitle';
@endphp

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Page Header -->
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900">$pageTitle $pageSubtitle</h2>
        <p class="text-sm text-gray-500 mt-1">Manage your $module here</p>
    </div>

    <!-- Content Area -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
        <p class="text-gray-600">Content for $module $page page will go here.</p>
        <p class="text-sm text-gray-500 mt-2">This template was auto-generated. Replace with actual content from HTML files.</p>
    </div>
</div>
@endsection
EOT;
        
        file_put_contents($file, $template);
        echo "Created: $file\n";
    }
}

echo "\n✅ All blade templates generated successfully!\n";
echo "Next step: Copy content from HTML files in public/Luadry App/business/ to these blade templates.\n";

