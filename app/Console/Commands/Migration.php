<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;
use Illuminate\Support\Carbon;

class Migration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:make-migration {name} {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create migration';

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
        $migrationFolder = base_path('modules/' . $module . '/Migrations/');

        if (File::exists($migrationFolder)) {

            $migrationFile = app_path('Console/Commands/Templates/migration.txt');
            $migrationContent = File::get($migrationFile);
            $migrationContent = str_replace('{module}', $module, $migrationContent);

            $name = Carbon::now()->format('y_m_d_His') . '_' . $name;

            if ( !File::exists($migrationFolder. '/'. $name . '.php')) {

                File::put($migrationFolder . '/' . $name . '.php', $migrationContent);

                return $this->info('success');
            }
        }
    }
}
