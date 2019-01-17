<template>
    <span>
        <a href="#" v-if="isFavorited" @click.prevent="unFavorite(post)" class="card-link" style="padding-right: 60px">
            <i  class="fa fa-heart" style="color:red;padding-right:3px"></i>Like 
        </a>
        <a href="#" v-else @click.prevent="favorite(post)" class="card-link" style="padding-right: 60px">
            <i  class="fa fa-heart-o"></i>Like
        </a>
    </span>
</template>

<script>
    export default {
        props: ['post', 'favorited'],

        data: function() {
            return {
                isFavorited: '',
               
            }
        },

        mounted() {
            this.isFavorited = this.isFavorite ? true : false;
        },

        computed: {
            isFavorite() {
                return this.favorited;
            },
        },

        methods: {
            favorite(post) {
                axios.post('/like/'+post)
                    .then(response => this.isFavorited = true)
                    .catch(response => console.log(response.data));
            },

            unFavorite(post) {
                axios.post('/unlike/'+post)
                    .then(response => this.isFavorited = false)
                    .catch(response => console.log(response.data));
            }
        }
    }
</script>
