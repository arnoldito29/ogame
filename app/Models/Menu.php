<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Config;
use App\Structure;

class Menu extends Model
{
    use Structure;
    
    protected $table = 'menu';
    
    static public function adminMenu()
    {
        $admin_level = Auth::user()->isAdmin();
        
        $menu = self::where( [ ['active', '=', 1 ], ['admin', '<=', $admin_level ] ] )->orderBy( 'sort', 'ASC' )->get();
        
        return $menu;
    }
    
    static public function langsMenu()
    {
        $langs = Config::get('app.available_locales');
        $status = Config::get('app.env');
        
        $domains = ( !empty( $status ) && $status == 'local' ) ? Config::get('app.available_domains_dev') : Config::get('app.available_domains');
        
        $return_data['list'] = [];
        
        foreach ( $langs as $val ) {
            
            $url = ( !empty( $domains[ $val ] ) ) ? $domains[ $val ] : $val;
            
            $return_data['list'][ $val ] = [ 'name' => $val, 'url' => $url ];
        }
        
        $lang = \Lang::getLocale();
        $return_data['active'] = ( !empty( $lang ) ) ? $lang : 'lt';
        
        return $return_data;
    }
}
