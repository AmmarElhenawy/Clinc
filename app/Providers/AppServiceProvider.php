<?php

namespace App\Providers;
use App\Models\PatientRecord;
use App\Observers\PatientRecordObserver;
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
        PatientRecord::observe(PatientRecordObserver::class);
    }
}
