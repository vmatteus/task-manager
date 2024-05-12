<script setup>

const emit = defineEmits(['addTask']);

const newTask = defineModel()

function addTask() {
    emit('addTask', newTask);
    newTask.value = null;
}

</script>
<template>
    <div class="mb-4">
        <form @submit.prevent="addTask" class="flex items-center">
            <input v-model.trim="newTask" type="text" name="task" placeholder="Add new task..."
                class="w-full rounded-l-lg p-4 border-t mr-0 border-b border-l text-gray-800 border-gray-200 bg-white">
            <button type="submit"
                    class="px-8 bg-blue-500 text-white font-semibold py-4 rounded-r-lg border border-blue-500">Add</button>
        </form>
    </div>
</template>
