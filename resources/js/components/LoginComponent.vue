<template>
    <div class = "flex flex-col content-center border-2 border-black-500 rounded-lg p-3 bg-blue-200">
        <div class="bg-white p-3 rounded-lg">
            <h1 class="mb-5 font-bold text-3xl mx-2 text-center">Login</h1>
            <form>
                {{ csrf_field() }}
                <div class="flex flex-col mb-2">
                    <label for="email" class="font-bold ml-2 mb-3">Email</label>
                    <input type="text" name="email" class="mx-2 mb-3 border-black-300 rounded-lg p-1 border-2 border-gray-200">
                </div>
                <div class="flex flex-col mb-4">
                    <label for="password" class="font-bold ml-2 mb-3">Password</label>
                    <input type="password" class="mx-2 mb-3 border-black-300 rounded-lg p-1 border-2 border-gray-200">
                </div>
                <div class="flex flex-row justify-between">
                    <button type="submit" class = "flex justify-center w-3/12 bg-blue-500 rounded-lg p-2 text-white">Sign in</button>
                    <button type="button" @click="renderSignUp" class = "flex justify-center w-3/12 rounded-lg p-2">Sign up</button>
                </div>
            </form>
        </div>

    </div>
</template>

<script>

export default {
    data() {
        return {

        };
    },
    methods: {
        renderSignUp() {
            this.$emit('sign-up');
        }
    }
};
</script>
