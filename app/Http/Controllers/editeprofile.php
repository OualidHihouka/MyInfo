<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use App\User;
use App\Infocv;
use Auth;
use Validator;
use App\domaine;

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

        //$allinfocv =  infocv::orderBy('created_at','asc')->paginate();
        //return view('pages.userscv')->with('allinfocv',$allinfocv);
        //$allinfocv =  infocv::find($id);

        $alldomines =  domaine::all();
        $allinfocv =  infocv::orderBy('created_at')->get();
        $user =  User::find($id);
        return view('pages.editeprofile')->with(['user'=>$user,'allinfocv'=>$allinfocv,'alldomines'=>$alldomines]);
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
        $this->validate($request,[
            'name'              => 'required|min:3',
            'email'             => 'required|email'
            ]
        );

        if($request->filled('addres')){
            $this->validate($request,['addres'=> 'min:3']);
        }
        if($request->filled('tele')){
            $this->validate($request,['tele'=> 'min:8']);
        }
        if($request->filled('domaine')){
            $this->validate($request,['domaine'=> 'min:3']);
        }
        if($request->filled('description')){
            $this->validate($request,['description'=> 'min:3']);
        }

        //if the user dont inter the image
        // if($request->has('image')){

        //     $this->validate($request,['image'=> 'image|max:512']);

        //     $img = $request->image;
        //     $nameimg = time().'_'.$img->getClientOriginalName();
        //     $img->move(public_path().'/images/',$nameimg);
            
        // }else{
        //     $nameimg = "aucun_image.jpg";
        // }
        
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->addres = $request->addres;
        $user->tele = $request->tele;
        $user->domaine = $request->domaine;

        if ($request->has('image')) 
        {
            $this->validate($request,['image'=> 'image|max:512']);

            //check if the image is not the default image
            if ($user->image != "aucun_image.jpg") {
                $file_path = public_path().'/images/'. $user->image;
                if(File::exists($file_path)) {
                    unlink($file_path); //delete from storage
                }
            }
            
            $img = $request->image;
            $nameimg = time().'_'.$img->getClientOriginalName();
            $img->move(public_path().'/images/',$nameimg);
            $user->image = $nameimg;  
        }
        $user->description = $request->description;
        $user->save();


        return redirect()->back()->with(['succes'=>'Compte Updated avec Succes']);
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
