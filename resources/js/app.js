import './bootstrap';

// main.js
import { createApp } from 'vue';
import Home from './components/Home.vue';
import router from './router'; // Import the router instance
import store from './store'; // Import Vuex store

// import axios from 'axios';

// const token = document.head.querySelector('meta[name="csrf-token"]');

// if (token) {
//     axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
// } else {
//     console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
// }

const app = createApp(Home);
app.use(router)
app.use(store)

router.beforeEach((to, from, next) => {
    // Check if the route requires authentication
    if (to.matched.some(record => record.meta.requiresAuth)) {
      // Check if user is authenticated using Vuex store
      if (!store.getters.isAuthenticated) {
        // If not authenticated, redirect to login page
        next('/');
      } else {
        // If authenticated, proceed to the requested route
        next();
      }
    } else {
      // If route doesn't require authentication, proceed as normal
      next();
    }
  });

app.mount('#app');



