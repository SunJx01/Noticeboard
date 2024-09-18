<?php

namespace App\Http\Controllers;

use App\Models\usemanagement;
use App\Models\useverification;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;

use function Laravel\Prompts\alert;

class usermanagement extends Controller
{
        
    
    public function login_form(){
        if(session()->has('name')){
            return redirect('/dashboard');
        }
        $data = "";
        return view('login', compact('data'));
    }
//----------------------------------------------------------------------------------------------------------------------------------------------------
    
        
    public function login_verification(Request $request){
        
        $validateData = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        $data_arr = [
            'username'=>$request->post('username'),
            'password'=>Hash::make($request->post('password'))
        ];


        if ($request->has('new')){
            $check_arr = useverification::where('username', $request->post('username'))->first();
            if ($check_arr && Hash::check($request->post('password'), $check_arr->password)) {
                $name = $request->post('username');
                return redirect()->route('verify_newuser', ['name' => $name]);
                                
            }else {

                $data = "Invalid Credentials!";
                return view('login', compact('data'));
            }   
        }     
        else{
            $check_arr = usemanagement::where('username', $request->post('username'))->first();

            if ($check_arr && Hash::check($request->post('password'), $check_arr->password)) {

                session([
                    'name' => $request->post('username'),
                    'class'=> "Token"   
                ]);
                
                session()->regenerate();
                session()->put('status', ' Session saved');

                if(session()->has('name')){
                    return redirect('/dashboard');
                }else {

                    $data = "Unable to login!";
                    return view('login', compact('data'));
                }
            } else {

                $data = "Invalid Credentials!";
                return view('login', compact('data'));
            }        
        }
        
    }
 //-----------------------------------------------------------------------------------------------------------------------------------------------------
            
    public function create_user(Request $request){
        if(!session()->has('name')){
            return redirect('/');
        }
        $validateData = $request->validate([
            'username' => ['required','unique:my_users,username','unique:add_users,username'],
            'password' => ['required'],
        ]);
        $data_arr = [
            'username'=>$request->post('username'),
            'password'=>Hash::make($request->post('password')),
            'email'=> Str::random(10).'@example.com',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ];
        
        $data= useverification::create($data_arr);
        return redirect('/dashboard');
  
    }
 //-----------------------------------------------------------------------------------------------------------------------------------------------------
        
    
    public function verify_newuser($name){
            return view('verify_newuser', compact('name'));       
    }
    public function verify_newuser_form(Request $request){
        $data_arr=[
            'username'=>$request->post('username'),
            'email'=>$request->post('email'),
            'password'=> Hash::make($request->post('password')),
            'role'=> "User",
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ];
        $validateData = $request->validate([
            'email' => ['required','email','unique:my_users,email'],
            'username' => ['required', 'max:255', 'unique:my_users,username', 'regex:/^\S*$/u'],
            'password' => ['required', 'min:8', 'confirmed', Password::min(8)
                                                        ->mixedCase()
                                                        ->letters()
                                                        ->numbers()
                                                        ->symbols()
                                                        ->uncompromised(),],
            'password_confirmation' => ['required'],
        ]);
        $data= usemanagement::create($data_arr);
        $id = UseVerification::where('username', $request->post('username'))->first('pending_id');
        useverification::where('pending_id', $id->pending_id)->delete();
        
        return redirect('/');
    }
 //-----------------------------------------------------------------------------------------------------------------------------------------------------

    
    public function admin_signup(){
        return view('admin_signup');
    }
 //-----------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function verify_admin(Request $request){
        $data_arr=[
            'username'=>$request->post('username'),
            'email'=>$request->post('email'),
            'password'=> Hash::make($request->post('password')),
            'role'=> "Admin",
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ];
        
        $validateData = $request->validate([
            'email' => ['required','email','unique:my_users,email'],
            'username' => ['required', 'max:255', 'unique:my_users,username', 'regex:/^\S*$/u'],
            'password' => ['required', 'min:8', 'confirmed', Password::min(8)
                                                        ->mixedCase()
                                                        ->letters()
                                                        ->numbers()
                                                        ->symbols()
                                                        ->uncompromised(),],
            'password_confirmation' => ['required'],
        ]);
        $data= usemanagement::create($data_arr);
        return view('login');
    }
 
 //-----------------------------------------------------------------------------------------------------------------------------------------------------
    public function make_mod(Request $request){

        $id = $request->post('id');
        $user = usemanagement::find($id);
        $user->role = "Moderator";
        $user->save();
        return redirect('/');
    }
    public function make_user(Request $request){
        
        $id = $request->post('id');
        $user = usemanagement::find($id);
        $user->role = "User";
        $user->save();
        return redirect('/');
    }
 //-----------------------------------------------------------------------------------------------------------------------------------------------------
}
?>