<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth facade
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPasswordMail;





class AuthController extends Controller
{
    // This method returns the view for the login page.
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        //validate data
         $request->validate([
         'email' => 'required',
         'password' => 'required'
       ]);
       $credentials=$request->only('email','password');
        if(Auth::attempt($credentials))
        {
          if(Auth::user()->usertype == '1'){
            return redirect('admindashboard');
          }
          else{
            return redirect('/order.index');
          }
        }
        else
        {
            return redirect('login')->with('success','login details are not found');
        }

       
        
    }

    // This method returns the view for the registration page.
    public function register_view()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
         //validate data
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
          ]);

          // save in users table
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password)

        ]);

          // login user here
        if(\Auth::attempt($request->only('email','password'))){
            return redirect('home');
        }

        return redirect('register')->withError('Error');


    }

    public function home()
    {
        return view('home');
    }

    public function logout()
    {
        \Session::flush();
        \Auth::logout();
        return redirect('');
    }

    public function forgetpasswordload()
    {
        return view('auth.forget');
    }
    
    public function forgetpassword(Request $request)
    {
        $user = User::getEmailSingle($request->email); // Make sure getEmailSingle is defined and returns a user object
        if (!empty($user)) {
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordMail($user)); // Pass $user here
            
            return redirect()->back()->with('success', 'Please check your email and reset your password');
        } else {
            return redirect()->back()->with('error', 'Email not found');
        }
    }

public function resetpasswordload($remember_token)
{
    $user =User::getTokenSingle($remember_token);
    if(!empty($user))
    {
      $data['user'] = $user;
      return view('auth.resetpassword' , $data);
    }
    else
    {
        abort(404);
    }
}

public function resetpassword($token ,Request $request)
{
  if($request->password == $request->password_confirmation)
  {
    $user =User::getTokenSingle($token);
    $user->password=Hash::make($request->password);
    $user->remember_token=Str::random(30); 
    $user->save(); 
    return redirect(url('/login'))->with('success', 'Passowrd Changed Successfully');
  }
  else
  {
    return redirect()->back()->with('error', 'Passowrd Not Match');
  }


}

       
};