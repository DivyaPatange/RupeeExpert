<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Redirect;

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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'contact_no' => ['required', 'digits:10'],
            'client_id' => ['required', 'unique:users'],
            'address' => ['required'],
        ]);
    }

    public function search(Request $request)
    {
        if($request->ajax()) {
            // select country name from database
            $data = User::where('client_id', 'LIKE', $request->referenceID.'%')
                ->get();
            // dd($data);  
        
            // declare an empty array for output
            $output = '';
           
            if (count($data)>0) {
                // concatenate output to the array
                // loop through the result array
                foreach ($data as $row){
                    // dd($request->user_referral_info == $row->referral_code);
                    if($request->referenceID == $row->client_id){
                    // concatenate output to the array
                    // $parentName = User::where('id', $row->parent_id)->first();

                    
                       $output .= $row->name;
                        
                        
                    }
                }
                // end of output
            }
            
            else {
                // if there's no matching results according to the input
                $output .= 'No results';
            }
            // return output result array
            // dd($output);
            return $output;
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // dd($data['reference_id']);
        if($data['reference_id']){
            $referenceID = User::where('client_id', $data['reference_id'])->first();
            // dd($referenceID);
            if($referenceID != null)
            {
                $user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'password_1' => $data['password'],
                    'contact_no' => $data['contact_no'],
                    'address' => $data['address'],
                    'client_id' => $data['client_id'],
                    'reference_id' => $data['reference_id'],
                ]);
                return $user;
            }
        }
        else{
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'password_1' => $data['password'],
                'contact_no' => $data['contact_no'],
                'address' => $data['address'],
                'client_id' => $data['client_id'],
                'reference_id' => 0,
            ]);
            
        return $user;
        }
    }

    public function register(Request $request)
    {
    $this->validator($request->all())->validate();
    event(new Registered($user = $this->create($request->all())));
    if($user != null){
    return redirect($this->redirectTo)->with('success', 'Register Succesfully');
    }
    else{
        return redirect('/register')->with('danger', 'Not Registered');
    }
    
    
    }
}
