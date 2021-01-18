<script src="{{URL::to('js/jquery-3.5.1.min.js')}}"></script>
@extends('index')

@section('content')
    <div class="content">
        <div class="container">
            
            <div class="">

                {{-- filtrage --}}
                <form method="post" id="shearch">
                    @csrf
                    <div class="list-group">
                        <div class="list-group-item">
                            <div class="row">
                                <div class="col-sm-3">
                                    <button data-toggle="collapse" type="button" data-target="#demo" class="btn btn-secondary btn-block">Filter</button>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group mb-3 ">
                                        <input type="text" class="form-control" placeholder="Chercher" id="bar_shearch" name="bar_shearch">

                                        <div class="input-group-append">
                                            <button type="submit" class="input-group-text" >
                                                <span class=""><i class="fas fa-search"></i></span>
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        
        
                    <div id="demo" class="collapse list-group-item">
                        <div class="row" >
                            <div class="input-group col-sm-6 ">
        
                                <div class="input-group-prepend " style="width: 200%">
                                    <div class="input-group-text ">
                                        <input type="checkbox">
                                    </div>
                                    <select class="custom-select" id="inlineFormCustomSelect" id="trier_par" name="trier_par">
                                        <option selected disabled>Trier...</option>
                                        <option value="asc">ascendant</option>
                                        <option value="desc">descendant</option>
                                    </select>
                                </div>
                                    
                            </div>
        
                            <div class="input-group col-sm-6 ">
        
                                <div class="input-group-prepend " style="width: 200%">
                                    <div class="input-group-text ">
                                        <input type="checkbox">
                                    </div>
                                    <select class="custom-select" id="inlineFormCustomSelect" id="par_domaine" name="par_domaine">
                                        <option selected disabled>Domaine ...</option>

                                        @foreach ($alldomines as $domaine)
                                            <option value="{{$domaine->nom_domaine}}">{{$domaine->nom_domaine}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                    
                            </div>
        
                            {{-- <div class="input-group col-sm-4 ">
        
                                <div class="input-group-prepend " >
                                    <div class="input-group-text ">
                                        <input type="checkbox">
                                    </div>
                                    <div class="row col-sm-12">
                                        <input type="text" class="form-control col-6" placeholder="Min Competence">
                                        <input type="text" class="form-control col-6 " placeholder="Max Competence">
                                    </div>
                                </div>
                                    
                            </div> --}}
                                
                        </div>
                    </div>
                    {{-- end filtrage --}}
                </form>


                

                {{-- cards --}}
                <div class="container" >
                    <div class="row " id="card_show">
                        
                        @if ($shearch_bar != '0' )
                            
                            @foreach ($shearch_bar as $sh_user)

                                <div class="card col-sm-4 mt-2" style="height: 100% !important">
                                    <div class="card-header p-1 bg-white">
                                        <div class="form-group text-center">
                                            <img class="card-img-top height_img p-1 border" style="border-radius: 50%;width:130px;height: 130px;" src="{{URL::to('images/'.$sh_user->image)}}" alt="Card image cap">
                                            <h3 class="card-title text-center p-0">{{$sh_user->name}}</h3>
                                        </div>
                                    </div>

                                    <div class="card-body p-1" style="overflow: hidden; height: 75px;" >
                                        <p class="card-text" >{{$sh_user->description}}</p>
                                    </div>
                                    <div class="card-footer p-1" >
                                        <small class="text-muted mt-3 float-left">Last Upadet : {{$sh_user->updated_at}}</small>
                                        <div class="float-right pull-right">
                                            <button type="button" class="btn btn-outline-secondary"><a class="btn btn-outline-secondar" href="{{route('profile.show',['id'=>$sh_user->id])}}">More</a></button>
                                        </div>
                                    </div>
                                </div>
                                
                            @endforeach 
                            
                        @else
                            @foreach ($allusers as $user)
                                @if (count($allusers) > 0)
                                    <div class="card col-sm-4 mt-2" style="height: 100% !important">
                                        <div class="card-header p-1 bg-white">
                                            <div class="form-group text-center">
                                                <img class="card-img-top height_img p-1 border" style="border-radius: 50%;width:130px;height: 130px;" src="{{URL::to('images/'.$user->image)}}" alt="Card image cap">
                                                <h3 class="card-title text-center p-0">{{$user->name}}</h3>
                                            </div>
                                        </div>

                                        

                                        <div class="card-body p-1" style="overflow: hidden; height: 75px;" >
                                            <p class="card-text" >{{$user->description}}</p>
                                        </div>
                                        <div class="card-footer p-1" >
                                            <small class="text-muted mt-3 float-left">Last Upadet : {{$user->updated_at}}</small>
                                            <div class="float-right pull-right">
                                                <button type="button" class="btn btn-outline-secondary"><a class="btn p-1" href="{{route('profile.show',['id'=>$user->id])}}">More</a></button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach 
                        @endif

                        
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


<script>
    $(document).ready(function(){
        $('#shearch').on('submit',function(event){
            event.preventDefault();
            $.ajax({    
                url: "{{route('userscv.store')}}",
                method:"POST",
                data:$(this).serialize(),
                dataType:"json",
                success:function(data)
                {
                    if (data.errors)
                    {
                        alert(data.errors);
                    }else{
                        $('#card_show').load(location.href + " #card_show");
                    }
                    // $('#card_show').html(``);
                    
                }
            });
        });
    });
</script>