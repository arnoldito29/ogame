<?php

namespace App\Helpers;

class LangData
{
    static public function changeData( $data, $fields = [], $lang = 'lt' )
    {
        if ( !empty( $fields ) && !empty( $data ) ) {
            
            foreach ( $data as $key => $val ) {
                
                foreach ( $fields as $field ) {
                    
                    if ( isset( $val[ $field . '_' . $lang ] ) ) {
                        
                        $data_field = '_' . $field . '_';
                        $val->$data_field = $val[ $field . '_' . $lang ];
                    }
                }
            }
        }
        
        return $data;
    }
}
