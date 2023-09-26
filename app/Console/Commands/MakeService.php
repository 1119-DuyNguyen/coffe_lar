<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
class MakeService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';


    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $serviceClassName = ucfirst($name) . 'Service';
        $serviceFilePath = app_path("Http/Services/{$serviceClassName}.php");

        if (File::exists($serviceFilePath)) {
            $this->error('Service class already exists!');
            return;
        }

        $stub = file_get_contents(__DIR__.'/stubs/service.stub');
        $stub = str_replace('{{serviceName}}', $serviceClassName, $stub);

        File::put($serviceFilePath, $stub);

        $this->info("Service class created successfully: {$serviceFilePath}");
    }
}
