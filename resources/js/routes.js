// Vue routes
import Home from "./components/Home.vue";
import DashboardComponent from "./components/DashboardComponent.vue";

export default [
    { path: '/', component: Home, name: 'home'},
    { path: '/dashboard', component: DashboardComponent, name: 'dashboard'}
];
