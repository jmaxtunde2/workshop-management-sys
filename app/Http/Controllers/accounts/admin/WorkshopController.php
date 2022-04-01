<?php

namespace App\Http\Controllers\accounts\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Workshop;
use Illuminate\Support\MessageBag;

class WorkshopController extends Controller
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
        $data['title'] = "Available Workshop";
        $user = $this->user;
        $workshops = Workshop::orderBy('id', 'DESC')->paginate(20);
        return view('account.'.$this->user_type.'.list_worksop')->with(compact( 'data', 'user','worshops'));
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
        $data['title'] = "Add New Workshop";
        $user = $this->user;
        return view('account.'.$this->user_type.'.add_workshop')->with(compact( 'data', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'names' => 'required|string|min:3|max:50|unique:workshops'
        ]);

        $postData = $request->all();
        $save = Workshop::create($postData);
            //
            if ($save) 
            {
                return back()->with('success','Workshop created successfully');
            }
            else
            {
                return back()->with('error',' Error creating Workshop. Please try it again');
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
