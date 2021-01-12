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
            <div id="main" style="background-color: rgba(255, 255, 255, 0.788); margin-top: -130px;" >

                @if (Session::has('succes'))
                    <div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong><i class="fas fa-check"></i> {{Session::get('succes')}} </strong>    
                    </div>
                @endif

                    <a href="#demo3" data-toggle="collapse">
                        <button type="button" class="btn btn-secondary btn-lg btn-block">Main Info </button>
                    </a>
                    
                    <div class="container">

                        <div  class="collapse show">
                            <div class="container">
                                @if (!($errors->isEmpty()))
                                    <div class="alert alert-dismissible alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <strong><i class="fas fa-exclamation-circle"></i> {{$error}} </strong> <br>                      
                                        @endforeach
                                    </div>
                                @endif
                                <form action="{{route('register.store')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <fieldset>
                                        <label class="control-label" for="name">Nom</label>
                                        <input class="form-control" id="name" name="name" type="text" placeholder="Taper Votre Nom..." required>
                                        </fieldset>
                                    </div>
                                    <div class="form-group">
                                        <fieldset>
                                        <label class="control-label" for="email">Email</label>
                                        <input class="form-control" id="email" name="email" type="email" placeholder="Taper Votre Email..." required>
                                        </fieldset>
                                    </div>
                                    <div class="form-group">
                                        <fieldset>
                                        <label class="control-label" for="password">Password</label>
                                        <input class="form-control" id="password" name="password"  type="password" placeholder="Taper Votre Password..." required>
                                        </fieldset>
                                    </div>
                                    <div class="form-group">
                                        <fieldset>
                                        <label class="control-label" for="confirmpassword">Confirmer Password</label>
                                        <input class="form-control" id="confirmpassword" name="confirmpassword" type="password" placeholder="Taper Votre confirmation..." required>
                                        </fieldset>
                                    </div>
                                    <div class="form-group">
                                        <fieldset>
                                        <label class="control-label" for="addres">Address</label>
                                        <input class="form-control" id="addres" name="addres"  type="text" placeholder="Taper Votre Address..." required>
                                        </fieldset>
                                    </div>
                                    <div class="form-group">
                                        <fieldset>
                                        <label class="control-label" for="tele">Tele</label>
                                        <input class="form-control" id="tele" name="tele" type="tel" placeholder="Taper Votre Tele..." required>
                                        </fieldset>
                                    </div>
            
                                    {{-- //domaine --}}
                                    <div class="form-group">
                                        <fieldset>
                                            <div class="form-group">
                                                <label class="control-label" for="domaine">Domaine</label>
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <select class="custom-select" id="domaine" name="domaine" required>
                                                            <option selected="" disabled>Open this to select Domaine</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                        </select>
                                                        <div class="input-group-append" data-toggle="modal" data-target="#largeModal" style="cursor: cell">
                                                            <span class="input-group-text bg-primary">
                                                                <i class="fas fa-plus text-light"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
            
                                    {{-- images --}}
                                    
                                    <div class="form-group">
                                        <label class="control-label" for="noveux">Choose file</label>
                                        <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="image" ><i class="fas fa-upload"></i> Chose file </label>
                                            
                                        </div>
                                        </div>
                                    </div>
        
                                    <div class="form-group">
                                        <fieldset>
                                        <label class="control-label" for="description">Description</label>
                                        <input class="form-control" id="description" name="description" type="text" placeholder="Taper Votre Description...">
                                        </fieldset>
                                    </div>
        
                                    <button type="submit" class="btn btn-info btn-lg btn-block">Update</button>
                                </div>
                                </form>
                                
                        </div>
                    </div>


                

                {{-- model --}}
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Add New Domaine</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="{{route('register.adddomin')}}" method="get">
                    <div class="modal-body">

                         <input class="form-control" id="nom_domaine" name="nom_domaine" type="text" placeholder="Taper Votre noveux domaine..." required>
                      
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
              </div>
            </div>
        </div>
                


                {{-- ************** info de cv ****************** --}}
                    <a href="#demo4" data-toggle="collapse">
                        <button type="button" class="btn btn-secondary btn-lg btn-block">Add Info de votre cv </button>
                    </a>
                    
                    <div class="container">
                        <div id="demo4" class="collapse show">
                            <p class="card-text">
                                This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                            </p>

                            
                                @php
                                    $nbr_form1 = 1;
                                    $nbr_form2 = 1;
                                @endphp
                                

                                <div class="form-group">
                                    <fieldset class="border mt-2">
                                        <label class="control-label" for="noveux">noveux info</label>
                                        <div class="form-group" >
                                            <div class="input-group mb-3">
                                                <input class="form-control" type="text" placeholder="Taper Votre noveux info...">
                                                <div class="input-group-append" onclick="addinputformation();">
                                                    <span class="input-group-text bg-primary  ">
                                                        <i class="fas fa-plus text-light "></i>
                                                    </span>
                                                </div>
                                                <div class="input-group-append" onclick="deleteinputformation(this);" id="ll">
                                                    
                                                    <span class="input-group-text bg-danger ">
                                                        <i class="fas fa-times-circle text-light "></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="container">
                                            
                                                

                                            
                                            <div class="form-group">
                                                <label class="control-label" for="noveux">noveux content</label>
                                                <textarea class="form-control" id="article-ckeditor" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 85px;"></textarea>
                                            </div>
                                            
                                                
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>


                                
                                <div id="inputformation">

                                </div>

                                
                            

                        </div>
                    </div>
                
            </div>

        </div>
    </div>
@endsection