<?php namespace Modules\EmployeeDemo\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Dashboard\Composers\WidgetViewComposer;

class WidgetServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton('Modules\EmployeeDemo\Composers\WidgetViewComposer', function () {
            return new WidgetViewComposer();
        });

        $this->app['view']->composer('employee_demo::admin.dashboard', 'Modules\EmployeeDemo\Composers\WidgetViewComposer');
    }
}
