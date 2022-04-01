<?php

namespace App\Http\Controllers\accounts\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Workshop;
use App\Models\Openday;
use App\Models\Appointement;
use Carbon\Carbon;
use Illuminate\Support\MessageBag;

class AppointementController extends Controller
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
        $data['title'] = "Appointed Workshop";
        $user = $this->user;
        $appointement = Appointement::where('user_id',$this->uid)->orderBy('id', 'DESC')->paginate(10);
        return view('account.'.$this->user_type.'.list_appointement')->with(compact( 'data', 'user','appointement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($workshop)
    {
        
        $opens = Openday::find($workshop);
        if($opens)
        {
            $data = array();
            $data['user_type'] = $this->user_type;
            $data['title'] = "Create appointement";
            $user = $this->user;
            return view('account.'.$this->user_type.'.add_appointement')->with(compact( 'data', 'user','opens'));
        }else
        {
            return back()->with('error',' Workshop not found. Please try it again');
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
        
        $postData = $request->all();

            $start_1 = Carbon::now()->startOfDay();
            $end_1 = Carbon::now()->endOfDay();
            

        $appointement_exit = Appointement::where('user_id',$this->uid)->whereBetween('created_at', [$start_1, $end_1])->get();

        if($appointement_exit->count()>0)
        {
            $errors = new MessageBag(['error' => ['You have already a pending appointement. Only one appointement is allowed per day. Please try it later']]); 

            return back()->withErrors($errors);
        }
        else
        {
            $postData['user_id'] =  $this->uid;
            $save = Appointement::create($postData);
            //
            if ($save) 
            {
                return back()->with('success','Appointement created successfully');
            }
            else
            {
                $errors = new MessageBag(['error' => ['Error creating Appointement. Please try it again']]); 

                return back()->withErrors($errors);
            }
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
