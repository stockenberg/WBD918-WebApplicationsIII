<template>
    <div>
        <h2>{{success}}</h2>
        <form>
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
            <button @click="store" type="submit" class="button success">Save</button>
        </form>
        {{post}}
    </div>
</template>

<script>
    import {HError} from "../../../helpers/HError";

    export default {
        data() {
            return {
                post: {
                    headline: null,
                    teaser: null,
                    content: null,
                    author_id: null
                },
                errorHelper: null,
                success: null
            }
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
        created() {
            this.errorHelper = new HError();
        },
        methods: {
            store() {
                axios.post('/post/store', this.post).then(response => {
                    this.success = (response.status === 200) ? response.data.message : null;
                })
                .catch(error => {
                    this.errorHelper.setErrorObj(error.response.data);
                })
            }
        },
        name: "CreatePostFormular.vue"
    }
</script>

<style scoped>

</style>