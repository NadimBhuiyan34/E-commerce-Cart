<?php

namespace App\Providers;

 
use Illuminate\Support\ServiceProvider;
use App\Services\CartService;
use Illuminate\Support\Facades\View;
use App\Facades\CartFacade;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // $this->app->singleton(CartService::class, function ($app) {
        //     return new CartService();
        // });
        $this->app->bind('cart',
            function ($app) {
            return new CartService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('components.frontend.layout.partials.header', function ($view) {
            if(Auth::user())
            {
                $cartCount = Cart::where('user_id', Auth::user()->id)
                    ->count();
            }
            else{
                $cartCount=0;
            }
           
            $view->with('cartCount', $cartCount);
        });
    }
}
