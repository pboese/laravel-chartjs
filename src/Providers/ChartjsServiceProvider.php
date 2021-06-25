<?php namespace Pboese\LaravelChartJs\Providers;

use Pboese\LaravelChartJs\Builder;
use Pboese\LaravelChartJs\ChartBar;
use Pboese\LaravelChartJs\ChartLine;
use Pboese\LaravelChartJs\ChartPieAndDoughnut;
use Pboese\LaravelChartJs\ChartRadar;
use Illuminate\Support\ServiceProvider;

class ChartjsServiceProvider extends ServiceProvider
{

    /**
     * Array with colours configuration of the chartjs config file
     * @var array
     */
    protected $colours = [];

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'chart-template');
        $this->colours = config('chartjs.colours');
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('chartjs', function() {
            return new Builder();
        });
    }
}
