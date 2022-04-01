<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function login()
    {
        $data = array();

        if (Auth::check()) {
            $user = Auth::user();
            $level = $user->level;
            $status = $user->status;
            //
            if($level == 4)
            {
                return redirect()->route('admin.dashboard');
            }
            else
            {
                if($level == 1 && $status == 1)
                {
                    
                    return redirect()->route('user.dashboard');
                }
                else
                {
                    Auth::logout();
                        $errors = new MessageBag(['password' => ['Your account is inactive. Please, Contact the administrator']]); 

                        return redirect()->route('user.login')->withErrors($errors);
                }
            }
        }
        //
        $data['title'] = "Astract9 Designs Login";
        return view('account.login')->with('data', $data);

    }
    //

    

    public function doLogout(Request $request) {
        Auth::logout();
        return redirect()->route('login');

    }


    public function doLogin(Request $request) {

        if($request->isMethod('post')) {

            $this->validate($request, [
                'email' => 'required|max:255',
                'password' => 'required',
            ]);
            //

             $user_data = array(
                        'email' => $request->get('email'),
                        'password' => $request->get('password')
                    );


            if (Auth::attempt($user_data)) {
                //
                $user = Auth::user();
                $level = $user->level;
                $status = $user->status;
                //

                if($level == 4)
                {
                    return redirect()->route('admin.dashboard');
                }
                else
                {
                    if($level == 1 && $status == 1)
                    {
                        
                        return redirect()->route('user.dashboard');
                    }
                    else
                    {
                        Auth::logout();
                        $errors = new MessageBag(['password' => ['Your account is inactive. Please, Contact the administrator']]); 

                        return redirect()->route('user.login')->withErrors($errors);
                    }
                }
                
        }
        $errors = new MessageBag(['password' => ['Email and/or password invalid.']]); 

        return back()->withErrors($errors)->withInput($request->only('email', 'remember'));

        }
    }

  


}
