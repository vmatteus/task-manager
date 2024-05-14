<script setup>
    import { useStore } from 'vuex';

    const store = useStore()
    const props = defineProps({
        task : {
            id: null,
            title: String
        }
    })

    const removeTask = (index) => {
        store.dispatch('Tasks/delete', index)
    }

    const assignToMe = (index) => {

    }

    const isAssign = (index) => {

    }

</script>

<template>
    <li class="py-4 flex items-center justify-between">
        <span class="flex-1">{{ props.task.title }}</span>
        <button v-if="!isAssign(props.task.id)" @click="assignToMe(props.task.id)"
                class="text-sm px-4 py-1 rounded-lg text-white bg-violet-600 hover:bg-violet-700 mr-4">Assign to me</button>
        <button @click="removeTask(props.task.id)"
                class="text-sm px-4 py-1 rounded-lg bg-red-500 text-white font-semibold hover:bg-red-600">Remove</button>

    </li>
</template>
