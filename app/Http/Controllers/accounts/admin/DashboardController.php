<?php

namespace App\Http\Controllers\accounts\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\MessageBag;
class DashboardController extends Controller
{
    
    //
    private $user_type;
    private $user;
    private $uid;
 
     public function __construct()
     {
         $this->middleware(function ($request, $next) {
             $user = Auth::user();
             $level = $user->level;
             $this->user_type = getLevel($level);
             $this->user = $user;
             //dd($this->user_type);
             $this->uid = $user->id;
             //
             return $next($request);
         });
     }
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array();
        //
        $data['title'] = ucwords($this->user_type)." Dashboard";
        $data['user_type'] = $this->user_type;
        $user = $this->user;
        $users = User::where('level',1)->orderBy('id', 'DESC')->paginate(10);       
       
        return view('account.'.$this->user_type.'.dashboard')->with(compact('data', 'user','users'));

    }
    public function activateUser($email)
    {
        $user =  User::where('email',$email)->first();

        if($user)
        {
            $user->status = 1; 
            $user->save();

            return back()->with('success',''.$user->name.' account has been activated successfully');
        }
        else
        {
            return back()->with('error',' User not found');
        }
    }

    public function blockUser($email)
    {
        $user =  User::where('email',$email)->first();

        if($user)
        {
            $user->status = 0; 
            $user->save();

            return back()->with('success',''.$user->name.' account has been blocked successfully');
        }
        else
        {
            return back()->with('error',' User not found');
        }
    }

    public function deleteUser($id)
    {
        //
        $delete = User::destroy($id);
        //
        if ($delete) {
            return back();
        }
        else {
            return back();
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
