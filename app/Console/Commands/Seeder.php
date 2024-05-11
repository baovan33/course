<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use File;

class Seeder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:make-seeder {name} {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create seeder';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $module = $this->argument('module');

        if (!File::exists(base_path('modules/' . $module))) {
            return $this->error('Module not exists!');
        }

        $seederFolder = base_path('modules/' . $module . '/Seeders');

        if (!File::exists($seederFolder)) {
            File::makeDirectory($seederFolder, 0755, true, true);
        }
            $seederFile = app_path('Console/Commands/Templates/Seeder.txt');
            $seederContent = File::get($seederFile);
            $seederContent = str_replace('{name}', $name, $seederContent);
            $seederContent = str_replace('{module}', $module, $seederContent);



            if ( !File::exists($seederFolder. '/'. $name . '.php') ) {

                File::put($seederFolder . '/' . $name . '.php', $seederContent);

                return $this->info('success');
        }
    }
}
