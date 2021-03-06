@extends('layouts.app')
@section('styles')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

@endsection

@section('content')
<div class="container" >
  <div class="col-md-12" style="background-color: #fff">
  
<!-- Section: Group of personal cards -->
<section class="my-5">

  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-md-12">

      <!-- Card group-->
      <div class="card-group">

        <!-- Card -->
        <div class="card card-personal mb-md-0 mb-4">

          <!-- Card image-->
          <div class="view overlay">
            <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Avatars/img%20(26).jpg" alt="Card image cap">
            <a href="#!">
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <!-- Card image-->

          <!-- Card content -->
          <div class="card-body">

            <!-- Title-->
            <a>
              <h4 class="card-title">Anna</h4>
            </a>
            <a class="card-meta">Friends</a>
            <!-- Text -->
            <p class="card-text">Anna is a web designer living in New York.</p>
            <hr>
            <a class="card-meta"><span><i class="fa fa-user"></i>83 Friends</span></a>
            <p class="card-meta float-right">Joined in 2012</p>

          </div>
          <!-- Card content -->

        </div>
        <!-- Card -->

        <!-- Card -->
        <div class="card card-personal mb-md-0 mb-4">

          <!-- Card image-->
          <div class="view overlay">
            <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Avatars/img%20(27).jpg" alt="Card image cap">
            <a href="#!">
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <!-- Card image-->

          <!-- Card content -->
          <div class="card-body">

            <!-- Title-->
            <a>
              <h4 class="card-title">John</h4>
            </a>
            <a class="card-meta">Coworker</a>
            <!-- Text -->
            <p class="card-text">John is a copywriter living in Seattle.</p>
            <hr>
            <a class="card-meta"><span><i class="fa fa-user"></i>48 Friends</span></a>
            <p class="card-meta float-right">Joined in 2015</p>

          </div>
          <!-- Card content -->

        </div>
        <!-- Card -->

        <!-- Card -->
        <div class="card card-personal mb-md-0 mb-4">

          <!-- Card image-->
          <div class="view overlay">
            <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Avatars/img%20(28).jpg" alt="Card image cap">
            <a href="#!">
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <!-- Card image-->

          <!-- Card content -->
          <div class="card-body">

            <!-- Title-->
            <a>
              <h4 class="card-title">Sara</h4>
            </a>
            <a class="card-meta">Coworker</a>
            <!-- Text -->
            <p class="card-text">Sara is a video maker living in Tokyo.</p>
            <hr>
            <a class="card-meta"><span><i class="fa fa-user"></i>127 Friends</span></a>
            <p class="card-meta float-right">Joined in 2014</p>

          </div>
          <!-- Card content -->

        </div>
        <!-- Card -->

      </div>
      <!-- Card group-->

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

</section>
<!-- Section: Group of personal cards -->
 </div>
</div>
@endsection