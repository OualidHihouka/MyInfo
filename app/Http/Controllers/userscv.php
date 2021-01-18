<?php


namespace App\Http\Controllers;

use App\User;
use App\Infocv;
use Auth;
use Validator;
use App\domaine;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userscv extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $shearch_bar = '0';
        $sh_par_domaine = '0';
        $shearch_order = '0';
        $alldomines =  domaine::all();
        $allusers =  User::orderBy('updated_at','asc')->paginate(6);
        return view('pages.userscv')->with(['allusers'=>$allusers , 'alldomines'=>$alldomines,'shearch_bar'=>$shearch_bar , 'sh_par_domaine'=>$sh_par_domaine , 'shearch_order'=>$shearch_order]);
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

        $rules = array(
            'bar_shearch'  => 'min:1',
            'trier_par'  => 'min:1',
            'par_domaine'  => 'min:1'
        );

        $error = Validator::make($request->all(),$rules);
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }  

        // $shearch_bar = DB::table('users')->where('name' , 'like' , '%'. $request->bar_shearch . '%')
        //                                  ->orWhere('email' , 'like' , '%'. $request->bar_shearch . '%')
        //                                  ->orWhere('addres' , 'like' , '%'. $request->bar_shearch . '%')
        //                                  ->orWhere('tele' , 'like' , '%'. $request->bar_shearch . '%')
        //                                  ->orWhere('domaine' , 'like' , '%'. $request->bar_shearch . '%')
        //                                  ->orderBy('CustomerID', 'desc')->paginate(6);

        // $sh_par_domaine = DB::table('domaines')->where('nom_domaine' , 'like' , '%'. $request->par_domaine . '%');
        
        // $shearch_order =  User::orderBy('updated_at', $request->trier_par )->paginate(6);
        
        // return response()->json( ['shearch_bar' => $shearch_bar , 'sh_par_domaine' => $sh_par_domaine , 'shearch_order' => $shearch_order] );

        //$allusers = DB::table('users')->orderByRow('updated_at asc');
        //return response()->json(['allusers'=>$allusers]);


        $shearch_bar =  User::orderBy('updated_at','desc')->paginate(6);
        return response()->json(['shearch_bar'=>$shearch_bar]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
        //$allusers =  User::orderBy('created_at','desc')->paginate(6);
         
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
