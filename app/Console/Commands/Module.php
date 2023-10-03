<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;

class Module extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:module {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create module CLI';

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

        if( File::exists(base_path('modules/' . $name )) ) {
            $this->error('Module already exists!');
        } else {
            File::makeDirectory(base_path('modules/' .$name), 0755, true, true);

            //Config
            $configFolder = base_path('modules/' . $name . '/Configs/');

            if( !File::exists( $configFolder ) ) {
                File::makeDirectory($configFolder, 0755, true, true);
            }

            //Helper
            $helperFolder = base_path('modules/' . $name . '/Helpers/');

            if( !File::exists( $helperFolder ) ) {
                File::makeDirectory($helperFolder, 0755, true, true);
            }

            //Migrations
            $migratonFolder = base_path('modules/' . $name . '/Migrations/');

            if( !File::exists( $migratonFolder ) ) {
                File::makeDirectory($migratonFolder, 0755, true, true);
            }

            //Resource
            $resourceFolder = base_path('modules/' . $name . '/Resource/');

            if( !File::exists( $resourceFolder ) ) {
                File::makeDirectory($resourceFolder, 0755, true, true);

                //Language
                $langFolder = base_path('modules/' . $name . '/Resource/lang');
                if( !File::exists( $langFolder ) ) {
                    File::makeDirectory($langFolder, 0755, true, true);
                }
                //Views
                 $viewFoler = base_path('modules/' . $name . '/Resource/views');
                 if( !File::exists( $viewFoler ) ) {
                     File::makeDirectory($viewFoler, 0755, true, true);
                 }
            }

            //Routes
            $routeFolder = base_path('modules/' . $name . '/Routes/');

            if( !File::exists( $routeFolder ) ) {
                File::makeDirectory($routeFolder, 0755, true, true);

                //Tao file routes.php
                $routesFile = base_path('modules/' . $name . '/Routes/routes.php');
                if( !File::exists( $routesFile ) ) {
                    $routesFileContent      = file_get_contents(app_path('Console/Commands/Templates/Routes.txt'));
                    $routesFileContent      = str_replace('{modules}', strtolower($name), $routesFileContent);
                    File::put($routesFile, $routesFileContent);
                }

            }

            //Src
            $srcFolder = base_path('modules/' . $name . '/Src/');

            if( !File::exists( $srcFolder ) ) {
                File::makeDirectory($srcFolder, 0755, true, true);

                //Commands
                $commandFolder          = base_path('modules/' . $name . '/Src/Commands');
                if( !File::exists( $commandFolder ) ) {
                    File::makeDirectory($commandFolder, 0755, true, true);
                }
                //Http
                $httpFoler              = base_path('modules/' . $name . '/Src/Http');
                if( !File::exists( $httpFoler ) ) {
                    File::makeDirectory($httpFoler, 0755, true, true);

                    //Controllers
                    $controllerFolder   = base_path('modules/' . $name . '/Src/Http/Controllers');

                    if( !File::exists( $controllerFolder ) ) {
                        File::makeDirectory($controllerFolder, 0755, true, true);

                        //ControllerFile
                        $controllerFile = base_path('modules/' . $name . '/Src/Http/Controllers/'.$name.'Controller.php');
                        if( !File::exists( $controllerFile ) ) {
                            $controllerFileContent      = file_get_contents(app_path('Console/Commands/Templates/Controller.txt'));
                            $controllerFileContent      = str_replace('{modules}', $name, $controllerFileContent);

                            File::put( $controllerFile, $controllerFileContent);
                        }
                    }

                    //Middlewares
                    $middlewareFolder    = base_path('modules/' . $name . '/Src/Http/Middlewares');

                    if( !File::exists( $middlewareFolder ) ) {
                        File::makeDirectory($middlewareFolder, 0755, true, true);

                        //MiddlewareFile
                        $middlewareFile = base_path('modules/' . $name . '/Src/Http/Middlewares/'.$name.'Middleware.php');
                        if( !File::exists( $middlewareFile ) ) {
                            $middlewareFileContent      = file_get_contents(app_path('Console/Commands/Templates/Middleware.txt'));
                            $middlewareFileContent      = str_replace('{modules}', $name, $middlewareFileContent);

                            File::put( $middlewareFile, $middlewareFileContent);
                        }
                    }

                    //Requests
                    $requestFolder      = base_path('modules/' . $name . '/Src/Http/Requests');

                    if( !File::exists( $requestFolder ) ) {
                        File::makeDirectory($requestFolder, 0755, true, true);

                        //requestFile
                        $requestFile = base_path('modules/' . $name . '/Src/Http/Requests/'.$name.'Request.php');
                        if( !File::exists( $requestFile ) ) {
                            $requestFileContent      = file_get_contents(app_path('Console/Commands/Templates/Request.txt'));
                            $requestFileContent      = str_replace('{modules}', $name, $requestFileContent);

                            File::put( $requestFile, $requestFileContent);
                        }
                    }
                }
                //Models
                $modelFoler                    = base_path('modules/' . $name . '/Src/Models');
                if( !File::exists( $modelFoler ) ) {
                    File::makeDirectory($modelFoler, 0755, true, true);

                    //ModelFile
                    $modelFile = base_path('modules/' . $name . '/Src/Models/'.$name.'.php');
                    if( !File::exists( $modelFile ) ) {
                        $modelFileContent      = file_get_contents(app_path('Console/Commands/Templates/Model.txt'));
                        $modelFileContent      = str_replace('{modules}', $name, $modelFileContent);

                        File::put( $modelFile, $modelFileContent);
                    }
                }
                //Repositories
                $repositoriesFoler       = base_path('modules/' . $name . '/Src/Repositories');
                if( !File::exists( $repositoriesFoler ) ) {
                    File::makeDirectory($repositoriesFoler, 0755, true, true);

                    //Module rerpository
                    $moduleRepositoryFile = base_path('modules/' . $name . '/Src/Repositories/'.$name.'Repository.php');

                    if( !File::exists( $moduleRepositoryFile ) ) {
                        $moduleRepositoryFileContent      = file_get_contents(app_path('Console/Commands/Templates/ModuleRepository.txt'));
                        $moduleRepositoryFileContent      = str_replace('{modules}', $name, $moduleRepositoryFileContent);

                        File::put( $moduleRepositoryFile, $moduleRepositoryFileContent);
                    }

                    //Module rerpositoryInterface
                    $moduleRepositoryInterfaceFile = base_path('modules/' . $name . '/Src/Repositories/'.$name.'RepositoryInterface.php');

                    if( !File::exists( $moduleRepositoryInterfaceFile ) ) {
                        $moduleRepositoryInterfaceFileContent      = file_get_contents(app_path('Console/Commands/Templates/ModuleRepositoryInterface.txt'));
                        $moduleRepositoryInterfaceFileContent      = str_replace('{modules}', $name, $moduleRepositoryInterfaceFileContent);

                        File::put( $moduleRepositoryInterfaceFile, $moduleRepositoryInterfaceFileContent);
                    }

                }
            }
            $this->info('Module created successfully!');
        }


    }
}
