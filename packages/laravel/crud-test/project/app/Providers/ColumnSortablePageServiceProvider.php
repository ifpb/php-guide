<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class ColumnSortablePageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('sortablepagelink', function ($expression) {
            $page = request()->page ?? 1;
            $expression = ($expression[0] === '(') ? substr($expression, 1, -1) : $expression;
            return "<?php echo str_replace('?sort=', '?page=' . $page . '&sort=', \Kyslik\ColumnSortable\SortableLink::render(array($expression))); ?>";
        });
    }
}
