<script setup>
    import { onMounted } from 'vue';
    import { useStore } from 'vuex';
    import TaskAdd from '../components/TaskAdd.vue';
    import TaskItem from '../components/TaskItem.vue';

    const store = useStore()

    const assigns = defineModel('assings',
        {
            default: []
        }
    )

    const addTask = (task) => {
        store.dispatch('Tasks/create', task)
    }

    onMounted(async() => {
        try {
            store.dispatch('Tasks/load')
        } catch(e) {
            console.log(e)
        }
    });

</script>

<template>
    <ul class="divide-y divide-gray-200">
        <TaskAdd
            @update:tasks="addTask = $event"
            @addTask="addTask"
        />
        <TaskItem
            v-for="(task, index) in store.state.Tasks.list" :key="index"
            :task="task"
        />
    </ul>
</template>
