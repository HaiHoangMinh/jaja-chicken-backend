<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->defineGateMenu();
        $this->defineGateProduct();
        $this->defineGateProduct();
        $this->defineGateProduct();
 

    }
    public function defineGateCategory()
        {
            Gate::define('category-list','App\Policies\CategoryPolicy@view');
            Gate::define('category-add','App\Policies\CategoryPolicy@create');
            Gate::define('category-edit','App\Policies\CategoryPolicy@update');
            Gate::define('category-delete','App\Policies\CategoryPolicy@delete');
        }
    public function defineGateMenu()
        {
            Gate::define('menu-list','App\Policies\MenuPolicy@view');
            Gate::define('menu-add','App\Policies\MenuPolicy@create');
            Gate::define('menu-edit','App\Policies\MenuPolicy@update');
            Gate::define('menu-delete','App\Policies\MenuPolicy@delete');
        }
        public function defineGateProduct()
        {
            Gate::define('product-list','App\Policies\ProductPolicy@view');
            Gate::define('product-add','App\Policies\ProductPolicy@create');
            Gate::define('product-edit','App\Policies\ProductPolicy@update');
            Gate::define('product-delete','App\Policies\ProductPolicy@delete');
        }
        public function defineGateSlider()
        {
            Gate::define('slider-list','App\Policies\SliderPolicy@view');
            Gate::define('slider-add','App\Policies\SliderPolicy@create');
            Gate::define('slider-edit','App\Policies\SliderPolicy@update');
            Gate::define('slider-delete','App\Policies\SliderPolicy@delete');
        }       
        public function defineGateUser()
        {
            Gate::define('user-list','App\Policies\UserPolicy@view');
            Gate::define('user-add','App\Policies\UserPolicy@create');
            Gate::define('user-edit','App\Policies\UserPolicy@update');
            Gate::define('user-delete','App\Policies\UserPolicy@delete');
        }
        public function defineGateRole()
        {
            
            Gate::define('role-list','App\Policies\RolePolicy@view');
            Gate::define('role-add','App\Policies\RolePolicy@create');
            Gate::define('role-edit','App\Policies\RolePolicy@update');
            Gate::define('role-delete','App\Policies\RolePolicy@delete');
        }
}