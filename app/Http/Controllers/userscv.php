<?php


namespace App\Http\Controllers;

use App\User;
use App\Infocv;
use Auth;
use Validator;
use App\domaine;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class userscv extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $alldomines =  domaine::all();
        $allusers =  User::orderBy('updated_at','desc')->paginate(6);
        return view('pages.userscv')->with(['allusers'=>$allusers , 'alldomines'=>$alldomines]);
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
        if ($request->has('bar_shearch') || $request->has('par_domaine') || $request->has('trier_par') ){

            if ($request->has('ck_trier') && !$request->has('ck_domine')) {

                $allusers = DB::table('users')->where('name' , 'like' , '%'. $request->bar_shearch . '%')
                                            ->orWhere('email' , 'like' , '%'. $request->bar_shearch . '%')
                                            ->orWhere('addres' , 'like' , '%'. $request->bar_shearch . '%')
                                            ->orWhere('tele' , 'like' , '%'. $request->bar_shearch . '%')
                                            ->orderBy('updated_at', $request->trier_par )->paginate(6);
            }

            if ($request->has('ck_domine') && !$request->has('ck_trier')) {
                if ($request->filled('bar_shearch')) {
                    $allusers = DB::table('users')->where('name' , 'like' , '%'. $request->bar_shearch . '%')
                                            ->orWhere('email' , 'like' , '%'. $request->bar_shearch . '%')
                                            ->orWhere('addres' , 'like' , '%'. $request->bar_shearch . '%')
                                            ->orWhere('tele' , 'like' , '%'. $request->bar_shearch . '%')
                                            ->orWhere('domaine' , 'like' , '%'. $request->par_domaine . '%' )->paginate(6);
                }
                else{
                    $allusers = DB::table('users')->where('domaine' , 'like' , '%'. $request->par_domaine . '%' )->paginate(6);
                }
                
            }
            if(!$request->has('ck_domine') && !$request->has('ck_trier'))
            {
                $allusers = DB::table('users')->where('name' , 'like' , '%'. $request->bar_shearch . '%')
                                            ->orWhere('email' , 'like' , '%'. $request->bar_shearch . '%')
                                            ->orWhere('addres' , 'like' , '%'. $request->bar_shearch . '%')
                                            ->orWhere('tele' , 'like' , '%'. $request->bar_shearch . '%')
                                            ->orderBy('updated_at','desc')->paginate(6);
            }

            if($request->has('ck_domine') && $request->has('ck_trier'))
            {
                if ($request->filled('bar_shearch')) {
                    $allusers = DB::table('users')->where('name' , 'like' , '%'. $request->bar_shearch . '%')
                                                ->orWhere('email' , 'like' , '%'. $request->bar_shearch . '%')
                                                ->orWhere('addres' , 'like' , '%'. $request->bar_shearch . '%')
                                                ->orWhere('tele' , 'like' , '%'. $request->bar_shearch . '%')
                                                ->orWhere('domaine' , 'like' ,'%'. $request->par_domaine . '%' )
                                                ->orderBy('updated_at', $request->trier_par )->paginate(6);
                }
                else{
                    $allusers = DB::table('users')->where('domaine' , 'like' ,'%'. $request->par_domaine . '%' )
                                                  ->orderBy('updated_at', $request->trier_par )->paginate(6);
                }
            }


            $alldomines =  domaine::all();
            return view('pages.userscv')->with(['allusers'=>$allusers , 'alldomines'=>$alldomines]);

        }else{
            return redirect()->route('userscv.index');
        }
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
