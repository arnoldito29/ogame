<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;
use Auth;
use App;

class RequestsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot( Auth $auth )
    {
        view()->composer('*', function( $view ) use ( $auth ){
            
            if ( !empty( $auth::user() ) ) {

                $data = Request::all();
                
                if ( !empty( $data['n'] ) ) {

                    $notice = App::make( 'App\Models\Notifications' );
                    
                    $notice->mark( $auth::user()->id, $data['n'] );
                }
            }
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
