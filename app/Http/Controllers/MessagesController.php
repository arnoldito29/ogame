<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messages;
use Auth;

class MessagesController extends Controller
{
    protected $limit = 10;
    protected $messages;
    
    public function __construct( Messages $messages )
    {
        $this->messages = $messages;
    }
    
    public function getUnreadMessages()
    {
        if ( empty( Auth::user() ) ) {
            
            return false;
        }
        
        $count = $this->messages->getCountUnreadMessages( Auth::user()->id );
        
        return $count;
    }
    
    public function getUserMessages()
    {
        if ( empty( Auth::user() ) ) {
            
            return false;
        }
        
        $list = $this->messages->getUserMessages( Auth::user()->id );
        
        return $list;
    }
    
    public function message( $user_id )
    {
        if ( empty( Auth::user() ) ) {
            
            return false;
        }
        
        $this->messages->mark( $user_id, Auth::user()->id );
        
        return view('user.index' );
    }
}

