<?php

namespace App\Http\Controllers\accounts\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Workshop;
use App\Models\Openday;
use App\Models\Appointement;
use Illuminate\Support\MessageBag;

class OpendayController extends Controller
{
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
        $data['user_type'] = $this->user_type;
        $data['title'] = "Available Workshop Open days";
        $user = $this->user;
        $opens = Openday::with('workshop')->orderBy('id', 'DESC')->paginate(20);
        return view('account.'.$this->user_type.'.list_open')->with(compact( 'data', 'user','opens'));
    }

    public function indexAppointement()
    {
        $data = array();
        $data['user_type'] = $this->user_type;
        $data['title'] = " Appointement Available";
        $user = $this->user;
        $appointement = Appointement::orderBy('id', 'DESC')->paginate(20);
        return view('account.'.$this->user_type.'.list_appointement')->with(compact( 'data', 'user','appointement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array();
        $data['user_type'] = $this->user_type;
        $data['title'] = "Add New Open day Workshop";
        $user = $this->user;
        $workshops = Workshop::orderBy('id', 'DESC')->get();
        return view('account.'.$this->user_type.'.add_open')->with(compact( 'data', 'user','workshops'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $postData = $request->all();
        $save = Openday::create($postData);
            //
            if ($save) 
            {
                return back()->with('success','Open Day Workshop created successfully');
            }
            else
            {
                $errors = new MessageBag(['error' => ['Error creating Open Day Workshop. Please try it again']]); 

                return back()->withErrors($errors);
            }

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
