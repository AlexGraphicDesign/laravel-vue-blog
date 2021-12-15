<template>
    <div>
        Liste des commentaires
        <hr>
        <div v-if="!loading" v-for="comment in comments">
            <p>
                {{ comment.content }}
            </p>
            <p>
                {{ comment.author }}
            </p>
            <p v-on:click="responseComment(comment.id)">Répondre à ce commentaire</p>
            <hr>
            <h3>Réponse à ce commentaire</h3>
            <div v-for="subComment in comment.comments">
                <small>
                    {{ subComment.content }}
                </small>
                <p>
                    {{ subComment.author }}
                </p>
            </div>
            <hr>
        </div>
        <div v-if="loading">
            Chargement ...
        </div>
         <hr>
        <div v-if="user">
            <strong>{{ user.name }}</strong>
            <textarea v-model="content" placeholder="Votre commentaire"></textarea>
            <button v-on:click="sendComment">Envoyer mon commentaire</button>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                loading : true,
                content: null,
                comment_id: null,
                user: [],
                comments: []
            }
        },
        props: ['post_id'],
        mounted() {
            axios.get('/api/user')
            .then(response => {
                this.user = response.data;
            });

            this.getPost();
        },
        methods:{
            responseComment(commentId) {
                this.comment_id = commentId;
            },
            sendComment() {
                if(this.message != ''){
                    this.loading = true;
                    let obj = this;
                    console.log(this.content);
                    console.log(this.user.id);
                    axios.post('http://laravel-vue-blog.test/api/comments/create',{
                        content: this.content,
                        post_id: this.post_id

                    })
                    .then(function (response){
                        obj.getPost();
                    })
                }
            },
            getPost(){
                let obj = this;
                axios.get('http://laravel-vue-blog.test/api/articles/' + this.post_id)
                    .then( function (response){
                        console.log('Chargement');
                        obj.comments = response.data;
                        obj.loading = false;
                    });
            }
        }
    }
</script>