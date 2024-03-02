<template>
    <div class = "flex flex-col content-center border-2 border-black-500 rounded-lg p-3 bg-blue-200">
        <div class="bg-white p-3 rounded-lg">
            <h1 class="mb-5 font-bold text-3xl mx-2 text-center">Register</h1>
            <form @submit.prevent="register">
                <div class="flex flex-col mb-2">
                    <label for="email" class="font-bold ml-2 mb-3">Email</label>
                    <input v-model= "email" type="text" name="email" class="mx-2 mb-3 border-black-300 rounded-lg p-1 border-2 border-gray-200">
                </div>
                <div class="flex flex-col mb-4">
                    <label for="password" class="font-bold ml-2 mb-3">Password</label>
                    <input v-model="password" type="password" class="mx-2 mb-3 border-black-300 rounded-lg p-1 border-2 border-gray-200">
                </div>
                <div class="flex flex-col mb-4">
                    <label for="password" class="font-bold ml-2 mb-3">Repeat Password</label>
                    <input v-model="repeatPassword" type="password" class="mx-2 mb-3 border-black-300 rounded-lg p-1 border-2 border-gray-200">
                </div>
                <div class="flex flex-row justify-between">
                    <button type="submit" class = "flex justify-center w-3/12 bg-blue-500 rounded-lg p-2 text-white">Sign up</button>
                    <button type="button" @click="renderSignIn" class = "flex justify-center w-3/12 rounded-lg p-2">Sign in</button>
                </div>
            </form>
        </div>

    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            email: '',
            password: '',
            repeatPassword: ''
        };
    },
    methods: {
        renderSignIn() {
            this.$emit('sign-in');
        },
        register() {
            // Check if passwords match
            if (this.password !== this.repeatPassword) {
                alert('Passwords do not match');
                return;
            }

            const data = {
                email : this.email,
                password : this.password
            }

            // Send POST request to your backend
            axios.post('/api/register', data)
                .then(response => {
                    // Handle success
                    console.log(response.data);
                })
                .catch(error => {
                    // Handle error
                    console.error(error);
                });
        }
    }
};
</script>
