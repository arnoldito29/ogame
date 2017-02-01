<?php

namespace App\Helpers;

use Request;

class Paging
{
    static public function paging( $count, $limit, int $current ) {
        
        if ( empty( $count ) || empty( $limit ) ) {
            
            return [];
        }
        
        $result = [];
        
        $pages = ceil( $count / $limit );
        $current = max( min( $current, $pages ), 1 );
        
        if ( $pages == 1 ) {
            
            return [];
        }
        
        $result[ 0 ] = ['previous' => ( ( $current - 1 ) > 1 ) ? ( $current - 1 ) : 1, 
                        'next' => ( ( $current + 1 ) > $pages ) ? $pages : ( $current + 1 ),
                        'current' => $current,
                        'url' => Request::path(),
                        ];
        
        for ( $i = 1; $i <= $pages; $i++ ) {
            
            $result[ $i ] = [ 'active' => ( $current == $i ), 'page' => $i ];
        }
        
        return $result;
    }
}
