<template>
    <div>
        <div class="callout alert" v-if="error">
            <h5>{{error.message}}</h5>
            <p>please recheck your input</p>
        </div>
        <form v-if="post">
            <div>
                <label for="headline">Headline</label>
                <input type="text" v-model="post.headline" id="headline">
                <p v-if="headlineError"> {{headlineError}}</p>
            </div>
            <div>
                <label for="teaser">Teaser</label>
                <input type="text" v-model="post.teaser" id="teaser">
                <p v-if="teaserError"> {{teaserError}}</p>
            </div>
            <div>
                <label for="content">Content</label>
                <textarea v-model="post.content" id="content"></textarea>
                <p v-if="contentError"> {{contentError}}</p>
            </div>
            <div>
                <label for="author_id">Author id</label>
                <input type="text" v-model="post.author_id" id="author_id">
                <p v-if="authorIdError"> {{authorIdError}}</p>
            </div>
            <button @click.prevent="save" type="submit" class="button success">Save</button>
        </form>
        {{post}}
    </div>
</template>

<script>
    import {HError} from "../../helpers/HError";

    export default {
        data() {
            return {
                post: null,
                error: null
            }
        },
        created() {
            this.errorHelper = new HError();
        },

        computed: {
            authorIdError(){
                return this.errorHelper.getError('author_id');
            },

            contentError() {
                return this.errorHelper.getError('content');
            },

            headlineError(){
                return this.errorHelper.getError('headline');
            },

            teaserError() {
                return this.errorHelper.getError('teaser');
            },

        },
        methods: {


            /**
             * Get Post from Database to edit
             * @param id
             * @return void
             */
            fetchPost(id) {
                axios.get('/post/' + id).then(post => {
                    this.post = post.data;
                })
            },

            /**
             * Transfer post via ajax to backend
             * @return void
             */
            save() {
                axios.post('/post', this.post)
                    .then(response => {
                        console.log(response);
                    })
                    .catch(error => {
                        this.errorHelper.setErrorObj(error.response.data);
                    })
            }
        },

        /**
         * Call posts initially
         */
        mounted() {
            const POST_ID = this.$route.params.id;
            this.fetchPost(POST_ID);
        },

        name: "EditPost.vue",
        watch: {
            '$route.params.id'(old_id, new_id) {
                this.fetchPost(new_id);
            }
        },
    }
</script>

<style scoped>

</style>