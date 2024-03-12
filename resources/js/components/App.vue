<template>
    <div>
      <router-view v-if="isLoggedIn" />
      <Home v-else />
    </div>
  </template>

<script>
  import { mapGetters } from 'vuex';
  import Home from './Home.vue';
  import DashboardComponent from './DashboardComponent.vue';

  export default {
    components: {
      Home,
      DashboardComponent,
    },
    computed: {
      ...mapGetters(['isLoggedIn']),
    },
  };
</script>
