@extends('index')

@include('layouts.nav')

@section('content')
    <div class="content">
        <!-- Use any element to open the sidenav -->
        <div class="sideopen" id="sideopen" onclick="openNav()">
            <i class="fas fa-angle-right"></i>
            <span class="sideopentext">Open</span>
        </div>
        <div class="sideclose" id="sideclose" onclick="closeNav()">
            <i class="fas fa-angle-left"></i>
            <span class="sideclosetext">Close</span>
        </div>
        

        <div class="container">

            <div id="mySidenav" class="sidenav">
                <a href="#">About</a>
                <a href="#">Services</a>
                <a href="#">Clients</a>
                <a href="#">Contact</a>
            </div>
              
            
              
            <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
            <div id="main" style="margin-top: -130px;">
                @if (Session::has('succes'))
                    <div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong><i class="fas fa-check"></i> {{Session::get('succes')}} </strong>    
                    </div>
                @endif 

                <div class="card">
                
                    <div class="card-header ">
                        <div class="row" >
                            <div class="col-3">
                                <img class="card-img-top  img-fluid"  src="images/cv1.png"  alt="Card image cap">
                            </div>
                            <div class="col-4">
                                <h3 class="card-title ">{{$user->name}}</h3>
                                <p class="mt-2">{{$user->domaine}}</p>
                            </div>
                            <div class="col-5 border ">
                                <h3 class="col ">{{$user->tele}}</h3>
                                <h3 class="col ">{{$user->addres}}</h3>
                                <div class="float-left mt-2">
                                    <button type="button" class="btn btn-link col" style="color:#232341cb"><h3>{{$user->email}}</h3></button>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        {{-- container de cv :formation,loisir... --}}
                        <div class="container">
                            <a href="#demo1" data-toggle="collapse">
                                <button type="button" class="btn btn-secondary btn-lg btn-block">Formation </button>
                            </a>
                            
                            <div class="container">
                                <div id="demo1" class="collapse show">
                                    <p class="card-text">
                                        This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <a href="#demo2" data-toggle="collapse">
                                <button type="button" class="btn btn-secondary btn-lg btn-block">Formation </button>
                            </a>
                       
                            <div class="container">
                                <div id="demo2" class="collapse show">
                                    <p class="card-text">
                                        This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <a href="#demo3" data-toggle="collapse">
                                <button type="button" class="btn btn-secondary btn-lg btn-block">Formation </button>
                            </a>
                            
                            <div class="container">
                                <div id="demo3" class="collapse show">
                                    <p class="card-text">
                                        This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection