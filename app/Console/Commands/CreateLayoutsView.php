<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class CreateLayoutsView extends Command
{
    protected $signature = 'make:layout';
    protected $description = 'Create a layouts.app blade view';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $filesystem = new Filesystem();

        // Define the path and content for the layout
        $path = resource_path('views/layouts/app.blade.php');
        $content = <<<'EOD'
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
EOD;

        // Create the directories if they don't exist
        $filesystem->ensureDirectoryExists(dirname($path));

        // Write the file
        $filesystem->put($path, $content);

        $this->info('Layout created successfully at ' . $path);
    }
}
