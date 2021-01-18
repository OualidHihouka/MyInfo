@extends('index')



@section('content')
    <div class="content " >
        <!-- Use any element to open the sidenav -->
        <div class="sideopen" id="sideopen" onclick="openNav()">
            <i class="fas fa-angle-right"></i>
            <span class="sideopentext">Open</span>
        </div>
        <div class="sideclose" id="sideclose" onclick="closeNav()">
            <i class="fas fa-angle-left"></i>
            <span class="sideclosetext">Close</span>
        </div>
        

        <div class="profile" >

            <div id="mySidenav" class="sidenav">
                <a href="#card">{{$user->name}}</a>
                @foreach ($allinfocv as $info_cv)
                    @if ( $info_cv->id_users === $user->id )
                        <a href="#demo_{{$info_cv->id}}">{{$info_cv->furst_coll}}</a>
                    @endif
                @endforeach
            </div>
              
            
              
            <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
            <div id="main">
                @if (Session::has('succes'))
                    <div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong><i class="fas fa-check"></i> {{Session::get('succes')}} </strong>    
                    </div>
                @endif 

                <div class="card" id="card">
                
                    <div class="card-header ">
                        <div class="row" >
                            <div class="form-group text-center col-sm-4">
                                <img class="card-img-top border" src="{{URL::to('images/'.$user->image)}}" alt="Card image cap">
                            </div>
                            <div class="col-sm-8">
                                <h3 class="card-title ">{{$user->name}}</h3>
                                <p class="mt-2">{{$user->domaine}}</p>
                            </div>
                            
                        </div>
                        <div class="border ">
                            <h3 class="col ">{{$user->tele}}</h3>
                            <h3 class="col ">{{$user->addres}}</h3>
                            <h3 class="col ">{{$user->email}}</h3>
                            
                        </div>
                        
                    </div>
                    <div class="card-body">
                        {{-- container de cv :formation,loisir... --}}
                        @foreach ($allinfocv as $info_cv)
                            @if ( $info_cv->id_users === $user->id )
                                <div class="container txt-wrap" id="infoadded">
                                    <a href="#demo_{{$info_cv->id}}" data-toggle="collapse">
                                        <button type="button" class="btn btn-secondary btn-lg btn-block">{{$info_cv->furst_coll}} </button>
                                    </a>
                                    
                                    <div class="container txt-wrap">
                                        <div id="demo_{{$info_cv->id}}" class="collapse show">
                                            <p class="card-text">
                                                {!!$info_cv->secend_coll2!!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection