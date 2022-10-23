<?php

namespace Blytd\Support\Providers;

use Blytd\Support\Central;
use Blytd\Support\HttpClient;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\ServiceProvider;


class SupportServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('central', function($app) {
            $client = new HttpClient(config('central_service.domain'));
            $service_id = config('app.app_id');
            $lang = Lang::getLocale();
            return new Central($client, $service_id, $lang);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
