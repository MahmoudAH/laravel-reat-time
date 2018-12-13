@extends('layouts.app')
@section('styles')

    <link href="{{ asset('css/friends.css') }}" rel="stylesheet">


@endsection

@section('content')
<div class="container" >
  <div class="col-md-8" style="background-color: #fff">
  <h2 class="subheader">Friends Reqeusts</h2><hr>
  <table style="width:100%;">
    
    <tbody>
      <tr >
          <td>
            <div><img class="media-object" src="http://placeimg.com/80/80" alt="..."></div>
            <div style="float: right;margin-top: -70px"> <strong>mahmiyd ali</strong> <br>
              <span style="opacity: .5">63 matual friends</span> </div>
             </td>
          
          <td style="float: right;">
            <button  class="btn btn-primary" style="margin: 5px">Accept</button><button class="btn btn-info" >Remove friend</button></td>
      </tr>
      <tr >
          <td>
            <div><img class="media-object" src="http://placeimg.com/80/80" alt="..."></div>
            <div style="float: right;margin-top: -70px"> <strong>mahmiyd ali</strong> <br>
              <span style="opacity: .5">63 matual friends</span> </div>
             </td>
          
          <td style="float: right;">
            <button  class="btn btn-primary" style="margin: 5px">Accept</button><button class="btn btn-info" >Remove friend</button></td>
      </tr>

    </tbody>
  </table>
</div>
</div>
<div class="container" style="margin-top: 20px">
  <div class="col-md-8"style="background-color: #fff">
    <h2 class="subheader">Other People</h2>
  <table style="width:100%;">
    <thead>
      <tr>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      
      <tr >
          <td>
            <div><img class="media-object" src="http://placeimg.com/80/80" alt="...">
            </div>
            
            <div style="float: right;margin-top: -70px">
              <strong>mahmiyd ali</strong> <br>
              <span style="opacity: .5">63 matual friends</span> </div>
            </td>
         
          <td style="float: right;"><button class="btn btn-success" style="margin: 5px"><i class="fa fa-user-plus" aria-hidden="true"></i>
         Add Friend </button><button class="btn btn-info" >Remove </button></td>
      </tr>
      <tr >
          <td>
            <div><img class="media-object" src="http://placeimg.com/80/80" alt="...">
            </div>
            
            <div style="float: right;margin-top: -70px"> <strong>mahmiyd ali</strong> <br>
              <span style="opacity: .5">63 matual friends</span> </div></td>
          
          <td style="float: right;"><button class="btn btn-success" style="margin: 5px"><i class="fa fa-user-plus" aria-hidden="true"></i>
         Add Friend </button><button class="btn btn-info" >Remove </button></td>
      </tr><hr>
      <tr >
          <td>
            <div><img class="media-object" src="http://placeimg.com/80/80" alt="...">
            </div>
            
            <div style="float: right;margin-top: -70px"> <strong>mahmiyd ali</strong> <br>
              <span style="opacity: .5">63 matual friends</span> </div></td>
          
          <td style="float: right;"><button class="btn btn-success" style="margin: 5px"><i class="fa fa-user-plus" aria-hidden="true"></i>
         Add Friend </button><button class="btn btn-info" >Remove </button></td>
      </tr>

    </tbody>
  </table>
       
  </div>
</div>
  
 
@endsection