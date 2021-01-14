@extends('index')

@include('layouts.nav')

@section('content')
    <div class="content">
        <div class="container">
        <div class="continuser">

        


            {{-- filtrage --}}
            <div class="list-group">
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-sm-3">
                            <button data-toggle="collapse" data-target="#demo" class="btn btn-secondary btn-block">Filter</button>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group mb-3 ">
                                <input type="text" class="form-control" placeholder="Chercher">
                                <div class="input-group-append">
                                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                

            <div id="demo" class="collapse list-group-item">
                <div class="row" >
                    <div class="input-group col-sm-4 ">

                        <div class="input-group-prepend " style="width: 200%">
                            <div class="input-group-text ">
                                <input type="checkbox">
                            </div>
                            <select class="custom-select"   id="inlineFormCustomSelect">
                                <option selected disabled>Trier...</option>
                                <option value="1">ascendant</option>
                                <option value="3">descendant</option>
                            </select>
                        </div>
                            
                    </div>

                    <div class="input-group col-sm-4 ">

                        <div class="input-group-prepend " style="width: 200%">
                            <div class="input-group-text ">
                                <input type="checkbox">
                            </div>
                            <select class="custom-select "   id="inlineFormCustomSelect">
                                <option selected disabled>Domaine ...</option>
                                <option value="1">tdi</option>
                                <option value="3">tri</option>
                            </select>
                        </div>
                            
                    </div>

                    <div class="input-group col-sm-4 ">

                        <div class="input-group-prepend " >
                            <div class="input-group-text ">
                                <input type="checkbox">
                            </div>
                            <div class="row col-sm-12">
                                <input type="text" class="form-control col-6" placeholder="Min Competence">
                                <input type="text" class="form-control col-6 " placeholder="Max Competence">
                            </div>
                        </div>
                            
                    </div>
                        
                </div>
            </div>
            {{-- end filtrage --}}

            {{-- cards --}}
            <div class="container ">
                <div class="row ">
                    @foreach ($allusers as $user)
                        @if (count($allusers) < 0)

                        @else
                            <div class="col-sm-4 card mt-2">
                                <div class="card-header ">
                                <h3 class="card-title text-center">{{$user->name}}</h3>
                                </div>
                                <img class="card-img-top height_img p-1" src="images/cv1.png" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">{!!$user->description!!}</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted mt-3 float-left">Last Upadet : {{$user->updated_at}}</small>
                                    <div class="float-right">
                                        <button type="button" class="btn btn-outline-secondary" href="/profile"><a class="btn btn-outline-secondar" href="{{route('profile.show',['id'=>$user->id])}}">More</a></button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach    
                </div>
                @if (count($allusers) < 0)
                    <div class="alert alert-dismissible alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong><i class="fas fa-danger"></i>Aucin Cv au moment!!!</strong>    
                    </div>
                @else 
                    {{$allusers->onEachSide(3)->links()}}
                @endif
            {{-- endcards --}}

        </div>
        </div>
    </div>
@endsection