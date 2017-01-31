<?php

namespace App;

trait Structure
{
    public function get( $filter = [], $order = [], $limit = 100000, $offset = 0 )
    {  
        $sql = self::select( '*' );
        
        $sql = $this->whereParams( $sql, $filter );
        
        foreach ( $order as $order_item ) {

            foreach ( $order_item as $key => $val ) {

                $sql->orderBy( $key, $val );
            }
        }
        
        $sql->offset( $offset )->limit( $limit );
        
        return $sql;
    }
    
    public function count( $filter = [] )
    {
        $sql = self::select( '*' );
        
        $sql = $this->whereParams( $sql, $filter );
        
        $count = $sql->count();
        
        return $count;
    }

    public function returnArray( $data )
    {
        if ( empty( $data ) ) {
            
            return [];
        }
        
        return $data->toArray();
    }

    private function whereParams( $sql, $filter = [] )
    {
        foreach ( $filter as $key => $val ) {
            
            $params = explode( '|', $key );
            
            switch ( $params['0'] ) {
                
                case 'null':
                    $sql->whereNull( $params['1'] );
                    break;
                case 'notnull':
                    $sql->whereNotNull( $params['1'] );
                    break;
                case 'eq':
                    $sql->where( $params['1'], '=' , $val );
                    break;
                case 'noteq':
                    $sql->where( $params['1'], '<>' , $val );
                    break;
                case 'in':
                    $sql->whereIn( $params['1'], $val );
                    break;
                case 'more':
                    $sql->where( $params['1'], '>', $val );
                    break;
                case 'less':
                    $sql->where( $params['1'], '<', $val );
                    break;
                case 'moreeq':
                    $sql->where( $params['1'], '>=', $val );
                    break;
                case 'like':
                    $sql->where( $params['1'], 'like', $val );
                    break;
                case 'lesseq':
                    $sql->where( $params['1'], '<=', $val );
                    break;
                default:
                    $sql->where( $key, '=' , $val );
                    break;
            }
        }
        
        return $sql;
    }
}
