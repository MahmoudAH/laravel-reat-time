@extends('layouts.app')
@section('styles')
    <link rel="stylesheet"  href="{{asset('css/chat.css')}}">

    <style type="text/css">

    </style>
@endsection

@section('content')
@include('partials.error')

<div class="container">
    <div class="row">
    	<div class="col-md-4">
    		<h1 style=""><i class="fa fa-comments" aria-hidden="true" style="color: green"></i>
            Now you can chat with other users...</h1>
            <div class="panel panel-default user_panel">
            <div class="panel-heading">
                <h3 class="panel-title">Friends</h3>
            </div>
            <div class="panel-body">
                <div class="table-container">
                    <table class="table-users table" border="0">
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td width="10">
                                    <img class="pull-left img-circle nav-user-photo" width="50" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxhcCYW4QDWMOjOuUTxOd50KcJvK-rop9qE9zRltSbVS_bO-cfWA" />  
                                </td>
                                <td>
                                 <a href="" style="">   
                                   <strong>
                                    {{
                                        str_limit($user->name,8)
                                    }}
                                    </strong>{{$user->id}} 
                                  </a>
                                    <br><small style="opacity: 1.0;">online</small>
                                 
                                    
                                </td>
                                
                                <td align="center">

                                    <i class="fa fa-circle" aria-hidden="true" style="
                                    color: green"></i><br><small class="text-muted">5 days ago</small>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    	</div>
        <div class="col-md-6 col-md-offset-1 " style="margin-top:80px ">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-comments-o" aria-hidden="true" style="color: green"></i>
                 Chats</div>

                <div class="panel-body">
                    <chat-messages :messages="messages"></chat-messages>
                </div>
                 
                <div class="panel-footer">
                    <chat-form
                        v-on:messagesent="addMessage"
                        :user="{{ Auth::user() }}"
                    ></chat-form>
                </div>
                
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
        messages: [],
        
    },

    mounted() {
        this.fetchMessages();
        this.listen();
    },
    methods: {
        fetchMessages() {
            axios.get('/messages')

            .then(response => {
                this.messages = response.data;
            })
            .catch(function (error) {
                  console.log(error);
            });
        },

        addMessage(message) {
            this.messages.push(message);

            axios.post('/messages', message)

            .then(response => {
              console.log(response.data);
            })
            .catch(function (error) {
                  console.log(error);
            });
        },
        listen(){
    	    Echo.private('chat')
    	     .listen('MessageSent', (e) => {
    		    this.messages.push({
    			    message:e.message.message,
    		        user:e.user,
    		    });
    	    });
             
       
        }
    } 
});
</script>
@endsection