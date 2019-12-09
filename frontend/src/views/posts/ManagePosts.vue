<template>
    <div>
        {{$store.state.test}}
        <post-list />
    </div>
</template>

<script>
    import PostList from "../../components/manage/posts/PostList";
    export default {
        name: "ManagePosts.vue",
        components: {PostList}
    }
</script>

<style scoped>

</style>