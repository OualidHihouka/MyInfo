<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmailJob;
use App\Mail\ContactUs;
use App\User;
use App\Infocv;
use Auth;
use Validator;
use App\domaine;
use Mail;

class contact extends Controller
{

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['home','userscv']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $user =  User::find(Auth::user()->id);
        return view('pages.contact')->with('user',$user);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'body' => 'required',
        ]);
        
        $to_name =  $request->name;
        $to_email = $request->email;
        $subject = $request->subject;

        $data = array('name' => $request->name , 'body'=>$request->body);

        Mail::send('testmail', $data, function ($message) use($to_name,$to_email,$subject){
            $message->to($to_email)->subject($subject);
        });
        return redirect()->back();
        

        // if($validatedData){
        //     $details=[
        //         "name"=>$request->name,
        //         "email"=>$request->email,
        //         "body"=>$request->body
        //     ];
        //     dispatch(new SendEmailJob($details));
        //     return redirect()->route('contact.index');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id != null) {
            $user =  User::find($id);
            return view('pages.contact')->with('user',$user);
        }  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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