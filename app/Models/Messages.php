<?php

namespace App\Models;

use App\Structure;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use Structure;
    
    public $timestamps = false;
    private $short_text = 50;


    public function getMessages( $filter = [], $order = [], $limit = 100000, $offset = 0 )
    {
        $sql = $this->get( $filter, $order, $limit, $offset );
        
        $messages = $sql->get();
        
        return $messages;
    }
    
    public function getMessage( $filter = [] )
    {
        $sql = $this->get( $filter, [], 1 );
        
        $message = $sql->first();
        
        return $message;
    }
    
    public function getCount( $filter = [] )
    {
        $count = $this->count( $filter );
        
        return $count;
    }
    
    public function getCountUnreadMessages( $user_id )
    {
        $select = self::select('from_user_id')->distinct()->where('to_user_id', '=', $user_id )->where('read', '=', 0 )->get();
        $count = 0;
        
        if ( !empty( $select ) ) {
            
            foreach ( $select as $val ) {
                
                $count = $val->from_user_id;
            }
        }
        
        return $count;
    }
    
    public function getUserMessages( $user_id )
    {
        $sql = 'SELECT ms.* ,users.name, users.surname '
                . 'FROM '
                . '( SELECT max(messages.id) as id '
                . 'FROM messages '
                . 'WHERE messages.`to_user_id` = ' . $user_id . ' '
                . 'GROUP BY messages.from_user_id '
                . ') AS messages '
                . 'LEFT JOIN messages AS ms ON ms.id = messages.id '
                . 'LEFT JOIN users ON users.id = ms.from_user_id';
        $messages = DB::select( DB::raw( $sql ) );
        
        foreach ( $messages as $message ) {
            
            $message->short_text = strlen( $message->text ) > $this->short_text ? \App\Helpers\Helpers::shortText( $message->text, $this->short_text ) : $message->text;
        }
        
        return $messages;
    }
    
    public function mark( $from_user_id, $to_user_id )
    {
        if ( empty( $from_user_id ) || empty( $to_user_id ) ) {
            
            return false;
        }
        
        $data = $this->getMessages( ['to_user_id' => $to_user_id, 'from_user_id' => $from_user_id, 'read' => 0 ] );
        
        if ( empty( $data ) ) {
            
            return false;
        }
        
        $return_data = self::where('to_user_id', '=', $to_user_id )
                        ->where('from_user_id', '=', $from_user_id )
                        ->update( ['read' => 1 ] );
        
        return $return_data;
    }
}
