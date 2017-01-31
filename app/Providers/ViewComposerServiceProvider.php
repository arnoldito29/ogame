<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('admin.main_menu', function( $view )
        {
            $view->with( 'menu_list', \App\Models\Menu::adminMenu() );
        });
        
        view()->composer('admin.blocks.navigation', function( $view )
        {
            $view->with( 'back', \App\Helpers\Helpers::back() );
        });
        
        view()->composer('user.blocks.login_langs', function( $view )
        {
            $view->with( 'langs', \App\Models\Menu::langsMenu() );
        });
        
        view()->composer('user.blocks.notifications', function( $view )
        {
            $notifications = App::make( '\App\Http\Controllers\NotificationsController' );
            $view->with( 'notifications_count', $notifications->getUnreadNotifications() )
                 ->with( 'notifications_list', $notifications->getUserNotifications() );
        });
        
        view()->composer('user.blocks.messages', function( $view )
        {
            $messages = App::make( '\App\Http\Controllers\MessagesController' );
            $view->with( 'messages_count', $messages->getUnreadMessages() )
                 ->with( 'messages_list', $messages->getUserMessages() );
        });
        
        view()->composer('user.blocks.index.reviews', function( $view )
        {
            $view->with( 'reviews', \App\Http\Controllers\ReviewsController::getPublicReviews() );
        });
        
        view()->composer('user.menu.footer_menu', function( $view )
        {
            $contents = App::make( '\App\Http\Controllers\ContentsController' );
            $view->with( 'footer_menu', $contents->footerMenu() );
        });
        
        view()->composer('user.blocks.index.travel', function( $view )
        {
            $view->with( 'index_travel', \App\Http\Controllers\BenefitsController::showTravelBenefits() );
        });
        
        view()->composer('user.blocks.travel', function( $view )
        {
            $view->with( 'index_travel', \App\Http\Controllers\BenefitsController::showTravelBenefits() );
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
