<?php

namespace App\Providers;

use App\Mail\Transport\BrevoApiTransport;
use App\Support\Cta;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        Schema::defaultStringLength(191);

        Mail::extend('brevo', fn (array $config) => new BrevoApiTransport(
            $config['key'] ?? '',
            (bool) ($config['verify_ssl'] ?? true),
        ));

        if (! $this->app->runningInConsole() && $this->app->request?->getHost()) {
            $url = $this->app->request->getSchemeAndHttpHost();
            config(['filesystems.disks.public.url' => $url.'/storage']);
        }

        View::composer('*', function ($view) {
            if (! array_key_exists('cta', $view->getData())) {
                $view->with('cta', Cta::urls());
            }
        });
    }
}
