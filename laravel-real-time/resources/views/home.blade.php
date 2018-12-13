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

@endsection
@section('content')
<div class="container" id="home">
    <div class="row">
    	<div class="col-md-3">
          <div class="list-group" style="margin-bottom: 50px">
            <a href="#" class="list-group-item ">
              <img src="http://placeimg.com/80/80" class="img-responsive" width="80%" height="100" style="">
            
              <h2>{{ucfirst(auth()->user()->name)}}</h2>
                <p style="margin-left: 10px">khjhbjg  gvgfg gvg jhbjg  gvgfg gvg fgf gftf f ytjhbjg  gvgfg gvg fgf gftf f ytfgf gftf f yt fyfy</p>
                    <!--  
              <p class="col-md-4">
                <strong>tweets</strong>   <br>
                 22
              </p>
              <p class="col-md-4">
                <strong>tweets</strong> <br>
                 445 

              </p>
              <p class="col-md-4">
                <strong>tweets</strong>  <br>
                 566
              </p>-->
            </a>
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
                <a href="{{ route('posts.create') }}">Create New Post</a></div>
                <div class="panel-body">
                    @foreach($posts as $post)
                     <div class="card" style="">
                       <div class="card-body" style="margin-top: -20px">
                          <a class="card-title" style="color: #57D1C9;padding-bottom: 10px"> <h3>{{ucfirst($post->user->name)}}</h3></a>
                         
                         <h6 class="card-subtitle mb-2 text-muted">{{ $post->updated_at->toFormattedDateString() }}<i class="fa fa-globe" aria-hidden="true" style="padding-left: 10px;padding-bottom: 15px"></i>
                        </h6>                       
                        <a href="{{route('posts.show',$post->id)}}">
                          <p class="card-text">{{$post->content}}</p>
                        </a> 
                        <hr>
                       <span v-if="liked"> @{{likes}} <i class="fa fa-heart-o" aria-hidden="true" class="fa fa-heart" style=" " ></i> </span>
                        
                        <hr v-if="liked" style="margin-top: 2px;margin-bottom: 2px">              
                         
                         <a href="#" class="card-link" style="padding-right: 60px;" @click.prevent="liked =! liked" :class="[card-link,testLike]" ><i class="fa fa-heart" aria-hidden="true"></i> <span >Like</span> </a>
                         
                         <a href="#" class="card-link" style="padding-right: 60px" @click.prevent=" commentHidden =! commentHidden" :class="testComment"><i class="fa fa-commenting" aria-hidden="true"></i>
                         Comment </a>
                         
                         <a href="#" class="card-link" style="padding-right: "><i class="fa fa-share" aria-hidden="true"></i>
                         Share</a>
                       </div>
                     </div> 
                     
                     <textarea class="form-control" rows="3" name="body" placeholder="Write a comment" v-model="commentBox" style="margin-top:5px;
                     height: 50px" @keyup.enter="postComment"></textarea>
                     
                     <p v-text="commentBox" style="padding: 3px;color: #09194F"></p>
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
                     <hr>                   
                    @endforeach
                </div>
            </div>
            {{ $posts->links() }}
        </div>
        <div class="col-md-3">
          <div class="list-group" style="margin-bottom: 50px">
            <a href="#" class="list-group-item ">
              <strong>who to follow..</strong>
                <td>
            <div><img class="media-object" src="http://placeimg.com/80/80" alt="..."></div>
            <div style="float: right;margin-top: -70px"> <strong>mahmiyd ali</strong> <br>
              <span style="padding: 10px;border-radius: 50%;background-color: #FCFCFC"><strong style="color: blue">follow</strong> </span> </div>
             </td><hr>
             <td>
            <div><img class="media-object" src="http://placeimg.com/80/80" alt="..."></div>
            <div style="float: right;margin-top: -70px"> <strong>mahmiyd ali</strong> <br>
              <span style="padding: 10px;border-radius: 50%;background-color: #FCFCFC"><strong style="color: blue">follow</strong> </span> </div>
             </td><hr><td>
            <div><img class="media-object" src="http://placeimg.com/80/80" alt="..."></div>
            <div style="float: right;margin-top: -70px"> <strong>mahmiyd ali</strong> <br>
              <span style="padding: 10px;border-radius: 50%;background-color: #FCFCFC"><strong style="color: blue">follow</strong> </span> </div>
             </td>
                  
            </a>
            <span  class="list-group-item">
              <i class="fa fa-user" aria-hidden="true" style="padding-right: 10px"></i>
              <a href=""> Find people you know</a> 
            </span>
          </div>
      
    </div>    
</div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

 <script>

    const app = new Vue({
      el: '#app',
      data: {
      	commentHidden: false,
        liked: false,
        likes: '',
        comments: {},
        commentBox: '',
        post: {!! $post->toJson() !!},
        user: {!! Auth::check() ? Auth::user()->toJson() : 'null' !!},
        //test:@{!!comment.id==comment.post_id? 'commentBox':''!!}
      },
      computed:{
        testComment:function(){
        	
           	return this.commentHidden;
        },
        testLike:function(){
          return (this.liked) ? 'liked':'';
        }
      },
      mounted() {
        this.listen();
      },
      methods: {
        postComment() {
          axios.post('/api/posts/'+this.post.id+'/comment', {
            api_token: this.user.api_token,
            body: this.commentBox
          })
          .then((response) => {
            this.comments.unshift(response.data);
            this.commentBox = '';
          })
          .catch((error) => {
            console.log(error);
          })
        },
        listen() {
          Echo.channel('post.'+this.post.id)
              .listen('NewComment', (comment) => {
                this.comments.unshift(comment);
              })
        }
      },
      watch:{
        liked:function(value){
          if (value) {
            this.likes ++ ;
          }else{
            this.likes -- ;
          }
        }
      }
    });

  </script>
@endsection
