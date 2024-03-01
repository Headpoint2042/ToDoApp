import './bootstrap';

// main.js
import { createApp } from 'vue';
import Home from './components/Home.vue';
import router from './router'; // Import the router instance


const app = createApp(Home);
app.use(router)

app.mount('#app');



