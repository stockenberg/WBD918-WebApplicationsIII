<template>
    <router-link class="warning button" :to="{name: 'edit-post', params: {id: id}}">Edit</router-link>
</template>

<script>
    export default {
        name: "EditButton.vue",
        props: {
            /** id of entity to be edited */
            id: {
                required: true,
                type: Number
            }
        }
    }
</script>

<style scoped>

</style>