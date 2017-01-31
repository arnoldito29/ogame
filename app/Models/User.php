<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Event;
use App\Events\UserLogin;
use Validator;
use Lang;
use Illuminate\Support\Facades\Hash;
use App\Structure;
use Illuminate\Support\Facades\Auth;
use App;

class User extends Authenticatable
{
    use Notifiable;
    use Structure;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token',
    ];
    
    public function isAdmin()
    {
        
        return $this->admin; // this looks for an admin column in your users table
    }
    
    public function getUsers( $filter = [], $order = [], $limit = 10000, $offset = 0 )
    {
        $sql = $this->get( $filter, $order, $limit, $offset );
        
        $users = $sql->get();
        
        return $users;
    }
    
    public function getCount( $filter = [] )
    {
        $count = $this->count( $filter );
        
        return $count;
    }
    
    public function edit( $data = array() )
    {
        if ( empty( $data ) || empty( $data['id'] ) ) {
            
            return false;
        }
          
        $messages = array(
            'required' => Lang::get('messages.error_empty'),
            'min' => Lang::get('messages.error_min')
        );
        
        $user = self::find( $data['id'] );
        
        if ( empty( $user ) ) {
            
            return false;
        }
        
        $rules = array(
            'name' => 'required|min:3'
        );
        
        if ( !empty( $data['password'] ) ) {
            
            $rules['password'] = 'required|min:3';
        }
        
        $validator = Validator::make($data, $rules, $messages );
        
        if ( $validator->fails() ) {

            return $validator->getMessageBag()->toArray();
        }
        
        $user->name = $data['name'];
        $user->password = Hash::make( $data['password'] );
        
        return $user->save();
    }
    
    public function postDelete( $id )
    {
        if ( empty( $id ) ) {
           
            return false;
        }
        
        $user = self::find( $id );
        
        if ( empty( $user ) ) {
            
            return false;
        }
        
        $user->deleted = true;
        
        return $user->save();
    }
    
    public function add( $data = array() )
    {
        if ( empty( $data ) ) {
            
            return false;
        }
          
        $messages = array(
            'required' => Lang::get('messages.error_empty'),
            'min' => Lang::get('messages.error_min'),
            'email' => Lang::get('messages.error_email'),
        );
        
        $rules = array(
            'name' => 'required|min:3',
            'password' => 'required|min:3',
            'email' => 'required|email'
        );
        
        $validator = Validator::make($data, $rules, $messages );
        
        if ( $validator->fails() ) {
            
            return $validator->getMessageBag()->toArray();
        }
        
        $user = App::make( 'App\Bananacar\User' );
        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->password = Hash::make( $data['password'] );
        $user->email = $data['email'];
        $user->admin = 0;
        $user->api_token = str_random( 60 );
        $user->active = 1;
        
        return $user->save();
    }
    
    public function postLogin( $data )
    {
        if ( empty( $data['email'] ) || empty( $data['password'] ) ) {
            
            return ['error' => true, 'data' => ['email' => 'bad email or/and password', 'password' => 'bad email or/and password'] ];
        }
        
        if ( Auth::attempt( ['email' => $data['email'], 'password' => $data['password'], 'active' => 1, 'deleted' => null ] ) ) {
            
            return ['error' => false, 'data' => Auth::user() ];
        }
        
        return ['error' => true, 'data' => ['email' => 'bad email or/and password', 'password' => 'bad email or/and password'] ];
    }
    
    public function postRegister( $data )
    {
        $errors = [];
        
        if ( $data['confirm_password'] != $data['password'] ) {
            
            $errors['confirm_password'] = 'not equal';
            $errors['password'] = 'not equal';
        }
        
        if ( !empty( $data['email'] ) ) {
            
            $user = $this->getCount( ['email' => $data['email'] ] );
            
            if ( $user > 0 ) {
                
                $errors['email'] = 'email used';
            }
        }
        
        if ( empty( $errors ) ) {
            
            $user = $this->add( $data );
            
            if ( $user === true ) {
                
                return ['error' => false ];
            }
        }
        
        return ['error' => true, 'data' => $errors ];
    }
}
