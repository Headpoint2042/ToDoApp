import './bootstrap';

// main.js
import { createApp } from 'vue';
import Home from './components/Home.vue';
import router from './router'; // Import the router instance
// import axios from 'axios';

// const token = document.head.querySelector('meta[name="csrf-token"]');

// if (token) {
//     axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
// } else {
//     console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
// }

const app = createApp(Home);
app.use(router)

app.mount('#app');



