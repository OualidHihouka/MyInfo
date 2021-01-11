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
                    <div class="col-sm-4 card mt-2">
                        <div class="card-header ">
                            <h3 class="card-title text-center">Card title</h3>
                        </div>
                        <img class="card-img-top height_img p-1" src="images/cv1.png" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>

                            <div class="float-right">
                                <button type="button" class="btn btn-outline-secondary" href="/profile"><a class="btn btn-outline-secondar" href="/profile">More</a></button>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>


                    
            </div>
            {{-- endcards --}}

            {{-- pagination --}}
            <div class="container">
                <div class="mt-3">
                    <ul class="pagination justify-content-center pagin">
                      <li class="page-item disabled mt-1 mr-4 mb-1">
                        <a class="page-link bg-secondary" href="#">&laquo;</a>
                      </li>
                      <li class="page-item active m-1">
                        <a class="page-link bg-secondary" href="#">1</a>
                      </li>
                      <li class="page-item m-1">
                        <a class="page-link bg-secondary" href="#">2</a>
                      </li>
                      <li class="page-item m-1 ">
                        <a class="page-link bg-secondary" href="#">3</a>
                      </li>
                      <li class="page-item m-1">
                        <a class="page-link bg-secondary" href="#">4</a>
                      </li>
                      <li class="page-item m-1">
                        <a class="page-link bg-secondary" href="#">5</a>
                      </li>
                      <li class="page-item mt-1 ml-4 mb-1">
                        <a class="page-link bg-secondary" href="#">&raquo;</a>
                      </li>
                    </ul>
                </div>
            </div>
            {{-- end pagination --}}
        </div>
        </div>
    </div>
@endsection