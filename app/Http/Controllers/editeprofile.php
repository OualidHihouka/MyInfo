<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\infocv;
use Auth;
use Validator;

class editeprofile extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.editeprofile');
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
        $user =  User::find($id);
        return view('pages.editeprofile')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $user =  User::find($id);
        // return view('pages.editeprofile')->with('user',$user);
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

    // public function addinfocv()
    // {
    //     $rules = array(
    //         'furst_coll'  => 'required|min:3',
    //         'secend_coll2'  => 'required|min:3',
    //         'id_users'  => 'required|min:1'
    //     );
    //     $error = Validator::make($request->all(),$rules);
    //     if($error->fails())
    //     {
    //         return response()->json(['error' => $error->errors()->all()]);
    //     }


    //     $form_data = array(
    //         'furst_coll' => $request->furst_coll,
    //         'secend_coll2' => $request->secend_coll2,
    //         'id_users' => $request->id_users
    //     );    
               
    //     infocv::create($form_data);
    //     return response()->json(['success' => 'Info Bien Ajouter']);
    // }
}
