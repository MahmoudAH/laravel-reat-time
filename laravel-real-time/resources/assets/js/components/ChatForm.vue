<template>
    <div class="input-group">
        <input id="btn-input" type="text" name="message" class="form-control input-sm" placeholder="Type your message here..." v-model="newMessage" @keyup.enter="sendMessage" @keydown="isTyping"  required>
         
         <div>
          <span v-show="typing" class="help-block" style="font-style: italic;">
                            {{ man.name }} is typing...
          </span>
        </div>
        
        <span class="input-group-btn">
            <button class="btn btn-primary btn-sm" id="btn-chat" @click="sendMessage" >
                Send
            </button>
        </span>
        
    </div>
</template>

<script>
    export default {
        props: ['user'],

        data() {
            return {
                newMessage: '',
                typing:false,
                man: ''
            }
        },
        created() {
          let _this = this;

          Echo.private('chat')
            .listenForWhisper('typing', (e) => {
              this.man = e.user;
              this.typing = e.typing;

              // remove is typing indicator after 0.9s
              setTimeout(function() {
                _this.typing = false
              }, 900);
            });
        },

        methods: {
            sendMessage() {
                this.$emit('messagesent', {
                    user: this.user,
                    message: this.newMessage
                });

                this.newMessage = ''
            },
            isTyping() {
              let channel = Echo.private('chat');

              setTimeout(function() {
                channel.whisper('typing', {
                  user: Laravel.user,
                  typing: true
                });
              }, 300);
            },
        }    
    }
</script>