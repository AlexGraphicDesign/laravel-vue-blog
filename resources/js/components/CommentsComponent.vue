<template>
    <div>
        Liste des commentaires
    </div>
</template>

<script>
    export default {
        props: ['post_id'],
        mounted() {
            console.log(this.post_id);
            console.log('Liste des commentaires OK.');
        },
        methods:{
            getPost(){
                axios
                    .get('http://laravel-vue-blog.test/api/articles/' + this.post_id)
                    .then(response => (
                        //this.info = response
                        console.log(response);
                    ))
            }
        }
    }
</script>