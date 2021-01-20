<script src="{{URL::to('js/jquery-3.5.1.min.js')}}"></script>

@extends('index')

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
        
        <div class="editeprofile">
            <div class="container" id="side">

                <div id="mySidenav" class="sidenav">
                    
                    <a href="#demo3">Main</a>
                    <a href="#demo4">Add new Info</a>
    
                    <div id="infocvside">
                        @foreach ($allinfocv as $info_cv)
                            @if ( $info_cv->id_users === $user->id )
                                <a id="" class="inf" href="#demo_{{$info_cv->id}}">{{$info_cv->furst_coll}}</a>
                            @endif
                        @endforeach
                    </div>
                    
                </div>
                  
                
                  
                <!-- Add all page content inside this div if you want the side nav to push page content to the right -->
                <div id="main" style="background-color: rgba(255, 255, 255, 0.788); " >
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
    
                            <div id="demo3"  class="collapse show">
                                <div class="container">
                                    @if (!($errors->isEmpty()))
                                        <div class="alert alert-dismissible alert-danger">
                                            @foreach ($errors->all() as $error)
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <strong><i class="fas fa-exclamation-circle"></i> {{$error}} </strong> <br>                      
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="form-group border text-center">
                                        <img class="card-img-top height_img p-1 border " style="border-radius: 50%;width:160px;height: 160px;" src="{{URL::to('images/'.$user->image)}}" alt="Card image cap">
                                    </div>
                                    <form action="{{route('editeprofile.update',['id'=>Auth::user()->id])}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <fieldset>
                                            <label class="control-label" for="name">Nom</label>
                                            <input class="form-control" id="name" name="name" type="text" placeholder="{{Auth::user()->name}}" value="{{Auth::user()->name}}" >
                                            </fieldset>
                                        </div>
                                        <div class="form-group">
                                            <fieldset>
                                            <label class="control-label" for="email">Email</label>
                                            <input class="form-control" id="email" name="email" type="email" placeholder="{{Auth::user()->email}}" value="{{Auth::user()->email}}">
                                            </fieldset>
                                        </div>
                                        <div class="form-group">
                                            <fieldset>
                                            <label class="control-label" for="password">Password</label>
                                            <input class="form-control" id="password" name="password"  type="password" placeholder="Entrer votre new password">
                                            </fieldset>
                                        </div>
                                        <div class="form-group">
                                            <fieldset>
                                            <label class="control-label" for="confirmpassword">Confirmer Password</label>
                                            <input class="form-control" id="confirmpassword" name="confirmpassword" type="password" placeholder="Entrer votre confirmation password">
                                            </fieldset>
                                        </div>
                                        <div class="form-group">
                                            <fieldset>
                                            <label class="control-label" for="addres">Address</label>
                                            <input class="form-control" id="addres" name="addres"  type="text" placeholder="{{Auth::user()->addres}}" value="{{Auth::user()->addres}}">
                                            </fieldset>
                                        </div>
                                        <div class="form-group">
                                            <fieldset>
                                            <label class="control-label" for="tele">Tele</label>
                                            <input class="form-control" id="tele" name="tele" type="tel" placeholder="{{Auth::user()->tele}}" value="{{Auth::user()->tele}}">
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
                                                                    @if ($domaine->nom_domaine == Auth::user()->domaine)
                                                                        <option value="{{$domaine->nom_domaine}}" selected>{{$domaine->nom_domaine}}</option>
                                                                    @else
                                                                        <option value="{{$domaine->nom_domaine}}">{{$domaine->nom_domaine}}</option>
                                                                    @endif
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
                                            <input class="form-control" id="description" name="description"  type="text" placeholder="{{Auth::user()->description}}" value="{{Auth::user()->description}}">
                                            </fieldset>
                                        </div>
            
                                        <button type="submit" class="btn btn-info btn-lg btn-block">Update</button>
                                    </div>
                                    </form>
                                    
                            </div>
                        </div>
    
    
                    
    
                        {{-- model add new domaine --}}
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
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Add</button>
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
                            <div id="infoerrors">
    
                            </div>
                            <div id="demo4" class="collapse show">
                                <p class="card-text">
    
                                </p>
    
                                    <div class="form-group" id="inputformation">
                                        <fieldset class="border mt-2">
                                            <label class="control-label" for="furst_coll">noveux info</label>
                                            <div class="form-group" >
                                                {{-- {{route('infocvcontroller.store')}} --}}
                                            <form  method="post" id="simple_form">
                                                @csrf
                                                
                                                <div class="input-group mb-3">
    
    {{-- add furst_coll --}}
                                                    <input class="form-control" id="furst_coll" name="furst_coll" type="text" placeholder="Taper Votre noveux info...">
    
                                                    <div class="input-group-append cursor-pointer mr-1" id="action_button" name="action_button">
                                                        <button type="submit" class="input-group-text bg-success  text-light">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                    </div>
    
                                                </div>
                                                <div class="container">
    {{-- add secend_coll2 --}}                       
    
                                                    <div class="form-group">
                                                        <fieldset>
                                                            <div class="form-group">
                                                                <label class="control-label" for="secend_coll2">noveux content</label>
                                                                <textarea class="form-control article-ckeditor" id="secend_coll2" name="secend_coll2"  rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 85px;"></textarea>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    
                                                </div>
    
    {{-- User::find($id)  --}}                  <input type="hidden" name="id_users" id="id_users" value="{{Auth::user()->id}}"> 
    
                                            </form>   
                                            
                                            </div>
                                        </fieldset>
                                    </div>
                            </div>
                        </div>
    
                        {{-- show info de cv --}}
                        <div id="infoadded">
                            @foreach ($allinfocv as $info_cv)
                                @if ( $info_cv->id_users === Auth::user()->id )
                                    <div class="container  mt-2" >
                                        <div class="input-group border" >
    
                                            <div class="input-group-append btn btn-secondary cursor-pointer mr-1 form-control txt-wrap"  href="#demo_{{$info_cv->id}}" data-toggle="collapse">
                                                <div class="text-center btn-block" >
                                                    {{$info_cv->furst_coll}}
                                                </div>
                                            </div>
                                            
                                            <div class="input-group-append cursor-pointer mr-1 editeinfocv" data-toggle="modal" data-target="#largeModalinfo" _id="{{$info_cv->id}}" id="editeinfocv_{{$info_cv->id}}">
                                                <div class="input-group-text bg-warning  text-light  btn-block" >
                                                    <i class="fas fa-pen"></i>
                                                </div>
                                            </div>
    
                                            <div class="input-group-append cursor-pointer mr-1 deleteinfocv" data-toggle="modal" data-target="#largeModalinfodelete" _id_="{{$info_cv->id}}" id="deleteinfocv_{{$info_cv->id}}">
                                                <div class="input-group-text bg-danger text-light  btn-block">
                                                    <i class="fas fa-trash-alt"></i>
                                                </div>
                                            </div>
                                            
    
                                            <div class="container txt-wrap" >
                                                <div id="demo_{{$info_cv->id}}" class="collapse show">
                                                    <p class="card-text">
                                                        {!!$info_cv->secend_coll2!!}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
    
    
                       {{-- model update info cv --}}
                        <div class="modal fade" id="largeModalinfo" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true"  style="margin-top: 25px !important;padding: 1px !important">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
    
                                    <div class="modal-header " style="padding: 3px !important">
                                        <h4 class="modal-title text-center" id="myModalLabel">Update Info</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
    
    
    
                                    <form method="post" id="frm_2">
                                        @csrf
                                        <div class="modal-body" style="padding: 4px !important">
                                            <label class="control-label" for="furst_collm">noveux info</label>
                                            <div class="errepd">
    
                                            </div>
                                            <div class="input-group ">
    
                                                {{-- add furst_coll --}}
                                                <input class="form-control" id="furst_collm" name="furst_coll" type="text" placeholder="" required>
    
                                            </div>
                                            <div class="container">
                                                {{-- add secend_coll2 --}}                       
    
                                                <div class="form-group">
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label class="control-label" for="secend_coll2m">noveux content</label>
                                                            <textarea class="form-control article-ckeditor" id="secend_coll2m" name="secend_coll2"  rows="3" style="margin-top: 0px; margin-bottom: 0px !important; height: 80px;!important" required></textarea>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                
                                            </div>
                                            <input type="hidden" id="hidden_id">
                                        
                                        </div>
                                        <div class="modal-footer" style="padding: 1px !important;">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" id="btn_sub" class="btn btn-warning">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    
    {{-- delete info de cv --}}
                    <div class="modal fade" id="largeModalinfodelete" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true"  style="margin-top: 25px !important;padding: 1px !important">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
    
                                <div class="modal-header"  style="padding: 3px !important">
                                    <h4 class="modal-title text-center" id="myModalLabel">Confirmation</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h2 id="txt">Vouler vous vriment supprimer cette info?</h2>
                                    <div id="succ" class="alert alert-dismissible alert-success">
                                        <strong><i class="fas fa-check"></i>Bien Supprission...</strong>    
                                    </div>
                                </div>
                                <div class="modal-body" style="padding: 4px !important">
                                        
                                <div class="modal-footer" style="padding: 1px !important;">
                                    <button type="button" id="btn_close" class="btn btn-secondary" data-dismiss="modal">Non</button>
                                    <button type="button" id="btn_oui" class="btn btn-danger">Oui</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
    </div>

@endsection




<script>
    
    $(document).ready(function(){
        
        // update

        //1-add data to form to modal
        $(document).on('click', '.editeinfocv', function(event){ 
            event.preventDefault();
            const __id = $(this).attr('_id');
            $.ajax({    
                url: "/infocvcontroller/"+ __id +"/edit/"  ,
                dataType:"json",
                    success:function(data_cv){
                    $('#furst_collm').val(data_cv.result.furst_coll); 
                    $('#secend_coll2m').val(data_cv.result.secend_coll2); 
                    $('#hidden_id').val(data_cv.result.id); 
                }
            });
        });
        
        //2-update data
        $('#largeModalinfo').ready(function(){
            $('#frm_2').on('submit',function(event){
                event.preventDefault();

                $('.errepd').show();
                var __id = $('#hidden_id').val();
                const id_user = {{Auth::user()->id}};
                
                $.ajax({
                    url: "/infocvcontroller/update/" + __id,
                    method:"POST",
                    data:$(this).serialize(),
                    dataType:"json",
                    success:function(data)
                    {
                        var html ='';
                        if (data.errors) {

                            for (let i = 0; i < data.errors.length; i++) {
                                html += `<div class="alert alert-dismissible alert-danger">
                                        <strong><i class="fas fa-check"></i>` + data.errors[i] +` </strong> 
                                        </div>`;
                            }
                        }
                        if (data.success) {

                            html= `<div class="alert alert-dismissible alert-success">
                                <strong><i class="fas fa-check"></i>` + data.success +'</div>' ;
                            
                            $('#simple_form')[0].reset();
                        // $('.errepd').hide();
                            $('#infoadded').load(location.href + " #infoadded");
                            $('#infocvside').load(location.href + " #infocvside");
                        }
                        $('.errepd').html(html);
                        
                        setTimeout(function(){ 
                        //$('#largeModalinfo').modal().hide();
                        $('.errepd').hide(500);
                    },1000); 
                    }
                });

            });
            
        });













        // add
        $('#simple_form').on('submit',function(event){
            event.preventDefault();
            
            $.ajax({
                url: "{{route('infocvcontroller.store')}}",
                method:"POST",
                data:$(this).serialize(),
                dataType:"json",
                success:function(data)
                {
                    var html ='';
                    if (data.errors) {

                        for (let i = 0; i < data.errors.length; i++) {
                            html += `<div class="alert alert-dismissible alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="fas fa-check"></i>` + data.errors[i] +` </strong> 
                                    </div>`;
                        }
                    }
                    if (data.success) {
                        
                        html= `<div class="alert alert-dismissible alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong><i class="fas fa-check"></i>` + data.success +'</div>' ;
                        
                        $('#simple_form')[0].reset();
                        $('#infoadded').load(location.href + " #infoadded");
                        $('#infocvside').load(location.href + " #infocvside");
                        
                    }
                    $('#infoerrors').html(html);

                }
            });
            closeNav();
            
        });


        










        //  delete   
        var user_id = null;
        $(document).on('click', '.deleteinfocv', function(event){ 
            event.preventDefault();
            $('#succ').hide();
            $('#btn_oui').show();    
            $('#txt').show();  
            $('#succ').hide(); 
            $('#btn_close').text('Non'); 
            $('#btn_oui').text('Oui'); 
            user_id = $(this).attr('_id_'); 
            $('#btn_oui').click(function(){
                
                $.ajax({    
                    url: {{Auth::user()->id}}+"/infocvcontroller/destroy/" + user_id,    
                    beforeSend:function(){ 
                        $('#btn_oui').text('Suppression...');    
                    },    
                    success:function(data_cv_del)    
                    {    
                        
                        setTimeout(function(){ 
                            $('#btn_oui').hide();    
                            $('#txt').hide();  
                            $('#succ').show(); 
                            $('#btn_close').text('Close');
                            setTimeout(function(){ 
                                //$('#largeModalinfodelete').modal().hide();
                            },500); 
                        }, 200);
                        $('#infoadded').load(location.href + " #infoadded");
                        $('#infocvside').load(location.href + " #infocvside");
                    }
                     
                })  
            });
        });


    });
</script>