<?php

namespace Novocast\Cart;

use Illuminate\Support\ServiceProvider as ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    protected $defer = false;

    /**
     * @return Object $this
     */
    public function boot()
    {
        $this->publishes([__DIR__.'/config/cart.php' => config_path('/cart.php')]);

        return $this;

    }

    /**
     * @return Object $this
     */
    public function register()
    {
        $this->registerCart();
        $this->app->alias('Cart', 'Novocast\Cart');
            
        return $this;

    }
        
    /**
     * @return Object $this;
     */
    protected function registerCart()
    {
        $this->app->bind('Cart', function ($app) {
            return new Cart();

        });
        return $this;
    }
        
    /**
     * @return array services from provider
     */
    public function provides()
    {
        return array('Cart');
    }
}
