<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use App\infocv;
use Validator;

use Illuminate\Http\Request;

class infocvcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
        // $rules = array(
        //     'furst_coll'  => 'required|min:3',
        //     'secend_coll2'  => 'required|min:3',
        //     'id_users'  => 'required|min:1'
        // );
        // $error = Validator::make($request->all(),$rules);
        // if($error->fails())
        // {
        //     return response()->json(['error' => $error->errors()->all()]);
        // }


        // $form_data = array(
        //     'furst_coll' => $request->furst_coll,
        //     'secend_coll2' => $request->secend_coll2,
        //     'id_users' => $request->id_users
        // );    
               
        // infocv::create($form_data);
        // return response()->json(['success' => 'Info Bien Ajouter']);



        $this->validate($request,[
            'furst_coll'  => 'required|min:3',
            'secend_coll2'  => 'required|min:3',
            'id_users'  => 'required|min:1'
            ]
        );
        $infocv = new Infocv();
        
        $infocv->furst_coll = $request->furst_coll;
        $infocv->secend_coll2 = $request->secend_coll2;
        $infocv->id_users =$request->id_users;
        $infocv->save();  

        return redirect()->back()->with(['succes'=>'Info Bien Ajouter']);
       
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
