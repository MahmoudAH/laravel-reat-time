@extends('layouts.app')
@section('styles')
    <link rel="stylesheet"  href="{{asset('css/chat.css')}}">
@endsection

@section('content')
@include('partials.error')

<div class="container">
    <div class="row">
    	<div class="col-md-4">
    		<h1 style=""><i class="fa fa-comments" aria-hidden="true" style="color: green"></i>
            Now you can chat with other users...</h1>
    	</div>
        <div class="col-md-6 ">
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
        user: {!!  Auth::user() !!}
    },

    mounted() {
        this.fetchMessages();
        this.listen();
    },
    watch:{
       typing(){
        Echo.private('chat')
           .whisper('typing', {
               name: this.user.name
           });   
       }
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
    	    })
             .listenForWhisper('typing', (e) => {
                    if(e.name != ''){
                        console.log('typing');
                    }else{
                        console.log('');
                    }
            });
       
        }
    } 
});
</script>
@endsection