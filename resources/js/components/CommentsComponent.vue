<template>
    <div>
        Liste des commentaires
        <hr>
        <div v-for="comment in comments">
            <p>
                {{ comment.content }}
            </p>
            <p>
                {{ comment.author }}
            </p>
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
        <hr>
        <div>
            <strong>{{ user.name }}</strong>
            <textarea v-model="content" placeholder="Votre commentaire"></textarea>
            <button  v-on:click="sendComment">Envoyer mon commentaire</button>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                content: null,
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
            sendComment() {
                console.log('mon commentaire');
                console.log(this.content);
                axios.post('http://laravel-vue-blog.test/api/comment/create',{
                    content: this.content
                })
                .then(response => (
                    console.log(response.data)
                ))
            },
            getPost(){
                axios
                    .get('http://laravel-vue-blog.test/api/articles/' + this.post_id)
                    .then(response => (
                        this.comments = response.data
                    ));
            }
        }
    }
</script>