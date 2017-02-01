<?php

namespace App\Helpers;

use Request;

class Helpers
{
    static public function back()
    {
        return redirect()->back()->getTargetUrl();
    }
    
    static public function shortText( $text, $length = 50 )
    {
        if ( empty( $text ) ) {
            
            return false;
        }
        
        $text = substr( strip_tags( $text ), 0, $length );
        
        return $text . ' ...';
    }
}
