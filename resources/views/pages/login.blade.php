@extends('index')


@section('content')
    <div class="container">
        <div class="container continuser " style="padding:8px; background-color: #b1afb842;">
            <a data-toggle="collapse" >
                <button type="button" class="btn btn-dark btn-lg btn-block"> Login </button>
            </a>
            @if(Session::has('Fail'))
                <div class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><i class="fas fa-times"></i> {{Session::get('Fail')}} </strong>    
                </div>
            @endif

            <div  class="collapse show">
                <div class="container">
                
                    <form action="{{route('login.auth')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <fieldset>
                            <label class="control-label" for="email">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror " id="email" name="email" type="email" placeholder="Taper Votre Email..." >
                                @error('email')
                                    <div class="alert alert-dismissible alert-danger">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong><i class="fas fa-times"></i> {{ $message }} </strong>    
                                    </div>
                                @enderror    
                            </fieldset>
                        </div>
                        <div class="form-group">
                            <fieldset>
                            <label class="control-label" for="password">Password</label>
                            <input class="form-control @error('password') is-invalid @enderror" id="password" name="password"  type="password" placeholder="Taper Votre Password...">
                                @error('password')
                                <div class="alert alert-dismissible alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="fas fa-times"></i> {{ $message }} </strong>    
                                </div>
                                @enderror 
                            </fieldset>
                        </div>
                        <button type="submit" class="btn btn-info btn-lg btn-block">Register</button>
                    </div>
                    </form>
                    
            </div>
        </div>
    </div>        
@endsection