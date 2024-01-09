<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use App\Models\PortfolioCategory;
use App\Models\ArticleCategory;
use App\Models\LiveChat;
use App\Models\Setting;
use App\Models\Service;
use App\Models\Article;
use App\Models\Social;
use App\Models\Page;
use App\Models\Language;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

use View;

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
        Paginator::useBootstrap();

        // Share view for Common Data
        $setting = Setting::where('status', '1')->first();
        $social = Social::where('status', '1')->first();
        $livechat = LiveChat::first();
        $pages = Page::where('status', '1')->get();
        $portfolio_subnavs = PortfolioCategory::where('status', '1')->get();
        $article_subnavs = ArticleCategory::where('status', '1')->get();
        $service_subnavs = Service::where('status', '1')->get();
        $recents = Article::where('status', '1')
                            ->orderBy('id', 'desc')
                            ->take(3)
                            ->get();

        View::share(['setting' => $setting, 'social' => $social, 'livechat' => $livechat, 'pages' => $pages, 'recents' => $recents, 'portfolio_subnavs' => $portfolio_subnavs, 'article_subnavs' => $article_subnavs, 'service_subnavs' => $service_subnavs]);
    }
}
