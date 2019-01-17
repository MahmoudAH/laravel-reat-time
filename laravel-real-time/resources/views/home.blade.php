@extends('layouts.app')
@section('styles')
<style type="text/css">
      .liked{
        color: blue;
        font-weight: bold;
        font-size: 15px
      }
      #home a{
        text-decoration:none;

      }
      #home  a p{
        color: black
      }
     </style>
      <link href="{{ asset('css/postsStyle.css') }}" rel="stylesheet">
      <link src="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css"></link>
     <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
     <link href="https://fonts.googleapis.com/css?family=Shrikhand" rel="stylesheet">

     <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
     
@endsection
@section('content')
<!-- show flash message -->
<div class="panel-body" style="text-align: center;color: #009688;padding: 0;margin: 0 80px;font-size: 20px">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>

                    @endif
</div>

<div class="container" id="home">
    <div class="row">
      <div class="col-md-3">
          
          <!--card left profile user-->
 <div class="card" style="margin-bottom: 40px;">
  <div class="card-image">
    <figure class="image is-4by3">
      <img src="http://placeimg.com/80/80" class="img-responsive" width="100%" height="100" style="">
    </figure>
  </div>
  <div class="card-content " style="padding: 20px">
    <div class="media">
      <div class="media-left">
        <figure class="image is-48x48">
          <img src="http://placeimg.com/80/80" class="img-responsive" width="80%" height="100" style="">
        </figure>
      </div>
      <div class="media-content">
        <p class="title is-4" style="font-style: bold;font-family: 'Shrikhand', cursive;
           font-size: 20px">{{ucfirst(Auth::user()->name)}}</p>
        <p class="subtitle is-6" style="margin-top: -15px">@johnsmith</p>
      </div>
    </div>

    <div class="content" style="padding: 5px">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
      Phasellus nec iaculis mauris. 
      
      <br>
      <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
    </div>
  </div>
</div>
          <div class="list-group">
 
            <a href="#" class="list-group-item">
              <i class="fa fa-user" aria-hidden="true" style="padding-right: 10px"></i>
              Friends
            </a>
            <a href="#" class="list-group-item">
              <i class="fa fa-wrench" aria-hidden="true" style="padding-right: 10px"></i>
              Settings
            </a>
            <a href="#" class="list-group-item"><i class="fa fa-plus-square-o" aria-hidden="true" style="padding-right: 10px"></i>
              Privacy
            </a>
            <a href="#" class="list-group-item">
              <i class="fa fa-sign-out" aria-hidden="true"></i>
             log out
            </a>
          </div>
      </div>

        <div class="col-md-6 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <a href="{{ route('posts.create') }}">Create New Post</a>
                </div>
                <div class="panel-body">
                 @if($posts->count() >0) 
                  @foreach($posts as $post)
                   <section class="post-heading">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="media">
                              <div class="media-left">
                                <a href="#">
                                  <img class="media-object photo-profile" src="http://0.gravatar.com/avatar/38d618563e55e6082adf4c8f8c13f3e4?s=40&d=mm&r=g" width="40" height="40" alt="...">
                                </a>
                              </div>
                              <div class="media-body">
                                <a href="#" class="anchor-username"><h4 class="media-heading">{{ucfirst($post->user->name)}}</h4></a> 
                                <h6  class="anchor-time">
                                  {{ $post->updated_at->toFormattedDateString() }}<i class="fa fa-globe" aria-hidden="true" style="padding-left: 10px;padding-bottom: 15px"></i></h6>
                              </div>
                            </div>
                        </div>
                         <div class="col-md-1">
                             <a href="#"><i class="glyphicon glyphicon-chevron-down"></i></a>
                         </div>
                    </div>             
               </section>
               <section class="post-body">
                   <a href="{{route('posts.show',$post->id)}}">
                          <p class="card-text">{{$post->content}}
                          </p>
                    </a> 
               </section>
                 
                    <hr>
                    
                  <section class="post-footer" style="margin-top: -20px">
                        
                        
                       @if($post->likes()->count() > 0)
                       <a href=""   data-toggle="modal" data-target="#exampleModal">
                       <span > {{$post->likes()->count()}} <i class="fa fa-heart-o" aria-hidden="true" class="fa fa-heart" style=" " ></i> </span></a>

                       
                       <!-- Button trigger modal -->

                         <!-- Modal -->
                         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog" role="document">
                             <div class="modal-content">
                               <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">users who liked on this post</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                                 </button>
                               </div>
                               <div class="modal-body">
                                 @foreach($post->likes as $like)
                                                <p>{{$like->name}}</p>
                                                @endforeach
                               </div>
                               <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary"                          data-dismiss="modal">Close</button>
                               </div>
                             </div>
                           </div>
                         </div>
                        @endif
                        
                        @if($post->comments()->count() > 0)
                        <a href="" class="pull-right" @click.prevent=" commentHidden =! commentHidden" :class="testComment">
                         <span > {{$post->comments()->count()}} comment </span></a>
                        @endif
                        <hr style="margin-top: 2px;margin-bottom: 2px">     
                        

                         <!--like button-->
                        <like :post={{ $post->id }}
                           :favorited={{ $post->liked() ? 'true' : 'false' }}>
              
                         </like>         
                        
                        <!--comment button--> 
                         <a href="#" class="card-link" style="padding-right: 60px" ><i class="fa fa-commenting" aria-hidden="true"></i>
                         Comment </a>
                         
                         <a href="#" class="card-link" style="padding-right: "><i class="fa fa-share" aria-hidden="true"></i>
                         Share</a>
                       </section>
                      
                     <!--comment box-->
                     <comment :post={{ $post->id }}
                              :user="{{  Auth::user()->toJson() }}">
                       
                     </comment>
                     
                     
                    @foreach ($post->comments as $comment) 
                     <div class="media" style="margin-top:20px;"  v-if="testComment">
                       <div class="media-left">
                         <a href="#">
                           <img class="media-object" src="http://placeimg.com/80/80" alt="...">
                         </a>
                       </div>
                       <div class="media-body">
                         <h4 class="media-heading">{{$comment->user->name}} said...                 
                         </h4>
                         <p>
                           {{$comment->body}}
                         </p>
                         <span style="color: #aaa;">on {{$comment->created_at}}</span>
                       </div>
                     </div>
                     @endforeach
                     <hr style="font-size:15px">                   
                    @endforeach
                   @else
                   <p>add new friends to see your posts<a href="{{ route('friends.index') }}"> add now</a></p>
                   @endif 
                </div>
            </div>
            
        </div>
        <div class="col-md-3">
          <div class="list-group" style="margin-bottom: 50px">
            <a href="#" class="list-group-item ">
              <strong style="">Pepoel may you know..</strong>
            </a>
            <a href="#" class="list-group-item ">
              
                @foreach($peopelToFollow as $peopel )
                <td style="padding: 5px;margin-bottom: 5px">
                    <div style="float: left;">
                      
                      <strong>{{str_limit($peopel->name,7)}}</strong>
                    </div>
                    <div style="float: right;">
                      <form method="POST" action="{{route('friend.add',$peopel->id)}}">
                                          {{ csrf_field() }}
                                        <button class="btn btn-primary" >
                                          <i class="fa fa-user-plus" aria-hidden="true"></i>
                                           Add
                                        </button></form> 
                    </div><div class="clearfix"></div>
                 </td>
                <hr>
                @endforeach
                  
            </a>
            <span  class="list-group-item">
              <i class="fa fa-user" aria-hidden="true" style="padding-right: 10px"></i>
              <a href="{{ route('friends.index') }}"> Find people you know</a> 
            </span>
          </div>
       </div>    
      
    </div>    
</div>

@endsection
@section('scripts')
 <script>
    const app = new Vue({
      el: '#app',
      data: {
        commentHidden: false,
        liked: false,
        likes: '',
        comments: {},
        commentBox: '',    
        
      },
      computed:{
        testComment:function(){
          
            return this.commentHidden;
        },
        testLike:function(){
          return (this.liked) ? 'liked':'';
        }
      }
    });

  </script>
@endsection
