<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
           'email' => ['required', 'email'],
           'password' => ['required']
        ]);

        $user = User::where('email', $request->email)->first();
        if(Auth::attempt($request->only('email', 'password'))){
            return $user->createToken($request->email)->plainTextToken;
            $request->requestToken()->put('current_user',$user);
            return response()->json(Auth::user(), 200);
        }
        throw ValidationException::withMessages([
            'email' => ['The Credentials does not match!']
        ]);

        
    }

//UPDATE PASSWORD
    public function update(Request $request)
    {
      // return $request->input();
      $request ->validate([
            'password' => ['required','min:4','max:15'],
            'new_password' => ['required','different:password'],
            'confirm_new_password' => ['required','same:new_password']
      ]);
      
      $user = $request->user();
      //$user = User::where('email', '=', $logged_in_user['email'])->first();
      if($user && Hash::check($request->password, $user->password))
      {
           $user->password =Hash::make($request->new_password);
           if($user->save()){
              // return redirect('auth/login');
               echo "Updated";
           }
       }
      else
     {
       echo "Your old password is invalid";
    
   
       }
      
    }

    function reset(Request $request)
    {
      // return $request->input();
      $user = User::whereEmail($request->email)->first();
   
      if($user == null)
      {
          echo "Email does not exists";
      }
   
     
    }
 
    public function logout(Request $request)
    {
         //Auth::logout();
         $request->user()->tokens()->delete();
         Auth::guard('web')->logout();
         return response()->json('logged out', 201); 
    }

  
}
