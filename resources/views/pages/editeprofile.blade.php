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
            <div id="main" style="background-color: rgba(255, 255, 255, 0.788);" class="mt-2">

                
                    <a href="#demo3" data-toggle="collapse">
                        <button type="button" class="btn btn-secondary btn-lg btn-block">Main Info </button>
                    </a>
                    
                    <div class="container">
                        <div id="demo3" class="collapse show">
                            <p class="card-text">
                                This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                            </p>
                            <div class="container">
                                <div class="form-group">
                                    <fieldset>
                                      <label class="control-label" for="nome">Nome</label>
                                      <input class="form-control" id="nome" type="text" placeholder="Taper Votre Nome...">
                                    </fieldset>
                                </div>
                                <div class="form-group">
                                    <fieldset>
                                      <label class="control-label" for="Email">Email</label>
                                      <input class="form-control" id="Email" type="text" placeholder="Taper Votre Email...">
                                    </fieldset>
                                </div>
                                <div class="form-group">
                                    <fieldset>
                                      <label class="control-label" for="Address">Address</label>
                                      <input class="form-control" id="Address" type="text" placeholder="Taper Votre Address...">
                                    </fieldset>
                                </div>
                                <div class="form-group">
                                    <fieldset>
                                      <label class="control-label" for="Tele">Tele</label>
                                      <input class="form-control" id="Tele" type="text" placeholder="Taper Votre Tele...">
                                    </fieldset>
                                </div>

                                {{-- //domaine --}}
                                <div class="form-group">
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="control-label" for="Domaine">Domaine</label>
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="Domaine">
                                                        <option selected="" disabled>Open this to select Domaine</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                    <div class="input-group-append" onclick="addmor();" style="cursor: cell">
                                                        <span class="input-group-text bg-primary">
                                                            <i class="fas fa-plus text-light"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="container">

                                                    <div class="form-group" id="addmor">
                                                         <label class="control-label" for="noveux">noveux domaine</label>
                                                        <div class="form-group" >
                                                          <div class="input-group mb-3">
                                                            <input class="form-control" id="noveux" type="text" placeholder="Taper Votre noveux domaine...">
                                                            <div class="input-group-append" id="addtodom" onclick="fuaddtodom();">
                                                                <span class="input-group-text">
                                                                    <i class="fas fa-check text-success"></i>
                                                                </span>
                                                            </div>
                                                            <div class="input-group-append" id="closedom" onclick="fuclosedom();">
                                                                <span class="input-group-text">
                                                                    <i class="fas fa-times-circle text-danger"></i>
                                                                </span>
                                                            </div>
                                                          </div>
                                                        </div>
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
                                        <input type="file" class="custom-file-input" id="inputGroupFile02">
                                        <label class="custom-file-label" for="inputGroupFile02"><i class="fas fa-upload"></i> Chose file </label>
                                        
                                      </div>
                                    </div>
                                </div>
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
                                            
                                                <label class="control-label" for="noveux">noveux content</label>

                                                <fieldset class="border mt-2">
                                                <div class="form-group">
                                                    
                                                    <div class="input-group" >
                                                        <input class="form-control"  type="text" placeholder="Taper Votre noveux info..">
                                                        <div class="input-group-append" onclick="addinputinfo(this);">
                                                            <span class="input-group-text bg-primary  ">
                                                                <i class="fas fa-plus text-light "></i>
                                                            </span>
                                                        </div>
                                                        <div class="input-group-append " onclick="deletinputinfo(this);" id="ff">
                                                            <span class="input-group-text bg-danger ">
                                                                <i class="fas fa-times-circle text-light "></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </fieldset>
                                                
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