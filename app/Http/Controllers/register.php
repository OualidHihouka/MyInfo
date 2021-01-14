<?php

namespace App\Http\Controllers;

use App\User;
use App\domaine;
use Auth;
use Illuminate\Http\Request;

class register extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alldomines =  domaine::all();
        return view('pages.register')->with('alldomines',$alldomines);
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
        $this->validate($request,[
            'name'              => 'required|min:3'/*,
            'email'             => 'required|email:valid',
            'password'          => 'required|min:6',
            'confirmpassword'   => 'required|same:password',
            'addres'            => 'required|min:3',
            'tele'              => 'required|min:6',
            'domaine'           => 'required|min:3',
            'nom_domaine'       => 'required|min:3',
            'nom_domaine'       => 'required|min:3|max:255',
            'image'             => 'required|image|max:500',
            */]
        );


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->addres = $request->addres;
        $user->tele = $request->tele;
        $user->domaine = $request->domaine;
        $user->image = $request->image;
        $user->description = $request->description;
        $user->save();

        if (Auth::attempt(['email' => $request-> email, 'password' => $request-> password])) 
        {
            $user = Auth::user()->id;
            return redirect()->route('editeprofile.show',['id'=>Auth::user()->id])->with(['succes'=>'Compte Creer avec Succes','user'=>$user]);
        }
        else
        {
            return redirect()->back()->with(['Fail'=>'Email ou Mote de passe est un correct !!!']);
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

    public function adddomin(Request $request)
    {
        $this->validate($request,[
            'nom_domaine'  => 'required|min:3'
            ]
        );

        $domi = new domaine();
        
        $domi->nom_domaine = $request->nom_domaine;
        $domi->save();  
        
        return redirect()->route('register.index')->with(['succes'=>'Domaine Creer avec Succes']);
        //print_r($request->all());
        
    }
}
