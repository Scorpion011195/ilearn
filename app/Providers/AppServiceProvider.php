<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;

use App\Repositories\ApprovalDictionaryRepository;
use App\Repositories\DictionaryRepository;
use App\Repositories\HistoryRepository;
use App\Repositories\NotificationRepository;
use App\Repositories\UserRepository;
use App\Services\ApprovalDictionaryService;
use App\Services\DictionaryService;
use App\Services\HistoryService;
use App\Services\NotificationService;
use App\Services\UserService;
use App\Services\LanguageService;
use App\Repositories\LanguageRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserRepository::class, UserService::class);
        $this->app->singleton(LanguageRepository::class, LanguageService::class);
        $this->app->singleton(NotificationRepository::class, NotificationService::class);
        $this->app->singleton(HistoryRepository::class, HistoryService::class);
        $this->app->singleton(DictionaryRepository::class, DictionaryService::class);
        $this->app->singleton(ApprovalDictionaryRepository::class, ApprovalDictionaryService::class);
        $this->app->singleton(BaseRepository::class, BaseService::class);
    }
}
