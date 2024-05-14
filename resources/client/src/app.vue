<script setup>
    import Tasks from './task/views/tasks.vue'
    import User from './user/views/user.vue'
    import { useStore } from 'vuex';

    const store = useStore()

</script>

<template>
    <h1 class="text-3xl font-bold text-center pt-8">Task Manager v1</h1>
    <User v-if="!store.state.User.loaded" />
    <Tasks v-if="store.state.User.loaded" />
</template>
