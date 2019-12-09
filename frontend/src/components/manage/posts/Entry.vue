<template>
    <li class="grid-x">
        <p class="medium-2">id # {{id}}</p>
        <p class="medium-3">{{headline}}</p>
        <p class="medium-3">Author_id # {{author_id}}</p>
        <delete-button entity="post" :id="id" class="medium-2"/>
        <edit-button class="medium-2" :id="id" />
    </li>
</template>

<script>
    import DeleteButton from './../../modules/DeleteButton';
    import EditButton from './../../modules/EditButton';

    export default {
        components: {DeleteButton, EditButton},
        methods: {

        },
        name: "Entry.vue",
        props: {
            author_id: {
                required: true,
                type: Number
            },

            headline: {
                required: true,
                type: String
            },

            id: {
                required: true,
                type: Number
            }
        }
    }
</script>

<style scoped>

</style>