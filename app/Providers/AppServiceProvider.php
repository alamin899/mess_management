<?php

namespace App\Providers;

use App\Models\PaymentCollection;
use App\Models\PaymentHead;
use App\Models\PaymentSchedule;
use App\Observers\PaymentCollectionObserver;
use App\Observers\PaymentHeadObserver;
use App\Observers\PaymentScheduleObserver;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        PaymentHead::observe(PaymentHeadObserver::class);
        PaymentSchedule::observe(PaymentScheduleObserver::class);
        PaymentCollection::observe(PaymentCollectionObserver::class);
    }
}
