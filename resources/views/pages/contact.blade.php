@extends('index')


@section('content')
    <div class="content scrl">
        <div class="scrl">
            <div class="contact">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="row">
                    <div class="col-md-3 sidecontact">
                        <div class="contact-info">
                            <i class="fas fa-envelope img"></i>
                            <h2>Contact Us</h2>
                            <h4>We would love to hear from you !</h4>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <form action="{{route('contact.store')}}" method="post">
                            @csrf
                            <div class="contact-form">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="name">Name:</label>
                                    <div class="col-sm-10">          
                                        <input type="text" class="form-control" id="name" placeholder="Enter your Name" value="{{$user->name}}" name="name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="email">Email:</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" placeholder="Enter email" value="{{$user->email}}" name="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="subject">Subject:</label>
                                    <div class="col-sm-10">          
                                        <input type="text" class="form-control" id="subject" placeholder="Enter your subject"  name="subject">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="body">body:</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" rows="5" id="body" name="body"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">        
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default">Envoyer</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </div>
@endsection
