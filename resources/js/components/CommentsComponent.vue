<template>
    <div>
        Liste des commentaires
        <div v-for="comment in comments">
            <p>
                {{ comment.content }}
            </p>
            <small>
                {{ comment.author }}
            </small>
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
            this.getPost();
            console.log(this.post_id);
            console.log('Liste des commentaires OK.');
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