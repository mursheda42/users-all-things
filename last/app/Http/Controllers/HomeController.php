<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
     public function about()
    {
        return view('about');
    }
    
       public function category(Request $request){
        
         $data=array();
         $data['cat_name']=$request->cat_name;  
         $category=DB::table('posts')->insert($data);

            if($category){
            $notification=array(
            'message'=>'successfully category insered',
            'alert-type'=>'success');
            return Redirect()->route('home')->with($notification);
            }
            else
                {
                $notification=array(
                'message'=>'error',
                'alert-type'=>'success');
                return Redirect()->back()->with($notification);
            }           
    }
     public function PasswordChange()
    {
        return view('auth.passwords.password_change');
    }

     public function UpdatePassword(Request $request)
    {
       $password=Auth::User()->password;
       $oldpass=$request->oldpass;
       if(Hash::check($oldpass,$password))
       {
        $user=User::find(Auth::id());
        $user->password=Hash::make($request->password);
        $user->save();
        Auth::logout();
        return Redirect()->route('login')->with('successMsg','password successfully changed,now you can log in');
       }
       else
       {
        return Redirect()->back()->with('errorMsg','old password does not match');
       }
    }
 }

