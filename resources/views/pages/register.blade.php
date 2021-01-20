@extends('index')



@section('content')
    <div class="content"> 
        <div class="container continuser" id="err" style="padding:8px; background-color: #b1afb842;">
            @if (Session::has('succes'))
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><i class="fas fa-check"></i> {{Session::get('succes')}} </strong>    
                </div>
            @endif
            <a data-toggle="collapse" >
                <button type="button" class="btn btn-dark btn-lg btn-block"> Inscription </button>
            </a>

            <div class="container" >
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
                        <form action="{{route('register.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <fieldset>
                                <label class="control-label" for="name">Nom*</label>
                                <input class="form-control" id="name" name="name" type="text" placeholder="Taper Votre Nom..." required>
                                </fieldset>
                            </div>
                            <div class="form-group">
                                <fieldset>
                                <label class="control-label" for="email">Email*</label>
                                <input class="form-control" id="email" name="email" type="email" placeholder="Taper Votre Email..." required>
                                </fieldset>
                            </div>
                            <div class="form-group">
                                <fieldset>
                                <label class="control-label" for="password">Password*</label>
                                <input class="form-control" id="password" name="password"  type="password" placeholder="Taper Votre Password..." required>
                                </fieldset>
                            </div>
                            <div class="form-group">
                                <fieldset>
                                <label class="control-label" for="confirmpassword">Confirmer Password*</label>
                                <input class="form-control" id="confirmpassword" name="confirmpassword" type="password" placeholder="Taper Votre confirmation..." required>
                                </fieldset>
                            </div>
                            <div class="form-group">
                                <fieldset>
                                <label class="control-label" for="addres">Address</label>
                                <input class="form-control" id="addres" name="addres"  type="text" placeholder="Taper Votre Address..." >
                                </fieldset>
                            </div>
                            <div class="form-group">
                                <fieldset>
                                    <label class="control-label" for="tele">Tele</label>
                                    
                                    <input class="form-control" id="tele" name="tele" type="tel" placeholder="Taper Votre Tele..." >
                                    
                                </fieldset>
                            </div>
                            
                                
                           
                            {{-- //domaine --}}
                            <div class="form-group">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="control-label" for="domaine">Domaine</label>
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <select class="custom-select" id="domaine" name="domaine" >
                                                    <option selected="" disabled>Open this to select Domaine</option>
                                                    @foreach ($alldomines as $domaine)
                                                        <option value="{{$domaine->nom_domaine}}">{{$domaine->nom_domaine}}</option>
                                                    @endforeach
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
                                    <input class="form-control" id="description" name="description"  type="text" placeholder="taper votre Description..." multiline>
                                </fieldset>
                            </div>

                            <button type="submit" class="btn btn-info btn-lg btn-block">Register</button>
                        </div>
                        </form>
                        
                </div>
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
                    @csrf
                    <div class="modal-body">

                         <input class="form-control" id="nom_domaine" name="nom_domaine" type="text" placeholder="Taper Votre noveux domaine..." required>
                      
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="butsave">Add</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
    </div>
@endsection

