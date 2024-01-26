<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use File;

class Controller extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:make-controller {name} {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Controller';

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

        if( !File::exists(base_path('modules/' . $module )) ) {
            return $this->error('Module not exists!');
        }
       $srcFolder = base_path('modules/' . $module . '/Src/');

        if( File::exists($srcFolder)) {
            $httpFoler    = base_path('modules/' . $module . '/Src/Http');

            if( File::exists($httpFoler)) {

                $controllerFolder   = base_path('modules/' . $module . '/Src/Http/Controllers');

                if( File::exists($controllerFolder)) {
                    $controllerFile = app_path('Console/Commands/Templates/make_controller.txt');
                    $controllerContent = File::get($controllerFile);
                    $controllerContent = str_replace('{module}', $module, $controllerContent);
                    $controllerContent = str_replace('{name}', $name, $controllerContent);

                    if ( !File::exists($controllerFolder. '/'. $name . '.php', $controllerContent)) {

                        File::put($controllerFolder . '/' . $name . '.php', $controllerContent);

                         return $this->info('success');
                    } else {
                        return $this->error('Controller exists ');

                    }
                } else {
                    return $this->error('Folder Controller not exists');
                }
            }else {
                return $this->error('Folder Http not exists');
            }
        }
        return $this->error('Folder Src not exists');
    }
}
