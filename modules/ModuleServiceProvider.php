<?php
namespace Modules;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;
use Modules\User\Src\Commands\TestCommand;
use Modules\User\Src\Http\Middlewares\DemoMiddleware;
use Modules\User\Src\Repositories\UserRepository;
use Modules\User\Src\Repositories\UserRepositoryInterface;

class ModuleServiceProvider extends ServiceProvider {

    private $middlewares = [

    ];

    private $commands   = [

    ];

    public function boot() {
        $modules = $this->getModules();

        if ( !empty($modules) ) {
            foreach ($modules as $module) {
                $this->registerModule($module);
            }
        }
    }

    public function register() {
        //Configs
        $modules = $this->getModules();
        if ( !empty($modules) ) {
            foreach ($modules as $module) {
                $this->registerConfigs($module);
            }
        }

        //Middleware
        $this->registerMiddlewares();

        //Commands
        $this->commands($this->commands);

        $this->app->singleton(
            UserRepository::class,
            UserRepositoryInterface::class
        );
    }

    private function getModules() {
        $directories = array_map( 'basename', File::directories(__DIR__));
        return $directories;
    }

    //register module
    private function registerModule( $module ) {
       $modulePath = __DIR__ . "/{$module}";

       //Khai bao Routes
        if ( File::exists( $modulePath. '/Routes/routes.php') ) {
            $this->loadRoutesFrom($modulePath . '/Routes/routes.php');
        }

        //Khai bao migration
        if ( File::exists( $modulePath. '/Migrations') ) {
            $this->loadMigrationsFrom($modulePath . '/Migrations');
        }

        //Khai bao languages
        if ( File::exists( $modulePath. '/Resource/lang') ) {
            $this->loadTranslationsFrom($modulePath . '/Resource/lang', strtolower($module));

            $this->loadJsonTranslationsFrom($modulePath . '/Resource/lang');
        }

        //Khai bao views
        if ( File::exists( $modulePath. '/Resource/views') ) {
            $this->loadViewsFrom($modulePath . '/Resource/views', strtolower($module));
        }

        //Khai bao helpers
        if ( File::exists( $modulePath. '/Helpers') ) {
            $helperList    = File::allFiles($modulePath. '/Helpers');

            if( !empty( $helperList ) ) {
                foreach ($helperList as $helper) {
                    $file  = $helper->getPathName();
                    require $file;
                }
            }
        }
    }

    //register configs
    private function registerConfigs( $module ) {
        $configPath      = __DIR__ . '/' . $module . '/Configs';
        if ( File::exists($configPath) ) {

            $configFiles =  array_map( 'basename', File::allFiles($configPath));

            foreach ( $configFiles as $config ) {
                $alias    = basename($config, '.php');
                $this->mergeConfigFrom(  $configPath . '/' . $config, $alias );
            }
        }
    }

    //register middlewares
    private function registerMiddlewares() {
        $middlewares = $this->middlewares;

        if ( !empty($middlewares) ) {
            foreach ($middlewares as $key => $middleware) {
                $this->app['router']->pushMiddlewareToGroup($key, $middleware);
            }
        }
    }
}
