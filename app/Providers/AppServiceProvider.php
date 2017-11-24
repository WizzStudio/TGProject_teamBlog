<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\Facades\Blade;
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
        //
		Blade::if('admin', function ($id){
			$user = User::find($id);
			if($user->level == 1){
				return true;
			}else{
				return false;
			}
		});
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
