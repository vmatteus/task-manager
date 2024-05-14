// import { createMemoryHistory, createRouter } from 'vue-router'

// import Task from '../src/task/views/tasks.vue'
// import User from '../src/user/views/user.vue'

// const routes = [
//   { path: '/', component: Task },
//   { path: '/task', component: Task },
// ]

// const router = createRouter({
//   history: createMemoryHistory(),
//   routes,
// })

// export default{
//     router
// }

import { createRouter, createWebHistory } from 'vue-router';
import Task from '../src/task/views/tasks.vue'
import User from '../src/user/views/user.vue'

const routes = [
    { path: '/', component: User },
    { path: '/task', component: Task },
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
