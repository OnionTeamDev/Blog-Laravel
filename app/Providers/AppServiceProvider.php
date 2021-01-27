<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\CategoryModel;
use App\PostModel;

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
        //
        Schema::defaultStringLength(191);

        $data['categoryNav'] = CategoryModel::where('category_status', 1)
                                            ->orderByDesc('created_at')
                                            ->limit(5)
                                            ->get();
        $data['postNav'] = PostModel::where('post_status', 1)
                                            ->orderByDesc('created_at')
                                            ->limit(5)
                                            ->get();

        view()->share($data);
    }
}
