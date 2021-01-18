@extends('index')

@section('content')
    <div class="content">
        
        <div id="carouselExampleCaptions" class="carousel slide carousel_height home" data-ride="carousel">

          <a class="button fix" style="vertical-align:middle" href="/userscv"><span>Get Started </span></a>
            
            
            <ol class="carousel-indicators carousel_stl">
                <li data-target="#carouselExampleCaptions"  data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions"  data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions"  data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner d-center">
                
              <div class="carousel-item active">
                <img src="images/cv5.jpg" class="d-center carousel_height img-fluid" style="width: 100%" alt="images/cv2">
              </div>

              <div class="carousel-item">
                <img src="images/cv1.png" class="d-block carousel_height img-fluid" style="width: 100%" alt="cv3">
              </div>

              <div class="carousel-item">
                <img src="images/cv6.jpeg" class="d-block carousel_height img-fluid" style="width: 100%" alt="cv4">
              </div>

            </div>

            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>

    </div>
@endsection