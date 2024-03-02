<template>
    <div class="flex flex-col min-h-screen bg-violet-700">
        <div class="text-5xl text-white p-8 mb-6">
            <h1 class="flex justify-center font-black">ToDo App</h1>
        </div>
        <div class="flex justify-center">
            <div class="self-center w-96">
                <Login v-if="signIn" @sign-up="renderSignUp"/>
                <Register v-else @sign-in="renderSignIn"/>
            </div>
        </div>
    </div>
</template>

<script>
import Login from './LoginComponent.vue'
import Register from './RegisterComponent.vue'

export default {
    data() {
        return {
            signIn: true,
        };
    },
    components: { Login, Register },
    methods: {
        renderSignIn() {
            this.signIn = true;
        },
        renderSignUp() {
            this.signIn = false;
        }
    }
};
</script>
