<template>
    <div class="ManagePostList">
        <h2>Post List</h2>
        <button @click="isVisible = !isVisible" class="button warning">{{isVisible ? 'close' : 'show posts'}}</button>

        <create-post-form></create-post-form>

        <ul class="list" v-if="posts" v-show="isVisible">
            <!-- if your confused by {id, name.. } syntax - check js destructuring -->
            <entry v-for="({id, headline, author_id}, index) in posts"
                               :key="index"
                               :id="id"
                               :headline="headline"
                               :author_id="author_id"

            />
        </ul>
    </div>
</template>

<script>
    import Entry from "./Entry";
    import CreatePostForm from "./CreatePostForm";
    import {mapState, mapActions} from 'vuex';

    export default {
        computed: {
            ...mapState(['posts'])
        },
        components: {Entry, CreatePostForm},
        data() {
          return {
              isVisible: false
          }
        },
        mounted() {
            this.fetchPosts();
        },
        methods: {
            ...mapActions(['fetchPosts'])
        },
        name: "PostList",
    }

</script>

<style scoped>

</style>