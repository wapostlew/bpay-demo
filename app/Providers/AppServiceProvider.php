<?php

namespace App\Providers;

use App\Services\Kitsu\KitsuAPIService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->singleton(
            abstract: KitsuAPIService::class,
            concrete: fn () => new KitsuAPIService(
                request: Http::baseUrl(
                    url: config('services.kitsu.url.api')
                )->timeout(
                    seconds: 20
                )->withHeaders(
                    headers: [
                        'Accept' => 'application/vnd.api+json',
                        'Content-Type' => 'application/vnd.api+json',
                    ]
                )->asJson(),
            )
        );
    }
}
