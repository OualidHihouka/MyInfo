@extends('index')



@section('content')
    <div class="content " >
        <!-- Use any element to open the sidenav -->
        <div class="sideopen prnthide" id="sideopen" onclick="openNav()">
            <i class="fas fa-angle-right"></i>
            <span class="sideopentext">Open</span>
        </div>
        <div class="sideclose prnthide" id="sideclose" onclick="closeNav()">
            <i class="fas fa-angle-left"></i>
            <span class="sideclosetext">Close</span>
        </div>
        

        <div class="profile" >

            <div id="mySidenav" class="sidenav">
                <a href="#card">{{$user->name}}</a>
                @foreach ($allinfocv as $info_cv)
                    @if ( $info_cv->id_users === $user->id )
                        <a class="inf" href="#demo_{{$info_cv->id}}">{{$info_cv->furst_coll}}</a>
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
                
                

                    
                    
                    


                <div class="card card-relative" id="card">
                    {{-- print --}}
                    <div class="Printbutton prnthide" onclick="myFunction1()"><i class="fas fa-print "></i></div>

                    <div class="card-header ">
                        <div class="row text-center " >
                            <div class="form-group text-center col-xs-8 col-sm-4 col-md-3">
                                <img class="card-img-top border max-h max-w text-center"  src="{{URL::to('images/'.$user->image)}}" alt="Card image cap">
                            </div>
                            <div class="text-center col-xs-12 col-sm-8 col-md-4 txt-wrap row justify-content-center">
                                <h3 class="text-center card-title col-12 m-auto">{{$user->name}}</h3>
                                <h4 class="text-center card-title col-12 "><q class="">{{$user->domaine}}</q></h4>
                            </div>
                            <div class="text-center col-xs-12 col-sm-12 col-md-5 txt-wrap row justify-content-center">
                                <h4 class="text-center card-title col-12 m-auto">{{$user->tele}}</h4>
                                <h4 class="text-center card-title col-12 m-auto">{{$user->addres}}</h4>
                                <a href="{{route('contact.show',['id'=>$user->id])}}"><h4 class="text-center card-title col-12 m-auto">{{$user->email}}</h4></a>
                            </div>
                        </div>
                        <div class="card-body form-group border prnthide">
                            {{$user->description}}
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

<script>
    function myFunction1() {
        document.getElementById('main');
        window.print();
    }
</script>
