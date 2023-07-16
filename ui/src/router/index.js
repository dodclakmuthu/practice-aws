import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: "/s3",
      name: "s3",
      component: () => import('../views/S3View.vue'),
      children: [
        {
          path: "upload",
          // name: "s3upload",
          component: () => import('../components/S3Upload.vue'),
        }
      ]
    }
  ]
})

export default router
