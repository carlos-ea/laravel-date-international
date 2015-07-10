<?php namespace Approached\LaravelDateInternational;

use Illuminate\Support\ServiceProvider;

class DateIntlServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerHtmlBuilder();
        $this->app->alias('dateintl', 'Approached\LaravelDateInternational\DateIntlBuilder');
    }

    /**
     * Register the HTML builder instance.
     *
     * @return void
     */
    protected function registerDateIntlBuilder()
    {
        $this->app->bindShared('dateintl', function ($app) {
            return new HtmlBuilder($app['url']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('dateintl');
    }

}
