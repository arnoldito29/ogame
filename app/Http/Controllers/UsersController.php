<?php

namespace App\Http\Controllers;

use Request;
use App\Bananacar\User;
use Auth;
use Lang;
use Validator;
use Redirect;

class UsersController extends Controller
{
    protected $limit = 20;
    protected $users;
    
    public function __construct( User $users )
    {
        $this->users = $users;
    }
    
    public function index()
    {
        $page = (int)Request::input('page');
        $page = ( !empty( $page ) ) ? $page : 1;
                
        $count = $this->users->getCount( ['lesseq|admin' => 10, 'null|deleted' => null ] );
        
        $page = max( min( $page, ceil( $count / $this->limit ) ), 1 );
        
        $users = $this->users->getUsers( ['lesseq|admin' => 10, 'null|deleted' => null ], [ ['id' => 'DESC' ] ], $this->limit, ( $page - 1 ) * $this->limit );
        $paging = \App\Helpers\Paging::paging( $count, $this->limit, $page );
        
        return view('admin.users.list', ['users' => $users, 'paging' => $paging ]);
    }
    
    public function show( $id )
    {
        return view('admin.users.show', ['user' => User::find( $id ) ] );
    }
    
    public function edit( $id )
    {
        $user = [];
        
        if ( !empty( $id ) ) {
        
            $user = User::find( $id );
        }
        
        if ( Auth::user()->id != $user->id ) { 
        
            return view('admin.users.edit', ['user' => $user ] );
        } else {
            
            return view('admin.users.show', ['user' => $user ] );
        }
    }
    
    public function postEdit()
    {
        $data = Request::all();
        
        $return_data = $this->users->edit( $data );
        
        if ( $return_data === true ) {
            
            \Session::flash('status_msg', Lang::get('messages.Successfully update'));
        } else {
            
            \Session::flash('status_msg', Lang::get('messages.Unsuccessfully update'));
            \Session::flash('status_error', true);
        }
        
        if ( !empty( $data['id'] ) ) {
            
            return Redirect::to('admin/users/' . $data['id'] . '/edit')->withinput( $data )->withErrors( $return_data );
        } else {
            
            return Redirect::to('admin/users');
        }
    }
    
    public function postDelete() {
        
        $data = Request::all();
        
        if ( empty( $data['id'] ) ) {
            
            return response()->json( ['status' => 'error'] ); 
        }
        
        $user = User::find( $data['id'] );
        
        $return = $this->users->postDelete( $data['id'] );
        
        return response()->json( ['status' => 'ok'] ); 
    }
    
    public function create()
    {
        return view('admin.users.add' );
    }
    
    public function postAdd()
    {
        $data = Request::all();
        
        $return_data = $this->users->add( $data );
        
        if ( $return_data === true ) {
            
            \Session::flash('status_msg', Lang::get('messages.Successfully add'));
        } else {
            
            \Session::flash('status_msg', Lang::get('messages.Unsuccessfully add'));
            \Session::flash('status_error', true);
        }
        
        return Redirect::to('admin/users/create')->withinput( $data )->withErrors( $return_data );
    }
    
    public function postLogin()
    {
        $data = Request::all();
        
        $messages = array(
            'required' => Lang::get('messages.error_empty'),
            'min' => Lang::get('messages.error_min'),
            'email' => Lang::get('messages.error_email'),
        );
        
        $rules = array(
            'password' => 'required|min:8',
            'email' => 'required|email'
        );
        
        $validator = Validator::make($data, $rules, $messages );
        
        if ( $validator->fails() ) {
            
            $errors = $validator->getMessageBag()->toArray();
            
            $return_data = ['error' => true, 'data' => [] ];
            
            foreach ( $errors as $key => $error ) {
                
               $return_data['data'][ $key ] = !empty( $error[0] ) ? $error[0] : $error;
            }
            
            return response()->json( $return_data );
        }
        
        $return_data = $this->users->postLogin( $data );
        
        return response()->json( $return_data );
    }
    
    public function postRegister()
    {
        $data = Request::all();
        
        $messages = array(
            'required' => Lang::get('messages.error_empty'),
            'min' => Lang::get('messages.error_min'),
            'email' => Lang::get('messages.error_email'),
            'not equal' => Lang::get('messages.not equal'),
            'email used' => Lang::get('messages.email used'),
        );
        
        $rules = array(
            'confirm_password' => 'required|min:8',
            'password' => 'required|min:8',
            'email' => 'required|email',
            'name' => 'required',
            'surname' => 'required',
            'birth' => 'required',
            'sex' => 'required',
        );
        
        $validator = Validator::make($data, $rules, $messages );
        
        if ( $validator->fails() ) {
            
            $errors = $validator->getMessageBag()->toArray();
            
            $return_data = ['error' => true, 'data' => [] ];
            
            foreach ( $errors as $key => $error ) {
                
               $return_data['data'][ $key ] = !empty( $error[0] ) ? $error[0] : $error;
            }
            
            return response()->json( $return_data );
        }
        
        $return_data = $this->users->postRegister( $data );
        
        if ( isset( $return_data['error'] ) && $return_data['error'] === true ) {
            
            foreach ( $return_data['data'] as $key => $val ) {
                
                if ( !empty( $messages[ $val ] ) ) {
                    
                    $return_data['data'][ $key ] = $messages[ $val ];
                }
            }
        }
        
        return response()->json( $return_data );
    }
    
    public function logout()
    {
        Auth::logout();
        // Redirect to the users page.
        //
        return Redirect::to('/')->with('success', 'Logged out with success!');
    }
}
