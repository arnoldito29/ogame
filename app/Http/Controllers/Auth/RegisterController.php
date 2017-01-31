<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Input;
use Illuminate\Support\Facades\Hash;
use Auth;
use Lang;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = 'home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = '/' . Lang::getLocale() . '/'. $this->redirectTo;
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }
   
    public function register () {
        // Declare the rules for the form validation.
        //
        $rules = array(
                'name'                  => 'Required',
                'email'                 => 'Required|Email|Unique:users',
                'password'              => 'Required|Confirmed',
                'password_confirmation' => 'Required'
        );
        // Get all the inputs.
        //
        $inputs = Input::all();
        // Validate the inputs.
        //
        $validator = Validator::make($inputs, $rules);
        // Check if the form validates with success.
        //
        if ($validator->passes())
        {
                // Create the user.
                //
                $user = new User;
                $user->name       = Input::get('name');
                $user->email      = Input::get('email');
                $user->admin      = 0;
                $user->api_token  = str_random( 60 );
                $user->password   = Hash::make(Input::get('password'));
                $user->last_active = date( 'Y-m-d H:i:s' );
                $user->active     = 0;
                //$user->save();
                // Redirect to the register page.
                
                if ( $user->save() ) {
                    
                    Auth::login( $user );
                    
                    return redirect( $this->redirectPath() );
                }
                
                return Redirect::to('register')->with('success', 'Account created with success!');
        }
        // Something went wrong.
        //
        return Redirect::to('register')->withInput($inputs)->withErrors($validator->getMessageBag());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'api_token' => str_random( 60 ),
        ]);
    }
}
