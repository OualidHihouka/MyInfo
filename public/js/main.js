var sideopen = document.getElementById("sideopen");
var sideclose = document.getElementById("sideclose");
/* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";

    sideopen.style.marginLeft = "250px"; 
    sideclose.style.visibility = "visible";
    sideclose.style.marginLeft = "250px";
    sideclose.style.zIndex = "15";
    sideopen.style.visibility = "hidden";
     
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
    document.body.style.backgroundColor = " rgba(111, 111, 182, 0.158)";

    sideclose.style.marginLeft = "0px"; 
    sideopen.style.visibility = "visible";
    sideopen.style.marginLeft = "0px";
    sideopen.style.zIndex = "20";
    sideclose.style.visibility = "hidden";
}

// /**    add / close domain  */
// function addmor(){
//     document.getElementById('addmor').style.display ="block";
// }

// function fuaddtodom(){
//     var x = document.getElementById('noveux').value;

//     document.getElementById('Domaine').value = x;

//     document.getElementById('addmor').style.display ="none";
// }

// function fuclosedom(){
//     document.getElementById('addmor').style.display ="none";
    
// }





// ******************************    edite profile ***************
function addinputformation(){
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("inputformation").innerHTML +=`<fieldset class="border mt-2">
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
        </fieldset>` ;
        }
    };
    xmlhttp.open("GET", "editeprofile", true);
    xmlhttp.send();
}


function deleteinputformation(e){
    //const divs = document.querySelectorAll('#ll');
    
    if ("ll" == e.getAttribute("id")) {
        alert('you can\'t remouve')
    }
    else{
        e.parentNode.parentNode.remove(e);
    }
}


function addinputinfo(e) {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            e.parentNode.parentNode.innerHTML += ` <div class="form-group"> 
                                        <div class="input-group" >
                                            <input class="form-control"  type="text" placeholder="Taper Votre noveux info..">
                                            <div class="input-group-append" onclick="addinputinfo(this);">
                                                <span class="input-group-text bg-primary  ">
                                                    <i class="fas fa-plus text-light "></i>
                                                </span>
                                            </div>
                                            <div class="input-group-append " onclick="deletinputinfo(this);" >
                                                <span class="input-group-text bg-danger ">
                                                    <i class="fas fa-times-circle text-light "></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>`;
        }
    };
    xmlhttp.open("GET", "editeprofile", true);
    xmlhttp.send();
}

function deletinputinfo(e){
    //const divs = document.querySelectorAll('#ff');
    
    if ("ff" == e.getAttribute("id")) {
        alert('you can\'t remouve')
    }
    else{
        e.parentNode.parentNode.remove(e);
    }
    
}