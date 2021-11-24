<template>
    <div>
        Liste des commentaires
        <hr>
        <div v-for="comment in comments">
            <p>
                {{ comment.content }}
            </p>
            <small>
                {{ comment.author }}
            </small>
        </div>
        <hr>
        <div>
            <strong>Nom prénom</strong>
            <textarea name="" id="" cols="30" rows="10"></textarea>
            <button type="submit">Envoyer mon commentaire</button>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                comments: []
            }
        },
        props: ['post_id'],
        mounted() {
            axios.get('/api/user')
            .then(response => {
                console.log(response.data);
            });

            this.getPost();
        },
        methods:{
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