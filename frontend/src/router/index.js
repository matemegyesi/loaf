import { createRouter, createWebHistory } from 'vue-router'

export const router = createRouter({
  history: createWebHistory(),
  linkActiveClass: 'active',
  routes: [
    {
      name: 'home',
      path: '/',
      component: () => import('@pages/MainPage.vue'),
      meta:{
        title: 'Mythorium'
      }
    },
    {
      path: '/legends',
      name: 'legends',
      component: () => import("@pages/LegendsPage.vue"),
      meta:
      {
        title: 'Mythorium Legends'
      }
    },
    {
      path: '/management',
      name: 'management',
      component: () => import("@pages/ManagementPage.vue"),
      meta:
      {
        title: 'Mythorium Management'
      }
    }
  ]
})