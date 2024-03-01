<template>
    <div class="z-10 top-0 left-0 absolute h-screen w-screen flex items-center justify-center">
        <div class="bg-white p-5 border-4 border-gray-300 rounded-lg basis-1/3">
            <form class="flex flex-col">
                <label for="task" class="p-2">Insert your new task</label>
                <input type="text" name="task" class="border-2 border-gray-200 p-2 rounded-lg">

                <div class="flex justify-between mt-4">
                    <button type="submit" class="rounded-lg bg-green-500 p-2 basis-1/3">Add</button>
                    <button type="button" @click="triggerClose" class="rounded-lg bg-red-500 p-2 basis-1/3">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
export default {
    methods: {
        triggerClose() {
            this.$emit('close');
        }
    }
}
</script>
