<script setup>
    import { ref } from 'vue';
    import TaskAdd from '../components/TaskAdd.vue';

    const componentKey = ref(0);

    const forceRerender = () => {
        componentKey.value += 1;
    };

    const tasks = defineModel({
        default: ['teste', 'teste2']
    })

    const assigns = defineModel('assings',
        {
            default: []
        }
    )

    const addTask = (task) => {
        tasks.value.push(task.value);
        forceRerender();
    }

    const removeTask = (index) => {
        tasks.value.splice(index, 1);
        forceRerender();
    }

    const assignToMe = (index) => {
        assigns.value.push({
            task: index,
            user: 'Vini'
        })
        forceRerender();
    }

    const isAssign = (index) => {
        const task = assigns.value.map(element => {
            if (element.task == index ) {
                return element;
            }
        });
        return !task.length === 0;
    }

</script>

<template>
    <ul class="divide-y divide-gray-200">
        <TaskAdd
            :key="componentKey"
            tasks="tasks"
            @update:tasks="addTask = $event"
            @addTask="addTask"
        />
        <li v-for="(task, index) in tasks" :key="index" class="py-4 flex items-center justify-between">
            <span class="flex-1">{{ task }}</span>
            <button v-if="!isAssign(index)" @click="assignToMe(index)"
                    class="text-sm px-4 py-1 rounded-lg text-white bg-violet-600 hover:bg-violet-700 mr-4">Assign to me</button>
            <button @click="removeTask(index)"
                    class="text-sm px-4 py-1 rounded-lg bg-red-500 text-white font-semibold hover:bg-red-600">Remove</button>

        </li>
    </ul>
</template>
