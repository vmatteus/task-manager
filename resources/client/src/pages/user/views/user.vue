<script lang="ts" setup>
    import { useStore } from 'vuex'
    import { reactive, ref } from 'vue'
    import { FormInstance, FormRules } from 'element-plus'
    import { useRouter } from 'vue-router';

    const ruleFormRef = ref<FormInstance>()
    const store = useStore()
    const router = useRouter();

    const userForm = reactive({
        name: null,
        email: null
    })

    const createUser = (fields) => {
        store.dispatch('User/create', fields)
    }

    const submitForm = (formEl: FormInstance | undefined) => {
        if (!formEl) return
        formEl.validate((valid) => {
            if (valid) {
                createUser(userForm)
                router.push('/task')
            }
        })
    }

</script>

<template>
    <h1 class="text-3xl font-bold text-center pt-8">User register</h1>
    <div class="container mx-auto py-8">
        <el-form
            ref="ruleFormRef"
            style="max-width: 600px"
            :model="userForm"
            status-icon
            label-width="auto"
            class="demo-ruleForm"
        >
            <el-form-item
                :rules="{
                    required: true,
                    message: 'Please input name',
                    trigger: 'blur',
                }"
                label="Name"
                prop="name"
            >
                <el-input
                    v-model="userForm.name"
                    type="text"
                    autocomplete="off"
                />
            </el-form-item>
            <el-form-item
                :rules="[
                    {
                    required: true,
                    message: 'Please input email address',
                    trigger: 'blur',
                    },
                    {
                    type: 'email',
                    message: 'Please input correct email address',
                    trigger: ['blur', 'change'],
                    },
                ]"
                label="Email" prop="email">
                <el-input v-model="userForm.email" type="text" autocomplete="off" :rules="{required: true}" />
            </el-form-item>
            <el-button type="primary" @click="submitForm(ruleFormRef)">
                Submit
            </el-button>
        </el-form>
    </div>
</template>
