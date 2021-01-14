<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class login extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.login');
    }

    // auth
    public function auth(Request $request)
    {
        $this->validate($request,[
            'email'             => 'required',
            'password'          => 'required|min:6'
        ]);


        if (Auth::attempt(['email' => $request-> email, 'password' => $request-> password])) 
        {
            $user = Auth::user()->id;
            return redirect()->route('profile.show',['id'=>Auth::user()->id])->with(['succes'=>'Login avec Succes','user'=>$user]);
        }
        else
        {
            return redirect()->back()->with(['Fail'=>'Email ou Mote de passe est un correct !!!']);
        }
    }
// deconnectio
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home.index');
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
