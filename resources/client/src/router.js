import { createRouter, createWebHistory } from 'vue-router';
import Task from './pages/task/views/tasks.vue'
import User from './pages/user/views/user.vue'
import Login from './pages/login/views/login.vue'

const routes = [
    { path: '/', redirect: '/login'},
    { path: '/task', component: Task },
    { path: '/user', component: User },
    { path: '/login', component: Login },
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
